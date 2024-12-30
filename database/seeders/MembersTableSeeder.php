<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'name' => 'Agung Budi',
                'address' => 'Jl. Merdeka No.1, Surabaya',
                'phone_number' => '081234567890',
            ],
            [
                'name' => 'Shinta Catherine',
                'address' => 'Jl. Pahlawan No.10, Jakarta',
                'phone_number' => '081987654321',
            ],
            [
                'name' => 'Alice Wong',
                'address' => 'Jl. Sudirman No.5, Bandung',
                'phone_number' => '085678123456',
            ],
            [
                'name' => 'Bob Jerry',
                'address' => 'Jl. Gajah Mada No.7, Malang',
                'phone_number' => '082345678901',
            ],
        ]);
    }
}
