<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Dosen 1',
            'email' => 'dosen1@kampus.ac.id',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Dosen 2',
            'email' => 'dosen2@kampus.ac.id',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Dosen 3',
            'email' => 'dosen3@kampus.ac.id',
            'password' => Hash::make('password'),
        ]);

        $this->call([
            MahasiswaSeeder::class,
            MatakuliahSeeder::class,
        ]);
    }
}