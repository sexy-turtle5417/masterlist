<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
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
            "unit_number" => fake()->buildingNumber(),
            "street_name" => fake()->streetName(),
            "address_line_1" => fake()->lastName(),
            "address_line_2" => fake()->lastName(),
            "city" => fake()->city(),
            "region" => fake()->state()
        ];
    }
}
