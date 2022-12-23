<?php

namespace Tests\Feature;

use App\Http\Controllers\DownloadsController;
use App\Jobs\SendDownloadLinks;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class DownloadsRateLimiterSampleTest extends TestCase
{
    public function test_send_download_links()
    {
        Queue::fake();

        $user = User::inRandomOrder()->first();
        $course = Course::inRandomOrder()->first();
        (new DownloadsController())->sendDownloadLinks($user, $course);

        Queue::assertPushed(SendDownloadLinks::class, function ($job) use ($user, $course) {
            return $job->user == $user && $job->course == $course;
        });
    }
}
