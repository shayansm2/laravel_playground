<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PartSeeder extends Seeder
{
    public function run()
    {
        $rows = [];
        for ($i = 0; $i < 1000; $i++) {
            $rows[] = [
                'name' => Str::random(10),
                'expires_at' => Carbon::now()->add(rand(0, 3600), 'second'),
                'count' => rand(0, 1000)
            ];
        }
        for ($i = 0; $i < 250; $i++) {
            $rows[] = [
                'name' => Str::random(10),
                'expires_at' => Carbon::now()->sub(rand(0, 3600), 'second'),
                'count' => rand(0, 1000)
            ];
        }
        shuffle($rows);
        foreach ($rows as $row) {
            DB::table('parts')->insert($row);
        }
    }
}
