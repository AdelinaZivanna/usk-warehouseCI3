<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard Manajer</h1>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Jenis Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_produk; ?> Item</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-boxes fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Stok Hampir Habis</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stok_limit; ?> Produk</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Barang Masuk (Hari Ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $masuk_hari_ini; ?> Transaksi</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-calendar-check fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Supplier</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_supplier; ?> Mitra</div>
                        </div>
                        <div class="col-auto"><i class="fas fa-truck fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if($stok_limit > 0) : ?>
    <div class="alert alert-warning border-left-warning" role="alert">
        <strong>Perhatian Manajer!</strong> Ada <b><?= $stok_limit; ?></b> produk yang stoknya di bawah batas minimum. Segera cek laporan stok!
    </div>
    <?php endif; ?>
</div>