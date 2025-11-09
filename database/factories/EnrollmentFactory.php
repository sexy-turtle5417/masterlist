<?php

namespace Database\Factories;

use App\Models\Cadet;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    public function definition(): array
    {
        static $used = [];
        static $cadetIds;
        static $courseIds;
        static $semesterIds;

        // Load IDs once
        if (!isset($cadetIds)) {
            $cadetIds = Cadet::pluck('id')->toArray();
            $courseIds = Course::pluck('id')->toArray();
            $semesterIds = Semester::pluck('id')->toArray();

            if (empty($cadetIds) || empty($courseIds) || empty($semesterIds)) {
                throw new \Exception("Cadets, Courses, and Semesters must exist before creating Enrollments.");
            }
        }

        // Ensure there are still possible unique combinations
        $maxCombos = count($cadetIds) * count($courseIds) * count($semesterIds);
        if (count($used) >= $maxCombos) {
            throw new \Exception("No more unique cadet-course-semester combinations available.");
        }

        // Pick a new unique combination
        do {
            $cadetId = fake()->randomElement($cadetIds);
            $courseId = fake()->randomElement($courseIds);
            $semesterId = fake()->randomElement($semesterIds);
            $key = "{$cadetId}-{$courseId}-{$semesterId}";
        } while (isset($used[$key]));

        $used[$key] = true;

        return [
            'cadet_id' => $cadetId,
            'course_id' => $courseId,
            'semester_id' => $semesterId,
        ];
    }
}
