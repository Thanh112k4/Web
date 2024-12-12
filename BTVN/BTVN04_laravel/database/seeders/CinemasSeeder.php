<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CinemasSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('cinemas')->insert([
                'name' => $faker->company,
                'location' => $faker->city . ', ' . $faker->country,
                'total_seats' => $faker->numberBetween(100, 500),
            ]);
        }
    }
}