@extends('layouts.adminlte')

@section('title', 'Data User')

@section('content_header')
    <h1>Data Pengguna</h1>
@stop

@section('content')
@if(session('berhasil'))
    <div class="alert alert-success">{{ session('berhasil') }}</div>
@endif

<a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah User
</a>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Apotek</th>
                    <th>Status</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->apotek->nama_apotek ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $user->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('user.edit', $user) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <form action="{{ route('user.destroy', $user) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus user ini?')">
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
