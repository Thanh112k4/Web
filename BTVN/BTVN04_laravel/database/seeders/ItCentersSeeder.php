<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ItCentersSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('it_centers')->insert([
                'name' => $faker->company,
                'location' => $faker->city . ', ' . $faker->country,
                'contact_email' => $faker->unique()->safeEmail,
            ]);
        }
    }
}