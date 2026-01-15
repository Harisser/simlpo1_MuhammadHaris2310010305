<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    public function run()
    {
        DB::table('obat')->insert([
            [
                'kode_obat' => 'OBT001',
                'nama_obat' => 'Paracetamol',
                'satuan' => 'Tablet',
                'harga_beli' => 500,
                'harga_jual' => 1000,
                'stok_min' => 20
            ],
            [
                'kode_obat' => 'OBT002',
                'nama_obat' => 'Amoxicillin',
                'satuan' => 'Kapsul',
                'harga_beli' => 800,
                'harga_jual' => 1500,
                'stok_min' => 15
            ]
        ]);
    }
}
