<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item dropdown d-none d-sm-inline-block">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Laporan
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('laporan.stok') }}">Laporan Stok Obat</a>
                <a class="dropdown-item" href="{{ route('laporan.penjualan') }}">Laporan Penjualan</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('laporan.penjualan.print') }}">Print</a>
            </div>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        @if($stokWarning->count() > 0)
            <span class="badge badge-danger navbar-badge">
                {{ $stokWarning->count() }}
            </span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">
            {{ $stokWarning->count() }} Notifikasi Stok
        </span>

        <div class="dropdown-divider"></div>

        @forelse ($stokWarning as $item)
            <a href="{{ route('batch.index') }}" class="dropdown-item">
                @if ($item->total_stok == 0)
                    <i class="fas fa-times-circle text-danger mr-2"></i>
                    <strong>{{ $item->nama_obat }}</strong> habis
                @else
                    <i class="fas fa-exclamation-triangle text-warning mr-2"></i>
                    {{ $item->nama_obat }} menipis
                @endif
                <span class="float-right text-muted text-sm">
                    Stok: {{ $item->total_stok }}
                </span>
            </a>
            <div class="dropdown-divider"></div>
        @empty
            <span class="dropdown-item text-muted text-center">
                Tidak ada peringatan stok
            </span>
        @endforelse

            <a href="{{ route('laporan.stok') }}" class="dropdown-item dropdown-footer">
                Lihat Laporan Stok
            </a>
        </div>
    </li>
    
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            {{ auth()->user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('profile.show') }}" class="dropdown-item">
                <i class="fas fa-user mr-2"></i> Profil
            </a>

            <div class="dropdown-divider"></div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item text-danger">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </button>
            </form>
        </div>
    </ul>
</nav>
