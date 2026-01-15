<style>
/* Sidebar base */
.main-sidebar {
    background-color: #1877F2 !important;
}

/* Nav link base */
.main-sidebar .nav-link {
    color: #ffffff !important;
    position: relative;
    overflow: hidden;
    z-index: 1;
}

/* Sliding background (START LEFT) */
.main-sidebar .nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.18);
    transition: all 0.35s ease;
    z-index: -1;
    border-radius: 20px;
}

/* Hover & active → slide RIGHT */
.main-sidebar .nav-link:hover::before,
.main-sidebar .nav-link.active::before {
    left: 0;
}

.main-sidebar .nav-link.active::after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: #ffffff;
}

.main-sidebar .nav-link:hover .nav-icon {
    transform: translateX(5px);
    transition: transform 0.3s ease;
}


/* Disable default AdminLTE hover */
.main-sidebar .nav-link:hover {
    background-color: transparent !important;
}

/* Treeview indent fix */
.nav-treeview .nav-link {
    padding-left: 2.5rem;
}
</style>



<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <i class="fa fa-heartbeat ml-3"></i>
        <span class="brand-text font-weight-light">SIMLPO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>

                <!-- Example CRUD menu -->
                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Data Master
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ route('apotek.index') }}" class="nav-link">
                            <i class="fa fa-asterisk nav-icon"></i>
                            <p>Apotek</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="fa fa-user nav-icon"></i>
                            <p>Pengguna</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('obat.index') }}" class="nav-link">
                            <i class="fa fa-flask nav-icon"></i>
                            <p>Obat</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('supplier.index') }}" class="nav-link">
                            <i class="fa fa-cubes nav-icon"></i>
                            <p>Supplier</p>
                        </a>
                    </li>
                </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('batch.index') }}" class="nav-link">
                        <i class="fa fa-cube nav-icon"></i>
                        <p> Batch Obat </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('stok.index') }}" class="nav-link">
                        <i class="fa fa-calculator nav-icon"></i>
                        <p> Stok Obat </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('penjualan.index') }}" class="nav-link">
                        <i class="fa fa-shopping-basket nav-icon"></i>
                        <p> Beli Obat </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
