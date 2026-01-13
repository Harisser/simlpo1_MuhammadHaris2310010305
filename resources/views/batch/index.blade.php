@extends('layouts.adminlte')

@section('content')
<h3>Batch Obat</h3>

<form method="GET" class="mb-3">
    <select name="id_apotek" class="form-control w-25 d-inline">
        <option value="">Semua Apotek</option>
        @foreach ($apotek as $a)
            <option value="{{ $a->id_apotek }}">{{ $a->nama_apotek }}</option>
        @endforeach
    </select>
    <button class="btn btn-primary btn-sm">Filter</button>
</form>

<a href="{{ route('batch.create') }}" class="btn btn-success mb-2">Tambah Batch</a>

<table class="table table-bordered">
    <tr>
        <th>Obat</th>
        <th>Apotek</th>
        <th>Kode Batch</th>
        <th>Expiry</th>
        <th>Stok</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach ($batch as $b)
    <tr>
        <td>{{ $b->obat->nama_obat }}</td>
        <td>{{ $b->apotek->nama_apotek }}</td>
        <td>{{ $b->kode_batch }}</td>
        <td>{{ $b->expiry_date }}</td>
        <td>{{ $b->qty_stok }}</td>
        <td>
            @if ($b->expiry_date < now()->toDateString())
                <span class="badge bg-danger">Expired</span>
            @elseif ($b->expiry_date <= now()->addDays(30))
                <span class="badge bg-warning">Hampir Expired</span>
            @else
                <span class="badge bg-success">Aman</span>
            @endif
        </td>
        <td>
            <a href="{{ route('batch.edit', $b) }}" class="btn btn-warning btn-sm">
                Koreksi Stok
            </a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
