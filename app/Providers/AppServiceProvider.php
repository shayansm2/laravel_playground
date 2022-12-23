<?php

namespace App\Providers;

use App\Jobs\SendDownloadLinks;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    const PLAN_THRESHOLD = [
        'normal' => 1,
        'bronze' => 10,
        'silver' => 25,
        'gold' => 100,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
//        $this->app->bind('Message', Message::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        RateLimiter::for(
            'downloads',
            function (SendDownloadLinks $job) {
                return Limit::perDay(self::PLAN_THRESHOLD[$job->user->plan]);
            }
        );
    }
}
