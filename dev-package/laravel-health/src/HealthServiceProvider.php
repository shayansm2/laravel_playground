<?php

namespace QueraCollege\LaravelHealth;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class HealthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/health.php', 'health'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/health.php' => config_path('health.php')
        ], 'health');

        Route::group(['namespace' => 'QueraCollege\LaravelHealth\Http\Controllers'], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'health');

        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/health'),
        ], 'health');
    }
}
