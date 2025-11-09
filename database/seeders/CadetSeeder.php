<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Beneficiary;
use App\Models\Cadet;
use App\Models\ContactNumber;
use Illuminate\Database\Seeder;

class CadetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cadet::factory()
            ->count(100)
            ->hasAttached(
                Address::factory()->count(2),
                fn() => ["title" => fake()->randomElement(['Home', 'School', 'Work'])]
            )
            ->hasAttached(
                ContactNumber::factory()->count(2),
                fn() => ["title" => fake()->randomElement(['Mobile', 'Home', 'Work'])]
            )
            ->hasAttached(
                Beneficiary::factory()
                    ->count(2)
                    ->hasAttached(
                        ContactNumber::factory()->count(1),
                        fn() => ["title" => fake()->randomElement(['Mobile', 'Home', 'Work'])]
                    ),
                fn() => ["relationship" => fake()->randomElement(['Parent', 'Sibling', 'Relative', 'Guardian'])]
            )
            ->create();
    }
}
