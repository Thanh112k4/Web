<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SalesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->randomDigitNotNull(), // Assuming medicine IDs are 1 to 10
                'quantity' => $faker->randomNumber(2),
                'sale_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'customer_phone' => $faker->phoneNumber,
            ]);
        }
    }
}