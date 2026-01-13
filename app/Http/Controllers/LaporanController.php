<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\TransaksiPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function stok()
    {
        $stok = Obat::select(
                'obat.nama_obat',
                'obat.stok_min',
                DB::raw('COALESCE(SUM(batch_obat.qty_stok),0) as total_stok')
            )
            ->leftJoin('batch_obat', 'batch_obat.id_obat', '=', 'obat.id_obat')
            ->groupBy('obat.nama_obat', 'obat.stok_min')
            ->get();

        return view('laporan.stok', compact('stok'));
    }

    public function penjualan(Request $request)
    {
        $query = TransaksiPenjualan::query();

        if ($request->from && $request->to) {
            $query->whereBetween('tgl_transaksi', [
                $request->from . ' 00:00:00',
                $request->to . ' 23:59:59'
            ]);
        }

        $penjualan = $query->select(
                DB::raw('DATE(tgl_transaksi) as tanggal'),
                DB::raw('COUNT(*) as total_transaksi'),
                DB::raw('SUM(total_bayar) as total_pendapatan')
            )
            ->groupBy(DB::raw('DATE(tgl_transaksi)'))
            ->orderBy('tanggal')
            ->get();

        return view('laporan.penjualan', compact('penjualan'));
    }

    public function penjualanPrint(Request $request)
    {
        $penjualan = TransaksiPenjualan::select(
                DB::raw('DATE(tgl_transaksi) as tanggal'),
                DB::raw('COUNT(*) as total_transaksi'),
                DB::raw('SUM(total_bayar) as total_pendapatan')
            )
            ->groupBy(DB::raw('DATE(tgl_transaksi)'))
            ->orderBy('tanggal')
            ->get();

        return view('laporan.penjualan_print', compact('penjualan'));
    }
}
