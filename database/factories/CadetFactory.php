<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cadet>
 */
class CadetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "edp_number" => fake()->numberBetween(1, 999999),
            "first_name" => fake()->firstName(),
            "middle_name" => fake()->lastName(),
            "last_name" => fake()->lastName(),
            "sex" => rand(1, 0) == 1 ? 'M' : 'F',
            "date_of_birth" => fake()->date(),
            "blood_type" => fake()->bloodType(),
            "height_cm" => fake()->randomFloat(2, 152.4, 182.88),
            "weight_kg" => fake()->randomFloat(2, 50, 100)
        ];
    }
}
