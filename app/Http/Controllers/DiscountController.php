<?php

namespace App\Http\Controllers;

use App\Mail\ShallotYogurtDiscount;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DiscountController extends Controller
{
    public function sendDiscountCode()
    {
        /** @var User $user */
        $user = Auth::user();

        Mail::to($user)->queue(new ShallotYogurtDiscount($user));

        return new Response();
    }
}
