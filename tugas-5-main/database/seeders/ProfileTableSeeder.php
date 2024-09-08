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
            'nama' => 'Yulyanti',
            'nim' => 'D11233025',
            'prodi' => 'IF AJ',
            'email' => 'yulyanti668@gmail.com'
        ]);
    }
}
