<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use App\Mail\MessageMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        $fromUser = User::find(1);
        $toUser = User::find(2);
        $message = 'salam chetori?';

        Mail::to($toUser)->send(new MessageMail($fromUser, $toUser, $message));
    }

    public function store(Request $request)
    {
        $adminUsers = User::admin()->get();

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        foreach ($adminUsers as $adminUser) {
            Mail::to($adminUser)->queue( new ContactMessage($name, $email, $message));
        }
    }
}
