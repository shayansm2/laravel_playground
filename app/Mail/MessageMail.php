<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $fromUser;
    public User $toUser;
    public string $messageText;

    public function __construct(User $fromUser, User $toUser, string $messageText)
    {
        $this->fromUser = $fromUser;
        $this->toUser = $toUser;
        $this->messageText = $messageText;
    }

    public function build(): self
    {
        return $this
            ->from($this->fromUser->email)
            ->to($this->toUser->email)
            ->view('emails.message');
    }
}
