<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            'nama' => 'Nisa Nurliah',
            'nim' => 'D122311003',
            'prodi' => 'AJ-RMIK',
            'email' => 'adnis1002@gmail.com'
        ]);
    }
}
