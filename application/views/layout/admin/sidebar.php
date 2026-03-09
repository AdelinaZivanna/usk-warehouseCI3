<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('index.php/admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-warehouse"></i>
        </div>
        <div class="sidebar-brand-text mx-3">WH-USK <sup>Admin</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Master Data</div>

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('index.php/admin/categories') ?>">
        <i class="fas fa-fw fa-tag"></i> <span>Kategori Barang</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('index.php/admin/suppliers') ?>">
        <i class="fas fa-fw fa-truck"></i> <span>Supplier</span></a>
</li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/admin/products') ?>">
            <i class="fas fa-fw fa-box"></i>
            <span>Data Barang (Stock)</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Transaksi</div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/admin/transaction_in') ?>">
            <i class="fas fa-fw fa-arrow-down text-success"></i>
            <span>Barang Masuk</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/admin/transaction_out') ?>">
            <i class="fas fa-fw fa-arrow-up text-danger"></i>
            <span>Barang Keluar</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Manajemen User</div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/admin/users') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pengguna</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>