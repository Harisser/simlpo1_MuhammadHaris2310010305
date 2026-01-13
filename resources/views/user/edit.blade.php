@extends('layouts.adminlte')

@section('title', 'Edit User')

@section('content_header')
    <h1>Edit Pengguna</h1>
@stop

@section('content')
<div class="card card-warning">
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label>Nama</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $user->name) }}"
                    required
                >
            </div>

            <div class="form-group mb-3">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $user->email) }}"
                    required
                >
            </div>

            <div class="form-group mb-3">
                <label>Role</label>
                <select name="role" class="form-control" required>
                    @php
                        $roles = ['AdminDinkes', 'Apoteker', 'Kasir', 'Driver'];
                    @endphp

                    @foreach ($roles as $role)
                        <option value="{{ $role }}"
                            {{ old('role', $user->role) == $role ? 'selected' : '' }}>
                            {{ $role }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Apotek</label>
                <select name="id_apotek" class="form-control">
                    <option value="">-- Tidak Ada --</option>
                    @foreach ($apotek as $a)
                        <option value="{{ $a->id_apotek }}"
                            {{ old('id_apotek', $user->id_apotek) == $a->id_apotek ? 'selected' : '' }}>
                            {{ $a->nama_apotek }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Status</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ old('is_active', $user->is_active) == 1 ? 'selected' : '' }}>
                        Aktif
                    </option>
                    <option value="0" {{ old('is_active', $user->is_active) == 0 ? 'selected' : '' }}>
                        Nonaktif
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>

            <a href="{{ route('user.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>
@stop
