<?php

namespace Database\Seeders;

use App\Models\Cadet;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\SchoolYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $semester = SchoolYear::create([
            "start" => 2024,
            "end" => 2025
        ])->semesters()->create([
            "nth_semester" => 1
        ]);

        $course = Course::create([
            "title" => "Military Science 1"
        ]);

        $cadets = Cadet::all();

        foreach ($cadets as $cadet) {
            Enrollment::create([
                "course_id" => $course->id,
                "semester_id" => $semester->id,
                "cadet_id" => $cadet->id
            ]);
        }
    }
}
