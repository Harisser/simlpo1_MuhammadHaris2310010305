@extends('layouts.adminlte')

@section('title', 'Edit Apotek')

@section('content_header')
    <h1>Edit Apotek</h1>
@stop

@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Form Edit Apotek</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('apotek.update', $apotek->id_apotek) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="nama_apotek">Nama Apotek</label>
                    <input
                        type="text"
                        name="nama_apotek"
                        class="form-control"
                        value="{{ old('nama_apotek', $apotek->nama_apotek) }}"
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
                    >{{ old('alamat', $apotek->alamat) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Update
                </button>

                <a href="{{ route('apotek.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
@stop
