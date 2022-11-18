<?php

namespace Feature;

use App\Http\Controllers\DiscountController;
use App\Mail\ShallotYogurtDiscount;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ShallotYogurtSampleTest extends TestCase
{
    public function test_shallot_yogurt_discount_winner()
    {
        $user = User::find(11);
        $mail = new ShallotYogurtDiscount($user);
        $mail->build();
        $this->assertEquals(view('emails.discount.winner', ['name' => $user['name']]), $mail->render());
        $attachments = [];
        foreach ($mail->attachments as $attachment) {
            $attachments[] = $attachment['file'];
        }
        foreach ($mail->diskAttachments as $attachment) {
            $attachments[] = storage_path($attachment['name']);
        }
        $this->assertCount(1, $attachments);
        $this->assertEquals(storage_path($user->discount->file_path), $attachments[0]);
    }

    public function test_send_discount_code_winner()
    {
        Mail::fake();

        $user = User::find(11);
        $this->be($user);
        (new DiscountController())->sendDiscountCode();
        Mail::assertQueued(ShallotYogurtDiscount::class);
        $mails = Mail::queued(ShallotYogurtDiscount::class);
        $this->assertCount(1, $mails);
        $mail = $mails[0];
        $mail->build();
        $this->assertEquals('emails.discount.winner', $mail->view);
        $this->assertEquals(['name' => $user->name], $mail->viewData);
        $attachments = [];
        foreach ($mail->attachments as $attachment) {
            $attachments[] = $attachment['file'];
        }
        foreach ($mail->diskAttachments as $attachment) {
            $attachments[] = storage_path($attachment['name']);
        }
        $this->assertCount(1, $attachments);
        $this->assertEquals(storage_path($user->discount->file_path), $attachments[0]);
    }
}
