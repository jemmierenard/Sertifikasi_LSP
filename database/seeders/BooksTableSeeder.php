<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert([
            [
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'publisher' => 'Bentang Pustaka',
                'published_date' => '2005-09-01',
            ],
            [
                'title' => 'Bumi',
                'author' => 'Tere Liye',
                'publisher' => 'Gramedia Pustaka Utama',
                'published_date' => '2014-02-01',
            ],
            [
                'title' => 'Perahu Kertas',
                'author' => 'Dee Lestari',
                'publisher' => 'Bentang Pustaka',
                'published_date' => '2009-01-01',
            ],
            [
                'title' => 'Cantik Itu Luka',
                'author' => 'Eka Kurniawan',
                'publisher' => 'Gramedia Pustaka Utama',
                'published_date' => '2002-09-01',
            ],
            [
                'title' => 'Pulang',
                'author' => 'Leila S. Chudori',
                'publisher' => 'KPG (Kepustakaan Populer Gramedia)',
                'published_date' => '2012-01-01',
            ],
            [
                'title' => 'Orang-Orang Biasa',
                'author' => 'Andrea Hirata',
                'publisher' => 'Bentang Pustaka',
                'published_date' => '2019-04-01',
            ],
        ]);
    }
}
