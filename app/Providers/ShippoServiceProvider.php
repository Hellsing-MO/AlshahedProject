<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Shippo;

class ShippoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('shippo', function ($app) {
            Shippo::setApiKey(config('shippo.api_key'));
            return Shippo::class;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Shippo::setApiKey(config('shippo.api_key'));
    }
} 