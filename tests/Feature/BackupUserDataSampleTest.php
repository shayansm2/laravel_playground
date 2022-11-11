<?php

namespace Tests\Feature;

use App\Jobs\BackupUserData;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BackupUserDataSampleTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        if (Storage::disk('public')->exists('backups/out.json')) {
            Storage::disk('public')->delete('backups/out.json');
        }
    }

    public function test_backup_user_data()
    {
        $user = User::factory()->create();
        $job = new BackupUserData($user->id, 'out.json');
        $job->handle();
        $this->assertJsonStringEqualsJsonString(
            $user->toJson(),
            Storage::disk('public')->get('backups/out.json')
        );
    }

    public function tearDown(): void
    {
        parent::tearDown();
        if (Storage::disk('public')->exists('backups/out.json')) {
            Storage::disk('public')->delete('backups/out.json');
        }
    }
}
