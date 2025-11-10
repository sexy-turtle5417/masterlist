<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Course::factory()->createMany([
            ["title" => "Military Science 1"],
            ["title" => "Military Science 2"],
            ["title" => "Military Science 31"],
            ["title" => "Military Science 32"],
            ["title" => "Military Science 41"],
            ["title" => "Military Science 42"],
        ]);
    }
}
