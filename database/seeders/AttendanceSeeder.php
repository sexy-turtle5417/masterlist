<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Enrollment;
use App\Models\TrainingSession;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $count = Enrollment::count() * TrainingSession::count();
        Attendance::factory()
            ->count($count)
            ->create();
    }
}
