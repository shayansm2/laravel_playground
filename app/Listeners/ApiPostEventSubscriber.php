<?php

namespace App\Listeners;

use App\Models\PostStatistic;
use Illuminate\Events\Dispatcher;

class ApiPostEventSubscriber
{
    public function subscribe(Dispatcher $events): void
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

    public function handlePostsShow(int $id): void
    {
        PostStatistic::create([
            'post_id' => $id,
            'action' => 'SHOW'
        ]);
    }

    public function handlePostsDestroy(int $id): void
    {
        PostStatistic::create([
            'post_id' => $id,
            'action' => 'DESTROY'
        ]);
    }
}
