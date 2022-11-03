<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class HomePageVisited
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ip;
    public $agent;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($ip, $agent)
    {
        $this->ip = $ip;
        $this->agent = $agent;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
