<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Siswa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Data guru
        Guru::create([
            'nip'=>'001',
            'nama'=>'Santi',
            'mata_pelajaran'=>'Pemrograman Web',
            'alamat'=>'Ciamis',
        ]);

        // Data jadwal
        Jadwal::create([
            'mapel'=>'Pemrograman Web',
            'kelas'=>'10',
            'hari'=>'Senin',
            'jam_mulai'=>'07:00',
            'jam_selesai'=>'08:30',
        ]);

        Jadwal::create([
            'mapel'=>'Basis Data',
            'kelas'=>'11',
            'hari'=>'Selasa',
            'jam_mulai'=>'08:30',
            'jam_selesai'=>'10:00',
        ]);

        Jadwal::create([
            'mapel'=>'Bahasa Inggris',
            'kelas'=>'12',
            'hari'=>'Rabu',
            'jam_mulai'=>'10:15',
            'jam_selesai'=>'11:45',
        ]);

        // Data siswa
        Siswa::create([
            'nis'=>'1001',
            'nama'=>'Andi',
            'kelas'=>'10',
            'alamat'=>'Ciamis',
        ]);

        Siswa::create([
            'nis'=>'1002',
            'nama'=>'Sinta',
            'kelas'=>'10',
            'alamat'=>'Banjar',
        ]);

        Siswa::create([
            'nis'=>'1003',
            'nama'=>'Budi',
            'kelas'=>'11',
            'alamat'=>'Tasikmalaya',
        ]);

        Siswa::create([
            'nis'=>'1004',
            'nama'=>'Rina',
            'kelas'=>'12',
            'alamat'=>'Garut',
        ]);
    }
}
