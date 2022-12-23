<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $percents = [10, 12, 56, 89, 100, 23, 67, 56, 34, 66];
        shuffle($percents);
        foreach ($percents as $percent) {
            DB::table('courses')->insert([
                'title' => Str::random(10),
//                'required_percent' => $percent,
            ]);
        }
    }
}
