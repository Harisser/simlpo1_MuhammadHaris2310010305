<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\BatchObat;
use App\Models\TransaksiPenjualan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total obat
        $totalObat = Obat::count();

        // Total batch
        $totalBatch = BatchObat::count();

        // Total transaksi
        $totalTransaksi = TransaksiPenjualan::count();

        // Stok total per obat
        $stokObat = Obat::select(
                'obat.id_obat',
                'obat.nama_obat',
                'obat.stok_min',
                DB::raw('COALESCE(SUM(batch_obat.qty_stok),0) as total_stok')
            )
            ->leftJoin('batch_obat', 'batch_obat.id_obat', '=', 'obat.id_obat')
            ->groupBy('obat.id_obat', 'obat.nama_obat', 'obat.stok_min')
            ->get();

        // Obat stok menipis / habis
        $stokMenipis = $stokObat->filter(function ($o) {
            return $o->total_stok <= $o->stok_min;
        });

        $penjualanHarian = TransaksiPenjualan::select(
        DB::raw('DATE(tgl_transaksi) as tanggal'),
        DB::raw('SUM(total_bayar) as total')
        )
        ->groupBy(DB::raw('DATE(tgl_transaksi)'))
        ->orderBy('tanggal')
        ->get();


        return view('dashboard', compact(
            'totalObat',
            'totalBatch',
            'totalTransaksi',
            'stokObat',
            'stokMenipis',
            'penjualanHarian'
        ));
    }
}
