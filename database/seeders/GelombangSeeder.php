<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GelombangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gelombang = ['Gelombang 1', 'Gelombang 2', 'Gelombang 3'];
        foreach ($gelombang as $gelombangs) {
            DB::table('gelombang')->insert([
                'nama_gelombang' => $gelombangs
            ]);
        }
    }
}
