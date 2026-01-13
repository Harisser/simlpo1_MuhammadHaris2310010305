@extends('layouts.adminlte')

@section('title', 'Edit Supplier')

@section('content_header')
    <h1>Edit Supplier</h1>
@stop

@section('content')
<div class="card card-warning">
    <div class="card-body">
        <form action="{{ route('supplier.update', $supplier->id_supplier) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>Nama Supplier</label>
                <input
                    type="text"
                    name="nama_supplier"
                    class="form-control"
                    value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
                    required
                >
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@stop
