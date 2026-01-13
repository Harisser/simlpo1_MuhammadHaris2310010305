@extends('layouts.adminlte')

@section('title', 'Tambah Apotek')

@section('content_header')
    <h1>Tambah Apotek</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Input Apotek</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('apotek.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="nama_apotek">Nama Apotek</label>
                    <input
                        type="text"
                        name="nama_apotek"
                        class="form-control"
                        value="{{ old('nama_apotek') }}"
                        required
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea
                        name="alamat"
                        class="form-control"
                        rows="3"
                        required
                    >{{ old('alamat') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>

                <a href="{{ route('apotek.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
@stop
