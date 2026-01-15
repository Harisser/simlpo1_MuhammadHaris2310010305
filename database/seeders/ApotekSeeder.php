<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApotekSeeder extends Seeder
{
    public function run()
    {
        DB::table('apotek')->insert([
            [
                'nama_apotek' => 'Apotek Sehat',
                'alamat' => 'Jl. Merdeka No. 1'
            ],
            [
                'nama_apotek' => 'Apotek Sentosa',
                'alamat' => 'Jl. Sudirman No. 10'
            ]
        ]);
    }
}

