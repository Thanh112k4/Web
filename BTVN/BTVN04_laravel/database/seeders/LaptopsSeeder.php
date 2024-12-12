<?php

namespace Database\Seeders;

// LaptopsSeeder.php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaptopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laptops')->insert([
            ['brand' => 'Dell', 'model' => 'Inspiron 15 3000', 'specifications' => 'i5, 8GB RAM, 256GB SSD', 'rental_status' => false, 'renter_id' => 1],
            // ... thêm các bản ghi khác
        ]);
    }
}