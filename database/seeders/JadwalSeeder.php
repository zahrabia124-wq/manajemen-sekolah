<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Jadwal::create([
            'mapel'=>'Pemrograman Web',
            'kelas'=>'X RPL 1',
            'hari'=>'Senin',
            'jam_mulai'=>'07:00',
            'jam_selesai'=>'08:30',
         ]);

    }
}
