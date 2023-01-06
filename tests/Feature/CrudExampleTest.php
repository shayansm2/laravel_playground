<?php

namespace Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;

class CrudExampleTest extends TestCase
{
    public function test_dispatch()
    {
        Event::fake();

        $this->get('/api/posts/2');

        Event::assertDispatched('posts.show');
    }
}
