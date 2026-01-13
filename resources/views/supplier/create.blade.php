@extends('layouts.adminlte')

@section('title', 'Tambah Supplier')

@section('content_header')
    <h1>Tambah Supplier</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-body">
        <form action="{{ route('supplier.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label>Nama Supplier</label>
                <input type="text" name="nama_supplier" class="form-control" required>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@stop
