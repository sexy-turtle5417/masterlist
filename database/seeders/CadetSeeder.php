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
        Cadet::factory()
            ->count(500)
            ->create()
            ->each(function (Cadet $cadet) {

                $beneficiaries = Beneficiary::factory(random_int(2, 3))->create();
                foreach ($beneficiaries as $beneficiary)
                    $cadet->beneficiaries()->attach($beneficiary->id, [
                        'relationship' => fake()->text(50)
                    ]);

                $addresses = Address::factory(random_int(2, 4))->create();
                foreach ($addresses as $address)
                    $cadet->addresses()->attach($address->id, [
                        'title' => fake()->text(50)
                    ]);
            });
    }
}
