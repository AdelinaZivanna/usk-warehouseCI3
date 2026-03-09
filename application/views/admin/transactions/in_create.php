<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Catat Barang Masuk</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Transaksi Masuk</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('index.php/admin/transaction_in') ?>" method="POST">
                        
                        <div class="form-group">
                            <label>Pilih Barang</label>
                            <select name="product_id" class="form-control" required>
                                <option value="">-- Pilih Barang --</option>
                                <?php foreach($products as $p) : ?>
                                    <option value="<?= $p['id']; ?>"><?= $p['sku']; ?> - <?= $p['name']; ?> (Stok: <?= $p['stock']; ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pilih Supplier</label>
                            <select name="supplier_id" class="form-control" required>
                                <option value="">-- Pilih Supplier --</option>
                                <?php foreach($suppliers as $s) : ?>
                                    <option value="<?= $s['id']; ?>"><?= $s['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah Masuk</label>
                                    <input type="number" name="qty" class="form-control" min="1" placeholder="0" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <input type="datetime-local" name="datetime" class="form-control" value="<?= date('Y-m-d\TH:i'); ?>" required>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                            <span class="text">Simpan Transaksi</span>
                        </button>
                        <a href="<?= base_url('index.php/admin/transaction_in') ?>" class="btn btn-secondary">Batal</a>
                    
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card border-left-info shadow py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Catatan Penting</div>
                    <div class="p mb-0 text-gray-800">
                        Pastikan data barang dan supplier sudah sesuai. Setelah disimpan, stok barang akan bertambah secara otomatis.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>