<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BatchObatSeeder extends Seeder
{
    public function run()
    {
        DB::table('batch_obat')->insert([
            [
                'id_obat' => 1,
                'id_apotek' => 1,
                'kode_batch' => 'BATCH-PARA-01',
                'expiry_date' => Carbon::now()->addMonths(6),
                'qty_stok' => 50
            ],
            [
                'id_obat' => 1,
                'id_apotek' => 1,
                'kode_batch' => 'BATCH-PARA-02',
                'expiry_date' => Carbon::now()->addMonths(3),
                'qty_stok' => 10
            ],
            [
                'id_obat' => 2,
                'id_apotek' => 2,
                'kode_batch' => 'BATCH-AMOX-01',
                'expiry_date' => Carbon::now()->addMonths(4),
                'qty_stok' => 20
            ]
        ]);
    }
}
