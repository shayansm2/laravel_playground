<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class BackupUserData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $userId;
    private string $fileName;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $userId, string $fileName)
    {
        $this->userId = $userId;
        $this->fileName = $fileName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $user = User::find($this->userId);

        if (!Storage::disk('public')->exists('backups')) {
            Storage::disk('public')->makeDirectory('backups');
        }

        Storage::disk('public')->put('backups/' . $this->fileName, $user->toJson());
    }
}
