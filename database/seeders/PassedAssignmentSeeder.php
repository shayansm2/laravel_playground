<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PassedAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [];
        for ($userId = 1; $userId <= 10; $userId++) {
            for ($courseId = 1; $courseId <= 10; $courseId++) {
                $passedAssignmentsCount = intdiv(rand(1, 100), 2);
                for ($i = 0; $i < $passedAssignmentsCount; $i++) {
                    $assignmentId = rand(($courseId - 1) * 50 + 1, ($courseId - 1) * 50 + 50);
                    $row = [
                        'user_id' => $userId,
                        'assignment_id' => $assignmentId,
                    ];
                    if (in_array($row, $rows)) {
                        $i--;
                        continue;
                    }
                    $rows[] = $row;
                }
            }
        }
        shuffle($rows);
        foreach ($rows as $row) {
            DB::table('passed_assignments')->insert($row);
        }
    }
}
