<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
    \App\Models\Mahasiswa::factory()
        ->count(50)
        ->create();
    }
};