@extends('layouts.adminlte')

@section('content')
<h3>Stok Obat</h3>

<form method="GET" class="mb-3">
    <select name="id_apotek" class="form-control w-25 d-inline">
        <option value="">Semua Apotek</option>
        @foreach ($apotek as $a)
            <option value="{{ $a->id_apotek }}"
                {{ request('id_apotek') == $a->id_apotek ? 'selected' : '' }}>
                {{ $a->nama_apotek }}
            </option>
        @endforeach
    </select>
    <button class="btn btn-primary btn-sm">Filter</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Obat</th>
            <th>Total Stok</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stok as $s)
        <tr>
            <td>{{ $s->nama_obat }}</td>
            <td>{{ $s->total_stok }}</td>
            <td>
                @if ($s->total_stok == 0)
                    <span class="badge bg-danger">Habis</span>
                @elseif ($s->total_stok < 10)
                    <span class="badge bg-warning">Menipis</span>
                @else
                    <span class="badge bg-success">Aman</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
