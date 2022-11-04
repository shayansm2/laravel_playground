<?php

namespace App\Listeners;

use App\Models\PostStatistic;
use Illuminate\Support\Facades\Event;

class PostEventSubscriber
{
    public function subscribe(Event $events)
    {
        $events->listen(
            'posts.show',
            [self::class, 'handlePostsShow']
        );

        $events->listen(
            'posts.destroy',
            [self::class, 'handlePostsDestroy']
        );
    }

    private function handlePostsShow(int $id)
    {
        PostStatistic::create([
            'post_id' => $id,
            'action' => 'SHOW'
        ]);
    }

    private function handlePostsDestroy(int $id)
    {
        PostStatistic::create([
            'post_id' => $id,
            'action' => 'DESTROY'
        ]);
    }
}
