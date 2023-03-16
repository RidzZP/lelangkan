<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class petugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_petugas')->insert([
            'nama_petugas' => Str::random(5),
            'username' => Str::random(4),
            'password' => Hash::make('password'),
            'id_level' => 1,
        ]);
    }
}
