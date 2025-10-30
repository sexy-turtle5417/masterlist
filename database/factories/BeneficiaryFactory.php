<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficiary>
 */
class BeneficiaryFactory extends Factory
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
            "first_name" => fake()->firstName(),
            "middle_name" => fake()->lastName(),
            "last_name" => fake()->lastName(),
            "sex" => rand(0, 1) == 1 ? 'M' : 'F'
        ];
    }
}
