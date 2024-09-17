<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = ['Administrator', 'PIC', 'Admin Aplikasi'];

        foreach ($role as $value) {
            DB::table('roles')->insert([
                'nama_role' => $value
            ]);
        }
    }
}
