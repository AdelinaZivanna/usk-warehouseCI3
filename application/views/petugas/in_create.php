<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Transaksi Barang Masuk</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('index.php/petugas/in_add'); ?>" method="post">
                        
                        <div class="form-group">
                            <label>Pilih Barang <span class="text-danger">*</span></label>
                            <select name="product_id" class="form-control" required>
                                <option value="">-- Pilih Barang --</option>
                                <?php foreach($products as $p) : ?>
                                    <option value="<?= $p['id']; ?>">
                                        <?= $p['name']; ?> (Stok Saat Ini: <?= $p['stock']; ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Supplier <span class="text-danger">*</span></label>
                            <select name="supplier_id" class="form-control" required>
                                <option value="">-- Pilih Supplier --</option>
                                <?php foreach($suppliers as $s) : ?>
                                    <option value="<?= $s['id']; ?>"><?= $s['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Masuk <span class="text-danger">*</span></label>
                            <input type="number" name="qty" class="form-control" placeholder="Masukkan jumlah barang..." required min="1">
                            <small class="text-muted">Pastikan jumlah sesuai dengan surat jalan/fisik barang.</small>
                        </div>

                        <hr>
                        
                        <button type="submit" class="btn btn-primary shadow-sm">
                            <i class="fas fa-save fa-sm text-white-50"></i> Simpan Transaksi
                        </button>
                        <a href="<?= base_url('index.php/petugas/barang_masuk'); ?>" class="btn btn-secondary shadow-sm">
                            Batal
                        </a>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Informasi</h6>
                </div>
                <div class="card-body">
                    <p>Inputan ini akan otomatis:</p>
                    <ul>
                        <li>Menambah stok di tabel <strong>Products</strong>.</li>
                        <li>Mencatat riwayat di tabel <strong>Transaction Ins</strong>.</li>
                        <li>Mencatat nama Anda sebagai penanggung jawab input.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>