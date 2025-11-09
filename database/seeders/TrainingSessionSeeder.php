<?php

namespace Database\Seeders;

use App\Models\TrainingSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TrainingSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TrainingSession::factory()
            ->count(8 * 15)
            ->state(new Sequence(
                ["nth_session" => 1],
                ["nth_session" => 2],
                ["nth_session" => 3],
                ["nth_session" => 4],
                ["nth_session" => 5],
                ["nth_session" => 6],
                ["nth_session" => 7],
                ["nth_session" => 8],
                ["nth_session" => 9],
                ["nth_session" => 10],
                ["nth_session" => 11],
                ["nth_session" => 12],
                ["nth_session" => 13],
                ["nth_session" => 14],
                ["nth_session" => 15],
            ))
            ->create();
    }
}
