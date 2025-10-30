<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $schoolYear1 = SchoolYear::create(["start" => 2024, "end" => 2025]);
        $schoolYear2 = SchoolYear::create(["start" => 2025, "end" => 2026]);

        $schoolYear1->semesters()->createMany([
            ["nth_semester" => 1],
            ["nth_semester" => 2]
        ]);

        $schoolYear2->semesters()->createMany([
            ["nth_semester" => 1]
        ]);
    }
}
