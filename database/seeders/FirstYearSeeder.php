<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cadet;
use App\Models\Course;
use App\Models\CourseSemester;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Student;

class FirstYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $schoolYear = SchoolYear::factory()->create([
            'start_year' => 2024,
            'end_year' => 2025
        ]);

        $firstSemester = Semester::factory()
            ->for($schoolYear)
            ->create(["nth_semester" => 1]);

        $secondSemester = Semester::factory()
            ->for($schoolYear)
            ->create(["nth_semester" => 2]);

        $courses = Course::all();

        $courseSemesters = $courses->map(function ($course) use ($firstSemester, $secondSemester) {
            switch ($course->id) {
                case 1:
                    return CourseSemester::factory()
                        ->for($course)
                        ->for($firstSemester)
                        ->create();
                    break;
                case 2:
                    return CourseSemester::factory()
                        ->for($course)
                        ->for($secondSemester)
                        ->create();
                    break;
                case 3:
                    return CourseSemester::factory()
                        ->for($course)
                        ->for($firstSemester)
                        ->create();
                    break;
                case 4:
                    return CourseSemester::factory()
                        ->for($course)
                        ->for($secondSemester)
                        ->create();
                    break;
                case 5:
                    return CourseSemester::factory()
                        ->for($course)
                        ->for($firstSemester)
                        ->create();
                    break;
                case 6:
                    return CourseSemester::factory()
                        ->for($course)
                        ->for($secondSemester)
                        ->create();
                    break;
                default:
                    return null;
            }
        })->filter();


        $basicCadets = Student::factory()
            ->count(80)
            ->create();

        $secondClassCadets = Student::factory()
            ->count(15)
            ->create();

        $firstClassCadets = Student::factory()
            ->count(5)
            ->create();

        $ms1Cadets = $basicCadets->map(function ($student) {
            $militaryScience1 = CourseSemester::where('course_id', 1)
                ->where('semester_id', 1)
                ->first();
            return Cadet::factory()
                ->for($student)
                ->for($militaryScience1)
                ->create();
        });

        $ms2Cadets = $basicCadets->map(function ($student) {
            $militaryScience2 = CourseSemester::where('course_id', 2)
                ->where('semester_id', 2)
                ->first();
            return Cadet::factory()
                ->for($student)
                ->for($militaryScience2)
                ->create();
        });

        $ms31Cadets = $secondClassCadets->map(function ($student) {
            $militaryScience31 = CourseSemester::where('course_id', 3)
                ->where('semester_id', 1)
                ->first();
            return Cadet::factory()
                ->for($student)
                ->for($militaryScience31)
                ->create();
        });

        $ms32Cadets = $secondClassCadets->map(function ($student) {
            $militaryScience32 = CourseSemester::where('course_id', 4)
                ->where('semester_id', 2)
                ->first();
            return Cadet::factory()
                ->for($student)
                ->for($militaryScience32)
                ->create();
        });

        $ms41Cadets = $firstClassCadets->map(function ($student) {
            $militaryScience41 = CourseSemester::where('course_id', 5)
                ->where('semester_id', 1)
                ->first();
            return Cadet::factory()
                ->for($student)
                ->for($militaryScience41)
                ->create();
        });

        $ms42Cadets = $firstClassCadets->map(function ($student) {
            $militaryScience42 = CourseSemester::where('course_id', 6)
                ->where('semester_id', 2)
                ->first();
            return Cadet::factory()
                ->for($student)
                ->for($militaryScience42)
                ->create();
        });
    }
}
