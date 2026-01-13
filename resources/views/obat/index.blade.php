@extends('layouts.adminlte')

@section('title', 'Data Obat')

@section('content_header')
    <h1>Data Obat</h1>
@stop

@section('content')
@if(session('berhasil'))
    <div class="alert alert-success">{{ session('berhasil') }}</div>
@endif

<a href="{{ route('obat.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah Obat
</a>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Obat</th>
                    <th>Satuan</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok Min</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obat as $item)
                <tr>
                    <td>{{ $item->kode_obat }}</td>
                    <td>{{ $item->nama_obat }}</td>
                    <td>{{ $item->satuan }}</td>
                    <td>Rp {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                    <td>{{ $item->stok_min }}</td>
                    <td>
                        <a href="{{ route('obat.edit', $item->id_obat) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('obat.destroy', $item->id_obat) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data obat ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
