<?php

namespace App\Http\Controllers;

use App\Jobs\BackupUserData;
use App\Models\User;

class BackupController extends Controller
{
    public function dispatchUserBackupJob(int $userId, string $outputFilepath)
    {
        if (User::find($userId)) {
            BackupUserData::dispatch($userId, $outputFilepath);
        }
    }
}
