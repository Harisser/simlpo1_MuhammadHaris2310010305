<?php

namespace App\Http\Controllers;

use App\Models\BatchObat;
use App\Models\Obat;
use App\Models\Apotek;
use Illuminate\Http\Request;

class BatchObatController extends Controller
{
    public function index(Request $request)
    {
        $query = BatchObat::with(['obat', 'apotek']);

        if ($request->id_apotek) {
            $query->where('id_apotek', $request->id_apotek);
        }

        $batch = $query->orderBy('expiry_date')->get();
        $apotek = Apotek::all();

        return view('batch.index', compact('batch', 'apotek'));
    }

    public function create()
    {
        return view('batch.create', [
            'obat' => Obat::all(),
            'apotek' => Apotek::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_obat' => 'required|exists:obat,id_obat',
            'id_apotek' => 'required|exists:apotek,id_apotek',
            'kode_batch' => 'required',
            'expiry_date' => 'required|date|after:today',
            'qty_stok' => 'required|integer|min:0'
        ]);

        BatchObat::create($request->all());

        return redirect()->route('batch.index')
            ->with('berhasil', 'Batch obat berhasil ditambahkan');
    }

    public function edit(BatchObat $batch)
    {
        return view('batch.edit', compact('batch'));
    }

    public function update(Request $request, BatchObat $batch)
    {
        $request->validate([
            'qty_stok' => 'required|integer|min:0'
        ]);

        $batch->update([
            'qty_stok' => $request->qty_stok
        ]);

        return redirect()->route('batch.index')
            ->with('berhasil', 'Stok batch berhasil dikoreksi');
    }
}

