@extends('layouts.adminlte')

@section('content')
<h3>Laporan Stok Obat</h3>

<table class="table table-bordered">
    <tr>
        <th>Nama Obat</th>
        <th>Total Stok</th>
        <th>Status</th>
    </tr>

    @foreach ($stok as $s)
    <tr>
        <td>{{ $s->nama_obat }}</td>
        <td>{{ $s->total_stok }}</td>
        <td>
            @if ($s->total_stok <= 0)
                <span class="badge bg-danger">Habis</span>
            @elseif ($s->total_stok <= $s->stok_min)
                <span class="badge bg-warning">Menipis</span>
            @else
                <span class="badge bg-success">Aman</span>
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection
