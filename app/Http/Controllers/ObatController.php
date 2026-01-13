<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        return view('obat.index', compact('obat'));
    }

    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|unique:obat',
            'nama_obat' => 'required',
            'satuan' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok_min' => 'required|integer',
        ]);

        Obat::create($request->all());

        return redirect()->route('obat.index')
            ->with('berhasil', 'Data obat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $request->validate([
            'kode_obat' => 'required|unique:obat,kode_obat,' . $obat->id_obat . ',id_obat',
            'nama_obat' => 'required',
            'satuan' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok_min' => 'required|integer',
        ]);

        $obat->update($request->all());

        return redirect()->route('obat.index')
            ->with('berhasil', 'Data obat berhasil diperbarui');
    }

    public function destroy($id)
    {
        Obat::findOrFail($id)->delete();

        return redirect()->route('obat.index')
            ->with('berhasil', 'Data obat berhasil dihapus');
    }
}
