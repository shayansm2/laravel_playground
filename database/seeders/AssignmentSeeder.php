<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courseIds = DB::table('courses')->select('id')->get();
        $courseIds = $courseIds->map(function ($courseId) {
            return $courseId->id;
        });
        $rows = [];
        foreach ($courseIds as $courseId) {
            for ($j = 0; $j < 50; $j++) {
                $rows[] = [
                    'course_id' => $courseId,
                    'content' => Str::random(10),
                ];
            }
        }
        shuffle($rows);
        foreach ($rows as $row) {
            DB::table('assignments')->insert($row);
        }
    }
}
