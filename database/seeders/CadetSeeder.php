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
            ->create()
            ->each(function (Cadet $cadet) {

                $beneficiaries = Beneficiary::factory()
                    ->count(random_int(2, 3))
                    ->create()
                    ->each(function (Beneficiary $beneficiary) {
                        $contactNumbers = ContactNumber::factory(random_int(1, 2))->create();
                        foreach($contactNumbers as $contactNumber)
                            $beneficiary->contactNumbers()->attach($contactNumber->id, [
                                'title' => fake()->text(50)
                            ]);
                    });

                foreach ($beneficiaries as $beneficiary)
                    $cadet->beneficiaries()->attach($beneficiary->id, [
                        'relationship' => fake()->text(50)
                    ]);

                $addresses = Address::factory(random_int(2, 4))->create();
                foreach ($addresses as $address)
                    $cadet->addresses()->attach($address->id, [
                        'title' => fake()->text(50)
                    ]);

                $contactNumbers = ContactNumber::factory(random_int(1, 2))->create();
                foreach ($contactNumbers as $contactNumber)
                    $cadet->contactNumbers()->attach($contactNumber->id, [
                        'title' => fake()->text(50)
                    ]);
            });
    }
}
