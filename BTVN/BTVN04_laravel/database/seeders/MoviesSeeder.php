<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MoviesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $cinemas = DB::table('cinemas')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->sentence(3),
                'director' => $faker->name,
                'release_date' => $faker->date(),
                'duration' => $faker->numberBetween(90, 180),
                'cinema_id' => $faker->randomElement($cinemas),
            ]);
        }
    }
}