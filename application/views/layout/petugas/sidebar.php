<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-warehouse"></i></div>
        <div class="sidebar-brand-text mx-3">Petugas Gudang</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/petugas') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Menu Utama</div>
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('index.php/petugas/barang_masuk') ?>">
        <i class="fas fa-fw fa-download"></i>
        <span>Barang Masuk</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('index.php/petugas/barang_keluar') ?>">
        <i class="fas fa-fw fa-upload"></i>
        <span>Barang Keluar</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('index.php/petugas/stock_opname'); ?>">
        <i class="fas fa-fw fa-clipboard-check"></i>
        <span>Stock Opname</span>
    </a>
</li>
</ul>