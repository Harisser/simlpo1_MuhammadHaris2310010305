<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <style>
        body { font-family: Arial; }
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #000; padding:5px; }
    </style>
</head>
<body onload="window.print()">

<h3>Laporan Penjualan</h3>

<table>
    <tr>
        <th>Tanggal</th>
        <th>Total Transaksi</th>
        <th>Total Pendapatan</th>
    </tr>

    @foreach ($penjualan as $p)
    <tr>
        <td>{{ $p->tanggal }}</td>
        <td>{{ $p->total_transaksi }}</td>
        <td>{{ number_format($p->total_pendapatan,0,',','.') }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
