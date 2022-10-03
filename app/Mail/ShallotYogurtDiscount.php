<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShallotYogurtDiscount extends Mailable
{
    use Queueable, SerializesModels;

    private User $user;

    public function __construct(User $user)
    {
        // TODO: Implement
    }

    public function build()
    {
        // TODO: Implement
    }
}
