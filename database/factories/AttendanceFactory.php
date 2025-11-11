<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $possibleRemarks = [
            "PRESENT",
            "ABSENT",
            "EXCUSED"
        ];

        return [
            "time_in" => fake()->optional()->time(),
            "time_out" => fake()->optional()->time(),
            "hours_credit" => fake()->randomFloat(2, 3, 4),
            "remarks" => fake()->randomElement($possibleRemarks)
        ];
    }
}
