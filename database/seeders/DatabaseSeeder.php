<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CourseSeeder::class,
//            AssignmentSeeder::class,
//            PassedAssignmentSeeder::class,
        ]);
//        User::factory(10)->create();
//        Discount::factory(10)->create();
    }
}
