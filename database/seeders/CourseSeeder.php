<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::insert(
            [
                ["title" => "Military Science 1"],
                ["title" => "Military Science 2"],
                ["title" => "Military Science 31"],
                ["title" => "Military Science 32"],
                ["title" => "Military Science 41"],
                ["title" => "Military Science 42"]
            ]
        );
    }
}
