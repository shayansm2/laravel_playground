<?php

namespace App\Mail;

use App\Models\Discount;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShallotYogurtDiscount extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        if ($this->user->discount) {
            return $this->sendDiscountMail();
        }

        return $this->sendNotFoundMail();
    }

    private function sendDiscountMail()
    {
        return $this
            ->to($this->user->email)
            ->view('emails.discount.winner')
            ->with(['name' => $this->user->name])
            ->attachFromStorage($this->user->discount->file_path);
    }

    private function sendNotFoundMail()
    {
        return $this
            ->to($this->user->email)
            ->view('emails.discount.404')
            ->with(['name' => $this->user->name]);
    }
}
