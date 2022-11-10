<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CourseStatsRepository
{
    public static function getCourseFinishers(): Collection
    {
        return DB::table('passed_assignments', 'pa')
            ->join('users', 'pa.user_id', '=', 'users.id')
            ->join('assignments', 'pa.assignment_id', '=', 'assignments.id')
            ->join('courses', 'assignments.course_id', '=', 'courses.id')
            ->groupBy('users.id', 'courses.id', 'courses.required_percent')
            ->havingRaw('count(1) / (select count(1) from assignments where course_id = courses.id) * 100 >= courses.required_percent')
            ->orderBy('courses.id')
            ->orderBy('users.id')
            ->get(["users.id as user_id", "courses.id as course_id"]);
    }
}
