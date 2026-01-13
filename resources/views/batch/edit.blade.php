@extends('layouts.adminlte')

@section('content')
<h3>Koreksi Stok Batch</h3>

<form method="POST" action="{{ route('batch.update', $batch) }}">
@csrf
@method('PUT')

<input type="number" name="qty_stok" class="form-control mb-2"
       value="{{ $batch->qty_stok }}" min="0" required>

<button class="btn btn-primary">Update</button>
</form>
@endsection