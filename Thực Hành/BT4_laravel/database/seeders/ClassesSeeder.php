<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            ['grade_level' => 'Pre-K', 'room_number' => 'Room 1'],
            ['grade_level' => 'Kindergarten', 'room_number' => 'Room 2'],
            // Add more classes as needed
        ]);
    }
}