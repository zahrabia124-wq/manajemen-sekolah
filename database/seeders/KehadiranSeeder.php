<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kehadiran;

class KehadiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kehadiran::create([
            'siswa_id' => 1,
            'tanggal' => '2026-11-12',
            'status' => 'Hadir',
            'keterangan' => null,
        ]);

        Kehadiran::create([
            'siswa_id' => 2,
            'tanggal' => '2026-11-12',
            'status' => 'Izin',
            'keterangan' => 'Ada keperluan keluarga',
        ]);

        Kehadiran::create([
            'siswa_id' => 3,
            'tanggal' => '2026-11-12',
            'status' => 'Sakit',
            'keterangan' => 'Demam',
        ]);

        Kehadiran::create([
            'siswa_id' => 4,
            'tanggal' => '2026-11-12',
            'status' => 'Alpa',
            'keterangan' => null,
        ]);
    }
}
