@extends('layouts.adminlte')

@section('content')
<h3>Transaksi Penjualan</h3>

<a href="{{ route('penjualan.create') }}" class="btn btn-success mb-3">
    Transaksi Baru
</a>

<table class="table table-bordered">
    <tr>
        <th>Tanggal</th>
        <th>Kasir</th>
        <th>Total Bayar</th>
    </tr>

    @foreach ($transaksi as $t)
    <tr>
        <td>{{ $t->tgl_transaksi }}</td>
        <td>{{ $t->kasir->name }}</td>
        <td>Rp {{ number_format($t->total_bayar, 0, ',', '.') }}</td>
    </tr>
    @endforeach
</table>
@endsection
