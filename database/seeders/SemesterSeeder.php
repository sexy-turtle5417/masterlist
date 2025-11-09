<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SchoolYear::factory()
            ->count(4)
            ->has(
                Semester::factory()
                    ->count(2)
                    ->state(new Sequence(["nth_semester" => 1], ["nth_semester" => 2]))
            )
            ->create();
    }
}
