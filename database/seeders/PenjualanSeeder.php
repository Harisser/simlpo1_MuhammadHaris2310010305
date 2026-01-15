<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    public function run()
    {
        DB::table('transaksi_penjualan')->insert([
            [
                'tgl_transaksi' => Carbon::now()->subDays(3),
                'id_kasir' => 2,
                'total_bayar' => 5000,
                'diskon' => 0
            ],
            [
                'tgl_transaksi' => Carbon::now()->subDays(1),
                'id_kasir' => 2,
                'total_bayar' => 3000,
                'diskon' => 0
            ]
        ]);
    }
}

