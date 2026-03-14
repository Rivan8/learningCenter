<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::insert([
            [
                'nama_event' => 'Event 1',
                'deskripsi_event' => 'Ini adalah event pertama',
                'tanggal_event' => '2022-01-01',
                'waktu_event' => '10:00:00',
                'tempat_event' => 'Tempat A',
                'penyelenggara_event' => 'Penyelenggara A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_event' => 'Event 2',
                'deskripsi_event' => 'Ini adalah event kedua',
                'tanggal_event' => '2022-01-02',
                'waktu_event' => '11:00:00',
                'tempat_event' => 'Tempat B',
                'penyelenggara_event' => 'Penyelenggara B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_event' => 'Event 3',
                'deskripsi_event' => 'Ini adalah event ketiga',
                'tanggal_event' => '2022-01-03',
                'waktu_event' => '12:00:00',
                'tempat_event' => 'Tempat C',
                'penyelenggara_event' => 'Penyelenggara C',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
