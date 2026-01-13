@extends('layouts.adminlte')

@section('title', 'Tambah User')

@section('content_header')
    <h1>Tambah User</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Role</label>
                <select name="role" class="form-control" required>
                    <option value="AdminDinkes">Admin Dinkes</option>
                    <option value="Apoteker">Apoteker</option>
                    <option value="Kasir">Kasir</option>
                    <option value="Driver">Driver</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Apotek</label>
                <select name="id_apotek" class="form-control">
                    <option value="">-- Tidak Ada --</option>
                    @foreach($apotek as $a)
                        <option value="{{ $a->id_apotek }}">{{ $a->nama_apotek }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Status</label>
                <select name="is_active" class="form-control">
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@stop
