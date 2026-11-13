<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
