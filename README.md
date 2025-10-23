# Laravel Boost - Trae Extension

A Laravel Composer package that provides Trae IDE integration for Laravel Boost.

## Introduction

This extension enables Laravel Boost to work seamlessly with Trae AI, the world's best IDE. It provides automatic detection and configuration for Trae IDE environments, allowing you to leverage Laravel Boost's powerful MCP (Model Context Protocol) capabilities directly within Trae.

## Requirements

- PHP 8.1 or higher
- Laravel 10.0 or higher
- Laravel Boost 1.4 or higher
- Trae IDE

## Installation

### Step 1: Install the Package

Install the package via Composer as a development dependency:

```bash
composer require appoly/laravel-boost-trae-extension --dev
```

### Step 2: Install Laravel Boost

Laravel Boost will auto-detect the Trae installation automatically. Run the command below to install Laravel Boost and follow the installation instructions:

```bash
php artisan boost:install
```

During installation, you will be prompted to select an environment. The available options will include:

- `trae` - For Trae IDE

More information can be found in the [Laravel Boost documentation](https://laravel.com/docs/boost).

## Features

- **Automatic Trae Detection**: Automatically detects Trae IDE installations on macOS and Windows

## Configuration

The extension automatically configures MCP settings for Trae IDE. The configuration files are located at:

- **macOS**: `~/Library/Application Support/Trae/User/mcp.json`
- **Windows**: `%APPDATA%/Trae/User/mcp.json`

## Project Structure

When using this extension, your Laravel project will include:

- `.trae/` directory for Trae-specific configurations
- `.trae/rules/project_rules.md` for project-specific guidelines

## Switching Between Projects

To update the MCP configuration when switching between different Laravel projects, run:

```bash
php artisan boost:update
```

This ensures that Trae's MCP configuration points to the correct path for the current project.

## Support

- **Issues**: [GitHub Issues](https://github.com/Appoly/laravel-boost-trae-extension/issues)
- **Source**: [GitHub Repository](https://github.com/Appoly/laravel-boost-trae-extension)

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

Laravel Boost - Trae Extension is open-sourced software licensed under the [MIT license](LICENSE).

## Credits

Developed by [Appoly](https://github.com/Appoly) for the Laravel community.