@extends('layouts.adminlte')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalObat }}</h3>
                <p>Total Obat</p>
            </div>
            <div class="icon"><i class="fas fa-pills"></i></div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $totalBatch }}</h3>
                <p>Total Batch</p>
            </div>
            <div class="icon"><i class="fas fa-boxes"></i></div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalTransaksi }}</h3>
                <p>Total Transaksi</p>
            </div>
            <div class="icon"><i class="fas fa-cash-register"></i></div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Monitoring Stok Obat</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Obat</th>
                    <th>Total Stok</th>
                    <th>Stok Minimal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stokObat as $o)
                <tr>
                    <td>{{ $o->nama_obat }}</td>
                    <td>{{ $o->total_stok }}</td>
                    <td>{{ $o->stok_min }}</td>
                    <td>
                        @if ($o->total_stok <= 0)
                            <span class="badge bg-danger">Habis</span>
                        @elseif ($o->total_stok <= $o->stok_min)
                            <span class="badge bg-warning">Menipis</span>
                        @else
                            <span class="badge bg-success">Aman</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header bg-danger">
        <h3 class="card-title">⚠ Obat Stok Menipis / Habis</h3>
    </div>

    <div class="card-body">
        <table class="table table-sm table-bordered">
            <tr>
                <th>Nama Obat</th>
                <th>Stok</th>
            </tr>
            @foreach ($stokMenipis as $m)
            <tr>
                <td>{{ $m->nama_obat }}</td>
                <td>{{ $m->total_stok }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">Grafik Penjualan</h3>
    </div>
    <div class="card-body">
        <canvas id="chartPenjualan" height="100"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="chartPenjualan"></canvas> <script>
    const ctx = document.getElementById('chartPenjualan');

    const labels = JSON.parse('@json($penjualanHarian->pluck("tanggal"))');
    const dataValues = JSON.parse('@json($penjualanHarian->pluck("total"))');

    const chartPenjualan = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Penjualan',
                data: dataValues,
                borderColor: 'rgb(75, 192, 192)',
                borderWidth: 2,
                tension: 0.3,
                fill: false
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
