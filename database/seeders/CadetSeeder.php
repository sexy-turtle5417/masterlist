<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Beneficiary;
use App\Models\Cadet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CadetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cadet::factory()->count(500)
            ->hasAttached(
                Address::factory()->count(2),
                ["title" => fake()->text(50)]
            )->hasAttached(
                Beneficiary::factory()->count(rand(2, 3)),
                ['relationship' => fake()->text(50)]
            )->create();
    }
}
