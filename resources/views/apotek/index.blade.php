@extends('layouts.adminlte')

@section('title', 'Data Apotek')

@section('content_header')
    <h1>Data Apotek</h1>
@stop

@section('content')
    @if (session('berhasil'))
        <div class="alert alert-success">
            {{ session('berhasil') }}
        </div>
    @endif

    <a href="{{ route('apotek.create') }}" class="btn btn-primary mb-3">
        Tambah Apotek
    </a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID Apotek</th>
                        <th>Nama Apotek</th>
                        <th>Alamat</th>
                        <th width="150">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($banyak_apotek as $apotek)
                        <tr>
                            <td>{{ $apotek->id_apotek }}</td>
                            <td>{{ $apotek->nama_apotek }}</td>
                            <td>{{ $apotek->alamat }}</td>
                            <td>
                                <a href="{{ route('apotek.edit', $apotek) }}"
                                   class="btn btn-warning btn-sm">
                                    Ubah
                                </a>

                                <button class="btn btn-danger btn-sm"
                                    onclick="konfirmasi('{{ route('apotek.destroy', $apotek) }}')">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                Data apotek belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Form delete (dipakai JS) -->
            <form action="" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
@stop

@section('js')
<script>
    function konfirmasi(href) {
        if (confirm('Yakin ingin menghapus data apotek ini?')) {
            document.getElementById('deleteForm').action = href;
            document.getElementById('deleteForm').submit();
        }
    }
</script>
@stop
