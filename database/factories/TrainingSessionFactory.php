<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrainingSession>
 */
class TrainingSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            //
            "address_id" => Address::factory()->create(),
            "date_conducted" => fake()->date(),
            "start_time" => fake()->time(),
            "end_time" => fake()->time(),
            "hours_credit" => 4,
            "is_remedial" => rand(0, 1) == 1 ? true : false,
        ];
    }
}
