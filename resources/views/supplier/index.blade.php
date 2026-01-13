@extends('layouts.adminlte')

@section('title', 'Data Supplier')

@section('content_header')
    <h1>Data Supplier</h1>
@stop

@section('content')
@if(session('berhasil'))
    <div class="alert alert-success">{{ session('berhasil') }}</div>
@endif

<a href="{{ route('supplier.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah Supplier
</a>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Supplier</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($supplier as $item)
                <tr>
                    <td>{{ $item->id_supplier }}</td>
                    <td>{{ $item->nama_supplier }}</td>
                    <td>
                        <a href="{{ route('supplier.edit', $item->id_supplier) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('supplier.destroy', $item->id_supplier) }}"
                              method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus supplier ini?')">
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
