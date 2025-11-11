<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\Cadet;
use App\Models\Course;
use App\Models\CourseSemester;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Student;
use App\Models\TrainingSession;

class SecondYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        //
        $schoolYear = SchoolYear::factory()->create([
            'start_year' => 2025,
            'end_year' => 2026
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

        $ms1Cadets = $basicCadets->map(function ($student) use ($courseSemesters) {
            $militaryScience1 = $courseSemesters[0];
            return Cadet::factory()
                ->for($student)
                ->for($militaryScience1)
                ->create();
        });

        $ms2Cadets = $basicCadets->map(function ($student) use ($courseSemesters) {
            $militaryScience2 = $courseSemesters[1];
            return Cadet::factory()
                ->for($student)
                ->for($militaryScience2)
                ->create();
        });

        $ms31Cadets = $secondClassCadets->map(function ($student) use ($courseSemesters) {
            $militaryScience31 = $courseSemesters[2];
            return Cadet::factory()
                ->for($student)
                ->for($militaryScience31)
                ->create();
        });

        $ms32Cadets = $secondClassCadets->map(function ($student) use ($courseSemesters) {
            $militaryScience32 = $courseSemesters[3];
            return Cadet::factory()
                ->for($student)
                ->for($militaryScience32)
                ->create();
        });

        $ms41Cadets = $firstClassCadets->map(function ($student) use ($courseSemesters) {
            $militaryScience41 = $courseSemesters[4];
            return Cadet::factory()
                ->for($student)
                ->for($militaryScience41)
                ->create();
        });

        $ms42Cadets = $firstClassCadets->map(function ($student) use ($courseSemesters) {
            $militaryScience42 = $courseSemesters[5];
            return Cadet::factory()
                ->for($student)
                ->for($militaryScience42)
                ->create();
        });

        $firstSemesterCadets = $firstSemester->cadets()->get();

        for ($i = 0; $i < 15; $i++) {
            $trainingSession = TrainingSession::factory()->create();
            foreach ($firstSemesterCadets as $cadet) {
                $attendance = Attendance::factory()
                    ->for($trainingSession)
                    ->for($cadet)
                    ->create();
            }
        }

        $secondSemesterCadets = $secondSemester->cadets()->get();

        for ($i = 0; $i < 15; $i++) {
            $trainingSession = TrainingSession::factory()->create();
            foreach ($secondSemesterCadets as $cadet) {
                $attendance = Attendance::factory()
                    ->for($trainingSession)
                    ->for($cadet)
                    ->create();
            }
        }
    }
}
