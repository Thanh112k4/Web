<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('computers')->insert([
                'computer_name' => "Lab1-PC$i",
                'model' => $faker->word . ' ' . $faker->randomNumber(4),
                'operating_system' => 'Windows 11 Pro',
                'processor' => 'Intel Core i5-' . $faker->randomNumber(4),
                'memory' => $faker->randomDigitNotNull() * 8,
                'available' => $faker->boolean(),
            ]);
        }
    }
}