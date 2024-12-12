<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        // Assuming you have a 'libraries' table with 'id' as the primary key
        $libraries = DB::table('libraries')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence,
                'author' => $faker->name,
                'publication_year' => $faker->year,
                'genre' => $faker->randomElement(['Fiction', 'Non-Fiction', 'Science Fiction']),
                'library_id' => $faker->randomElement($libraries),
            ]);
        }
    }
}