<?php

namespace Tests\Feature;

use Tests\TestCase;

class ServiceSampleTest extends TestCase
{
    public function testBind()
    {
        $message = resolve('Message', ['message' => "Custom Message"]);
        $message->printMessage();

        $this->assertTrue(True, "کلاس در service container بایند نشده است");
    }
}
