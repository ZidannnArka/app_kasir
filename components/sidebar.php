<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-store    "></i>
        </div>
        <div class="sidebar-brand-text mx-3">APP Kasir</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="./">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-box-open    "></i>
            <span>Kelola Produk</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="index.php?aksi=tampil_produk">Lihat</a>
                <a class="collapse-item" href="index.php?aksi=tambah_produk">Tambah</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseSuplai" aria-expanded="true"
            aria-controls="collapseSuplai">
            <i class="fas fa-boxes"></i>
            <span>Suplai Produk</span>
        </a>
        <div id="collapseSuplai" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="index.php?aksi=tambah_suplai_produk">Tambah</a>
                <a class="collapse-item" href="index.php?aksi=tampil_suplai_produk">Riwayat</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTrans" aria-expanded="true"
            aria-controls="collapseTrans">
            <i class="fas fa-box-open    "></i>
            <span>Kelola Transaksi</span>
        </a>
        <div id="collapseTrans" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="index.php?aksi=tampil_transaksi">Lihat</a>
                <a class="collapse-item" href="index.php?aksi=tambah_transaksi">Tambah</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="index.php?aksi=laporan_penjualan">
            <i class="fas fa-fw fa-paste"></i>
            <span>Laporan Penjualan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>