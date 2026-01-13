@extends('layouts.adminlte')

@section('title', 'Edit Obat')

@section('content_header')
    <h1>Edit Obat</h1>
@stop

@section('content')
<div class="card card-warning">
    <div class="card-body">
        <form action="{{ route('obat.update', $obat->id_obat) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>Kode Obat</label>
                <input type="text" name="kode_obat" class="form-control"
                    value="{{ old('kode_obat', $obat->kode_obat) }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control"
                    value="{{ old('nama_obat', $obat->nama_obat) }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control"
                    value="{{ old('satuan', $obat->satuan) }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Harga Beli</label>
                <input type="number" name="harga_beli" class="form-control"
                    value="{{ old('harga_beli', $obat->harga_beli) }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" class="form-control"
                    value="{{ old('harga_jual', $obat->harga_jual) }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Stok Minimal</label>
                <input type="number" name="stok_min" class="form-control"
                    value="{{ old('stok_min', $obat->stok_min) }}" required>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('obat.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@stop
