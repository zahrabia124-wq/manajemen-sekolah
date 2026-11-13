<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Guru::create([
            'nip'=>'001',
            'nama'=> 'Santi',
            'mata_pelajaran'=>'Pemrograman Web',
            'alamat'=>'Ciamis',
         ]);
    }
}
