<?php

declare(strict_types=1);

namespace Appoly\LaravelBoostTrae\Install\CodeEnvironment;

use Laravel\Boost\Contracts\Agent;
use Laravel\Boost\Contracts\McpClient;
use Laravel\Boost\Install\Enums\Platform;
use Laravel\Boost\Install\CodeEnvironment\CodeEnvironment;

class Trae extends CodeEnvironment implements Agent, McpClient
{
    public bool $useAbsolutePathForMcp = true;

    public function name(): string
    {
        return 'trae';
    }

    public function displayName(): string
    {
        return 'Trae';
    }

    public function systemDetectionConfig(Platform $platform): array
    {
        return match ($platform) {
            Platform::Darwin => [
                'paths' => ['/Applications/Trae.app'],
            ],
            Platform::Windows => [
                'paths' => [
                    '%ProgramFiles%\\Trae',
                    '%LOCALAPPDATA%\\Programs\\Trae',
                ],
            ],
            Platform::Linux => [
                // Trae is not supported on Linux
            ],
        };
    }

    public function projectDetectionConfig(): array
    {
        return [
            'paths' => ['.trae'],
        ];
    }

    public function guidelinesPath(): string
    {
        return '.trae/rules/project_rules.md';
    }

    public function frontmatter(): bool
    {
        return false;
    }

    public function mcpConfigPath(): string
    {
        switch (Platform::current()) {
            case Platform::Darwin:
                $home = getenv('HOME') ?: getenv('USERPROFILE') ?: '';

                return $home
                    . DIRECTORY_SEPARATOR . 'Library'
                    . DIRECTORY_SEPARATOR . 'Application Support'
                    . DIRECTORY_SEPARATOR . 'Trae'
                    . DIRECTORY_SEPARATOR . 'User'
                    . DIRECTORY_SEPARATOR . 'mcp.json';
            case Platform::Windows:
                $appData = getenv('APPDATA') ?: '';

                return $appData
                    . DIRECTORY_SEPARATOR . 'Trae'
                    . DIRECTORY_SEPARATOR . 'User'
                    . DIRECTORY_SEPARATOR . 'mcp.json';
            case Platform::Linux:
            default:
                return ''; // Not supported
        }
    }

    public function mcpConfigKey(): string
    {
        return 'mcpServers';
    }
}
