<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomRouteServiceProvider extends ServiceProvider
{
    public const HOME = '/homepage';
    public function register()
    {
        echo 'AppServiceProvider Registered.<br>';
    }

    public function boot()
    {
        echo 'AppServiceProvider Booted.<br>';
    }
}
