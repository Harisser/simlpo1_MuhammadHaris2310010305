@extends('layouts.adminlte')

@section('title', 'Tambah Obat')

@section('content_header')
    <h1>Tambah Obat</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-body">
        <form action="{{ route('obat.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label>Kode Obat</label>
                <input type="text" name="kode_obat" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Harga Beli</label>
                <input type="number" name="harga_beli" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Stok Minimal</label>
                <input type="number" name="stok_min" class="form-control" required>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('obat.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@stop
