<?php

namespace App\Http\Controllers;

use App\Jobs\SendSMS;
use App\Models\User;
use Illuminate\Support\Facades\Bus;

class SMSController extends Controller
{
    public function sendSMSToAllUsers(string $id, string $text)
    {
        $jobs = [];

        foreach (User::all() as $user) {
            $jobs[] = new SendSMS($user->phone, $text);
        }

        Bus::batch($jobs)->name($id)->dispatch();
    }
}
