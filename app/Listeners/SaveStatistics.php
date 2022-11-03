<?php

namespace App\Listeners;

use App\Events\HomePageVisited;
use App\Models\Statistic;

class SaveStatistics
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * @param HomePageVisited $event
     * @return void
     */
    public function handle(HomePageVisited $event): void
    {
        Statistic::create([
            'ip' => $event->ip,
            'agent' => $event->agent
        ]);
    }
}
