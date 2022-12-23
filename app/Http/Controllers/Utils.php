<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Str;

trait Utils
{
    public function getUser()
    {
        return User::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'quera',
                'email' => 'quera@quera.ir',
                'plan' => 'silver',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        );
    }

    public function getCourse()
    {
        return Course::firstOrCreate(
            ['id' => 1],
            [
                'title' => Str::random(10)
            ]
        );
    }

    public function getLimit()
    {
        return 25;
    }
}
