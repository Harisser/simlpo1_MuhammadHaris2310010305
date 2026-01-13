@extends('layouts.adminlte')

@section('content')
<h3>Transaksi Penjualan</h3>

<form method="POST" action="{{ route('penjualan.store') }}">
@csrf

<div class="mb-2">
    <label>Batch Obat</label>
    <select name="id_batch" class="form-control" required>
        <option value="">Pilih Batch</option>
        @foreach ($batch as $b)
            <option value="{{ $b->id_batch }}">
                {{ $b->obat->nama_obat }}
                | Batch: {{ $b->kode_batch }}
                | Apotek: {{ $b->apotek->nama_apotek }}
                | Stok: {{ $b->qty_stok }}
                | Exp: {{ $b->expiry_date }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-2">
    <label>Qty Jual</label>
    <input type="number" name="qty_jual" class="form-control" min="1" required>
</div>

<div class="mb-2">
    <label>Diskon</label>
    <input type="number" name="diskon" class="form-control" min="0" value="0">
</div>

<button class="btn btn-primary">Simpan Transaksi</button>
</form>
@endsection
