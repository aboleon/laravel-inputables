<?php

namespace Aboleon\Inputables;

use Illuminate\Support\Facades\{
    Blade,
    View};

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {

        $this->loadViewsFrom(__DIR__ . '/views', 'aboleon-inputable');
        Blade::componentNamespace('Aboleon\\Inputables\\Components', 'aboleon-inputable');

        $this->publishInstall();

    }

    private function publishInstall(): void
    {
        $this->publishes([
            __DIR__ . '/../publishables/public/' => public_path(),
            __DIR__ . '/../publishables/lang/' => base_path('lang'),
        ], 'laravel-inputables-install');
    }
}