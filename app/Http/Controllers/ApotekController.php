<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apotek;

class ApotekController extends Controller
{
    public function index()
    {
        $banyak_apotek = Apotek::all();
        return view('apotek.index', compact('banyak_apotek'));
    }

    public function create()
    {
        return view('apotek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_apotek' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
        ]);

        Apotek::create([
            'nama_apotek' => $request->nama_apotek,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('apotek.index')
            ->with('berhasil', 'Apotek berhasil ditambahkan.');
    }

    public function edit(Apotek $apotek)
    {
        return view('apotek.edit', compact('apotek'));
    }

    public function update(Request $request, Apotek $apotek)
    {
        $request->validate([
            'nama_apotek' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
        ]);

        $apotek->update([
            'nama_apotek' => $request->nama_apotek,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('apotek.index')
            ->with('berhasil', 'Apotek berhasil diperbarui.');
    }

    public function destroy(Apotek $apotek)
    {
        $apotek->delete();

        return redirect()->route('apotek.index')
            ->with('berhasil', 'Apotek berhasil dihapus.');
    }
}
