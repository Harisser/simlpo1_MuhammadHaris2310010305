<?php

namespace App\Http\Controllers;

use App\Models\BatchObat;
use App\Models\TransaksiPenjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiPenjualanController extends Controller
{
    public function index()
    {
        $transaksi = TransaksiPenjualan::with('kasir')
            ->orderByDesc('tgl_transaksi')
            ->get();

        return view('penjualan.index', compact('transaksi'));
    }

    public function create()
    {
        // hanya batch yang stok > 0 & belum expired
        $batch = BatchObat::with(['obat', 'apotek'])
            ->where('qty_stok', '>', 0)
            ->where('expiry_date', '>', now())
            ->orderBy('expiry_date') // FIFO
            ->get();

        return view('penjualan.create', compact('batch'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_batch' => 'required|exists:batch_obat,id_batch',
            'qty_jual' => 'required|integer|min:1',
            'diskon'   => 'nullable|numeric|min:0'
        ]);

        DB::transaction(function () use ($request) {

            $batch = BatchObat::lockForUpdate()->findOrFail($request->id_batch);

            // PROTEKSI STOK
            if ($request->qty_jual > $batch->qty_stok) {
                abort(400, 'Stok batch tidak mencukupi');
            }

            $harga = $batch->obat->harga_jual;
            $subtotal = $harga * $request->qty_jual;
            $diskon = $request->diskon ?? 0;

            // SIMPAN HEADER
            $transaksi = TransaksiPenjualan::create([
                'tgl_transaksi' => now(),
                'id_kasir'      => Auth::id(),
                'total_bayar'   => $subtotal - $diskon,
                'diskon'        => $diskon
            ]);

            // SIMPAN DETAIL
            DetailPenjualan::create([
                'id_transaksi'  => $transaksi->id_transaksi,
                'id_batch'      => $batch->id_batch,
                'qty_jual'      => $request->qty_jual,
                'harga_satuan'  => $harga
            ]);

            // KURANGI STOK BATCH
            $batch->decrement('qty_stok', $request->qty_jual);
        });

        return redirect()->route('penjualan.index')
            ->with('berhasil', 'Transaksi berhasil disimpan');
    }
}

