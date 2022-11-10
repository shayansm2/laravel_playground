<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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

        $path = __DIR__ . "/../../public/backups";

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        file_put_contents(
            $path . '/' . $this->fileName . '.json',
            json_encode($user->attributesToArray())
        );
    }
}
