<?php

declare(strict_types=1);

namespace Appoly\LaravelBoostTrae;

use Appoly\LaravelBoostTrae\Install\CodeEnvironment\Trae;
use Illuminate\Support\ServiceProvider;
use Laravel\Boost\Boost;

class TraeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Boost::registerCodeEnvironment('trae', Trae::class);
    }
}
