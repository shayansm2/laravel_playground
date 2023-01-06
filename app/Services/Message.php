<?php

namespace App\Services;

use Illuminate\Support\Facades\App;

class Message
{
    private string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    public function printMessage(): void
    {
        echo $this->message;
    }
}
