<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama_lengkap' => "Muhammad Fadli Kurniawan",
            'email' => "fadli@gmail.com",
            'id_level' => 1,
            'password' => bcrypt('123')
        ]);
    }
}
