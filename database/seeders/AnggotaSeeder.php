<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('anggota')->insert([
            [
                
            ],
            [
                'nomor_anggota' => 'A002',
                'namalengkap' => 'Jane Smith',
                'email' => 'jane@example.com',
                'nomor_hp' => '08123456780',
                'alamat' => 'Jl. Contoh No. 2',
            ],
            [
                'nomor_anggota' => 'A003',
                'namalengkap' => 'Alex Brown',
                'email' => 'alex@example.com',
                'nomor_hp' => '08123456781',
                'alamat' => 'Jl. Contoh No. 3',
            ],
            [
                'nomor_anggota' => 'A004',
                'namalengkap' => 'Emily Davis',
                'email' => 'emily@example.com',
                'nomor_hp' => '08123456782',
                'alamat' => 'Jl. Contoh No. 4',
            ],
            [
                'nomor_anggota' => 'A005',
                'namalengkap' => 'Michael Evans',
                'email' => 'michael@example.com',
                'nomor_hp' => '08123456783',
                'alamat' => 'Jl. Contoh No. 5',
            ],
            [
                'nomor_anggota' => 'A006',
                'namalengkap' => 'Sarah Franklin',
                'email' => 'sarah@example.com',
                'nomor_hp' => '08123456784',
                'alamat' => 'Jl. Contoh No. 6',
            ],
            [
                'nomor_anggota' => 'A007',
                'namalengkap' => 'Kevin Garcia',
                'email' => 'kevin@example.com',
                'nomor_hp' => '08123456785',
                'alamat' => 'Jl. Contoh No. 7',
            ],
        ]);
    }
}
