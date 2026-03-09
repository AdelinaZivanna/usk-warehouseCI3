<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('index.php/manajer') ?>">
        <div class="sidebar-brand-text mx-3">WH-USK <sup>Manajer</sup></div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/manajer') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Laporan</div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/manajer/laporan_masuk') ?>">
            <i class="fas fa-fw fa-file-import"></i><span>Laporan Masuk</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/manajer/stok_barang') ?>">
            <i class="fas fa-fw fa-boxes"></i><span>Monitoring Stok</span></a>
    </li>
</ul>