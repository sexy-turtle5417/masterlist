<?php

namespace Database\Seeders;

use App\Models\Cadet;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Semester;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cadets = Cadet::all();
        $semesters = Semester::all();
        $courses = Course::all();

        $basicCadets = $cadets->take(90);
        $advancedCadets = $cadets->skip(90);

        foreach ($basicCadets as $cadet) {
            foreach ($courses->whereIn('title', ["Military Science 1", "Military Science 2"]) as $index => $course) {
                $semester = $semesters->get($index % $semesters->count());

                Enrollment::factory()->create([
                    'cadet_id' => $cadet->id,
                    'course_id' => $course->id,
                    'semester_id' => $semester->id,
                ]);
            }
        }

        foreach ($advancedCadets as $cadet) {
            foreach ($courses as $index => $course) {
                $semester = $semesters->get($index % $semesters->count());

                Enrollment::factory()->create([
                    'cadet_id' => $cadet->id,
                    'course_id' => $course->id,
                    'semester_id' => $semester->id,
                ]);
            }
        }
    }
}
