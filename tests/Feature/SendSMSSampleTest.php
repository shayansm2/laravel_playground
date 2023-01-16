<?php

namespace Tests\Feature;

use App\Http\Controllers\SMSController;
use App\Models\User;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class SendSMSSampleTest extends TestCase
{
    public function test_send_sms_to_all_users()
    {
        Bus::fake();

        (new SMSController())->sendSMSToAllUsers('sms-984919', 'Hello from Quera!');
        $batch = Bus::batched(function ($batch) {
            return true;
        })[0];
        $this->assertEquals('sms-984919', $batch->name);
        $this->assertCount(User::count(), $batch->jobs);
    }
}
