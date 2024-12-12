<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HardwareDevicesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $centers = DB::table('it_centers')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word . ' ' . $faker->word,
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'status' => $faker->boolean,
                'center_id' => $faker->randomElement($centers),
            ]);
        }
    }
}