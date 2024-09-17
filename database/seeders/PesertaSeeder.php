<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr; // Import Arr untuk menggunakan Arr::random

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $jurusanIds = range(1, 15);

        foreach (range(1, 50) as $index) {
            DB::table('peserta_pelatihan')->insert([
                'id_jurusan' => $jurusanIds[array_rand($jurusanIds)],
                'id_gelombang' => 1, // Assuming id_gelombang ranges from 1 to 10
                'nama_lengkap' => 'Nama Lengkap ' . $index,
                'nik' => '123456789' . str_pad($index, 4, '0', STR_PAD_LEFT),
                'kartu_keluarga' => 'KK' . str_pad($index, 6, '0', STR_PAD_LEFT),
                'jenis_kelamin' => Arr::random(['L', 'P']),
                'tempat_lahir' => 'Kota ' . $index,
                'tanggal_lahir' => now()->subYears(rand(18, 30))->toDateString(),
                'pendidikan_terakhir' => Arr::random(['SMA', 'D3', 'S1', 'S2']),
                'nama_sekolah' => 'Sekolah ' . $index,
                'kejuruan' => 'Kejuruan ' . $index,
                'nomorHp' => '0821' . rand(10000000, 99999999),
                'email' => 'peserta' . $index . '@example.com',
                'aktivasi_saat_ini' => 0, // Default value as per your initial setup
                'status' => 0,
            ]);
        }
    }
}
