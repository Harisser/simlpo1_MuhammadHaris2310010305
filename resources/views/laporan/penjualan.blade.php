@extends('layouts.adminlte')

@section('content')
<h3>Laporan Penjualan</h3>

<form method="GET" class="mb-3">
    <input type="date" name="from" required>
    <input type="date" name="to" required>
    <button class="btn btn-primary btn-sm">Filter</button>
    <a href="{{ route('laporan.penjualan.print') }}"
       target="_blank"
       class="btn btn-secondary btn-sm">
        Cetak
    </a>
</form>

<table class="table table-bordered">
    <tr>
        <th>Tanggal</th>
        <th>Total Transaksi</th>
        <th>Total Pendapatan</th>
    </tr>

    @foreach ($penjualan as $p)
    <tr>
        <td>{{ $p->tanggal }}</td>
        <td>{{ $p->total_transaksi }}</td>
        <td>Rp {{ number_format($p->total_pendapatan,0,',','.') }}</td>
    </tr>
    @endforeach
</table>
@endsection
s