<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "student_number" => fake()->unique()->randomNumber(6, true),
            "first_name" => fake()->firstName(),
            "middle_name" => fake()->optional()->lastName(),
            "last_name" => fake()->lastName(),
            "gender" => fake()->randomElement(['MALE', 'FEMALE']),
            "date_of_birth" => fake()->optional()->date(),
            "height_cm" => fake()->optional()->randomFloat(2, 100, 200),
            "weight_kg" => fake()->optional()->randomFloat(2, 30, 150),
            "blood_type" => fake()->optional()->bloodType()
        ];
    }
}
