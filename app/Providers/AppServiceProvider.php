<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(MaintenanceMode::class, function ($app) {
            return new MaintenanceMode($app['files']);
        });
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

}
