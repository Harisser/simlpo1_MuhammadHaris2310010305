<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier.index', compact('supplier'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')
            ->with('berhasil', 'Supplier berhasil ditambahkan');
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $request->validate([
            'nama_supplier' => 'required',
        ]);

        $supplier->update($request->all());

        return redirect()->route('supplier.index')
            ->with('berhasil', 'Supplier berhasil diperbarui');
    }

    public function destroy($id)
    {
        Supplier::findOrFail($id)->delete();

        return redirect()->route('supplier.index')
            ->with('berhasil', 'Supplier berhasil dihapus');
    }
}
