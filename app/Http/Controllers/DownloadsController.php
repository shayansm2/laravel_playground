<?php

namespace App\Http\Controllers;

use App\Jobs\SendDownloadLinks;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;

class DownloadsController extends Controller
{
    use Utils;

    public function download()
    {
        $user = $this->getUser();
        $executed = RateLimiter::attempt(
            'downloads:' . $user->id, $perDay = $this->getLimit(), function () {
        }
        );
        if (!$executed) {
            return response('Too many messages sent!', 429);
        }
        $this->sendDownloadLinks($user, $this->getCourse());
        return response('Done!', 200);
    }

    public function sendDownloadLinks(User $user, Course $course)
    {
        SendDownloadLinks::dispatch($user, $course)->onQueue('downloads');
    }
}
