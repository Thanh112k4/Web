<?php

namespace Database\Seeders;

// RentersSeeder.php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('renters')->insert([
            ['name' => 'Nguyễn Văn A', 'phone_number' => '0987654321', 'email' => 'nva@gmail.com'],
            // ... thêm các bản ghi khác
        ]);
    }
}