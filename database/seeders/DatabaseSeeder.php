<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cadet;
use App\Models\SchoolYear;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([CadetSeeder::class, SchoolYearSeeder::class]);
        $cadet = Cadet::create([
            "edp_number" => "300943",
            "first_name" => "Jaypee",
            "middle_name" => "Pagalan",
            "last_name" => "Zulieta",
            "sex" => "M",
            "date_of_birth" => "2003-12-20",
            "blood_type" => "O",
            "height_cm" => 170,
            "weight_kg" => 70
        ]);

        $address = Address::create([
            "unit_number" => "12B",
            "street_name" => "Maple Street",
            "address_line_1" => "Prk. Nazareth",
            "address_line_2" => "Brgy. Buenavista",
            "city" => "Pagadian City",
            "region" => "Zamboanga del Sur"
        ]);

        $semester = SchoolYear::create([
            "start" => 2025,
            "end" => 2026
        ])->semesters()->create([
            "nth_semester" => 1
        ]);

        $trainingSession = $semester->trainingSessions()->create([
            "nth_session" => 1,
            "address_id" => $address->id,
            "date_conducted" => "2025-11-15",
            "start_time" => "08:00:00",
            "end_time" => "12:00:00",
            "hours_credit" => 4.0
        ]);

        $course = Course::create([
            "title" => "Military Science 1"
        ]);

        $enrollment = $cadet->enrollments()->create([
            "semester_id" => $semester->id,
            "course_id" => $course->id,
        ]);

        $trainingSession->attendances()->create([
            "enrollment_id" => $enrollment->id,
            "training_session_id" => $trainingSession->id,
            "hours_attended" => 4.0,
            "remarks" => "PRESENT"
        ]);

        $trainingSession2 = $semester->trainingSessions()->create([
            "nth_session" => 2,
            "address_id" => $address->id,
            "date_conducted" => "2025-11-22",
            "start_time" => "08:00:00",
            "end_time" => "12:00:00",
            "hours_credit" => 4.0
        ]);

        $trainingSession2->attendances()->create([
            "enrollment_id" => $enrollment->id,
            "training_session_id" => $trainingSession2->id,
            "hours_attended" => 0.0,
            "remarks" => "ABSENT"
        ]);

        $trainingSession3 = $semester->trainingSessions()->create([
            "nth_session" => 3,
            "address_id" => $address->id,
            "date_conducted" => "2025-11-29",
            "start_time" => "08:00:00",
            "end_time" => "12:00:00",
            "hours_credit" => 4.0
        ]);

        $trainingSession3->attendances()->create([
            "enrollment_id" => $enrollment->id,
            "hours_attended" => 3.75,
            "remarks" => "LATE"
        ]);
    }
}
