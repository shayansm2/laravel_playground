<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class ContactMessage extends Mailable
{
    use Queueable;

    private string $name;
    private string $fromEmail;
    private string $messageText;

    public function __construct(string $name, string $fromEmail, string $messageText)
    {
        $this->name = $name;
        $this->fromEmail = $fromEmail;
        $this->messageText = $messageText;
    }

    public function build(): self
    {
        return $this
            ->from($this->fromEmail)
            ->view('emails.contact')
            ->subject("New message from {$this->name}")
            ->with([
                'name' => $this->name,
                'email' => $this->fromEmail,
                'messageText' => $this->messageText,
            ]);
    }
}
