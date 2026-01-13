@extends('layouts.adminlte')

@section('content')
<h3>Tambah Batch Obat</h3>

<form method="POST" action="{{ route('batch.store') }}">
@csrf

<select name="id_obat" class="form-control mb-2" required>
    <option value="">Pilih Obat</option>
    @foreach ($obat as $o)
        <option value="{{ $o->id_obat }}">{{ $o->nama_obat }}</option>
    @endforeach
</select>

<select name="id_apotek" class="form-control mb-2" required>
    <option value="">Pilih Apotek</option>
    @foreach ($apotek as $a)
        <option value="{{ $a->id_apotek }}">{{ $a->nama_apotek }}</option>
    @endforeach
</select>

<input type="text" name="kode_batch" class="form-control mb-2" placeholder="Kode Batch" required>
<input type="date" name="expiry_date" class="form-control mb-2" required>
<input type="number" name="qty_stok" class="form-control mb-2" min="0" required>

<button class="btn btn-success">Simpan</button>
</form>
@endsection
