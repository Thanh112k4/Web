<?php

namespace Database\Seeders;

// database/seeders/LibrariesSeeder.php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrariesSeeder extends Seeder
{
    public function run()
    {
        DB::table('libraries')->insert([
            ['name' => 'Thư viện Quốc gia', 'address' => 'Hà Nội', 'contact_number' => '02438255368'],
            // ...
        ]);
    }
}