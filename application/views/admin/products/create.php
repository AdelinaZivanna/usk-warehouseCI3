<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Barang Baru</h1>
    <div class="card shadow col-lg-8">
        <div class="card-body">
            <form action="<?= base_url('index.php/admin/product_store') ?>" method="POST">
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach($categories as $c): ?>
                            <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kode Barang (SKU)</label>
                    <input type="text" name="sku" class="form-control" placeholder="Contoh: BRG-001" required>
                </div>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stok Awal</label>
                            <input type="number" name="stock" class="form-control" value="0" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" name="unit" class="form-control" placeholder="Pcs / Box / Kg" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Minimum Stok (Alert)</label>
                            <input type="number" name="min_stock" class="form-control" value="5" placeholder="Contoh: 5">
                            <small class="text-muted">Sistem akan memberi peringatan jika stok di bawah angka ini.</small>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Barang</button>
                <a href="<?= base_url('index.php/admin/products') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>