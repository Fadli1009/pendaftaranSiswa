<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusan = ['Operator Komputer', 'Bahasa Inggris', 'Desain Grafis', 'Tata Boga', 'Tata Graha', 'Teknik Pendingin', 'Teknik Komputer', 'Otomotis Sepeda Motor', 'Jaringan Komputer', 'Barista', 'Bahasa Korea', 'Makeup Artist', 'Video Editor', 'Content Creator', 'Web Proramming'];

        foreach ($jurusan as $jurusans) {
            DB::table('jurusan')->insert([
                'nama_jurusan' => $jurusans
            ]);
        }
    }
}
