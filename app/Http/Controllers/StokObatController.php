<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Apotek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokObatController extends Controller
{
    public function index(Request $request)
    {
        $id_apotek = $request->id_apotek;

        $stok = Obat::select(
                'obat.id_obat',
                'obat.nama_obat',
                DB::raw('SUM(batch_obat.qty_stok) as total_stok')
            )
            ->join('batch_obat', 'batch_obat.id_obat', '=', 'obat.id_obat')
            ->when($id_apotek, function ($q) use ($id_apotek) {
                $q->where('batch_obat.id_apotek', $id_apotek);
            })
            ->groupBy('obat.id_obat', 'obat.nama_obat')
            ->get();

        $apotek = Apotek::all();

        return view('stok.index', compact('stok', 'apotek'));
    }
}

