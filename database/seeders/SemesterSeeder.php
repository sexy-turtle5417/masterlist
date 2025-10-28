<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Seeder;
use App\Models\Course;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       SchoolYear::firstOrCreate([
            "start" => 2024,
            "end" => 2025
       ])->semesters() 
        ->create(["nth_semester" => '1'])
        ->courses()
        ->saveMany([
            new Course(["title" => "Military Science 1"]),
            new Course(["title" => "Military Science 31"]),
            new Course(["title" => "Military Science 41"])
        ]);

        SchoolYear::firstOrCreate([
            "start" => 2025,
            "end" => 2026
        ])->semesters() 
        ->create(["nth_semester" => '2'])
        ->courses()
        ->saveMany([
            new Course(["title" => "Military Science 2"]),
            new Course(["title" => "Military Science 32"]),
            new Course(["title" => "Military Science 42"])
        ]);
    }
}
