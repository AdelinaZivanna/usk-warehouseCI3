<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Input Barang Masuk</h1>
    <div class="card shadow col-lg-6">
        <div class="card-body">
            <form action="<?= base_url('index.php/admin/transaction_in_store') ?>" method="POST">
                <div class="form-group">
                    <label>Pilih Barang</label>
                    <select name="product_id" class="form-control" required>
                        <option value="">-- Pilih Barang --</option>
                        <?php foreach($products as $p): ?>
                            <option value="<?= $p['id'] ?>"><?= $p['nama_barang'] ?> (Stok: <?= $p['stok_saat_ini'] ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Supplier</label>
                    <select name="supplier_id" class="form-control" required>
                        <option value="">-- Pilih Supplier --</option>
                        <?php foreach($suppliers as $s): ?>
                            <option value="<?= $s['id'] ?>"><?= $s['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah Masuk</label>
                    <input type="number" name="jumlah" class="form-control" min="1" required>
                </div>
                <button type="submit" class="btn btn-success">Tambah Stok</button>
                <a href="<?= base_url('index.php/admin/products') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>