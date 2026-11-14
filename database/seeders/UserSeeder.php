<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Akun Guru
        User::create([
            'name' => 'Zahra',
            'email' => 'zahra@gmail.com',
            'password' => Hash::make('3101'),
            'role' => 'Guru'
        ]);

        // Akun Siswa (Pastikan ini ada!)
        User::create([
            'name' => 'Evan Siswa',
            'email' => 'evan@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Siswa'
        ]);
    }
}
