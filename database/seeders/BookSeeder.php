<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'title' => 'book1',
            'author' => 'author1',
            'photo' => 'book1.jpg',
            'genre_id' => 1,
            'desc' => 'desc book 1',
            'publish_date' => '2020-12-12'
        ]);
        DB::table('books')->insert([
            'title' => 'book2',
            'author' => 'author2',
            'photo' => 'book2.jpg',
            'genre_id' => 1,
            'desc' => 'desc book 2',
            'publish_date' => '2020-12-12'
        ]);
        DB::table('books')->insert([
            'title' => 'book3',
            'author' => 'author3',
            'photo' => 'book3.jpg',
            'genre_id' => 2,
            'desc' => 'desc book 3',
            'publish_date' => '2020-12-12'
        ]);
        DB::table('books')->insert([
            'title' => 'book4',
            'author' => 'author4',
            'photo' => 'book4.jpg',
            'genre_id' => 3,
            'desc' => 'desc book 4',
            'publish_date' => '2020-12-12'
        ]);
        DB::table('books')->insert([
            'title' => 'book5',
            'author' => 'author5',
            'photo' => 'book5.jpg',
            'genre_id' => 3,
            'desc' => 'desc book 5',
            'publish_date' => '2020-12-12'
        ]);
    }
}
