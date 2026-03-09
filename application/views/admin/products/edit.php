<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Produk</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?= base_url('index.php/admin/product_update') ?>" method="POST">
                        
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">

                        <div class="form-group">
                            <label>Kode Barang (SKU)</label>
                            <input type="text" name="sku" class="form-control" value="<?= $product['sku'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach($categories as $c) : ?>
                                    <option value="<?= $c['id'] ?>" <?= ($c['id'] == $product['category_id']) ? 'selected' : '' ?>>
                                        <?= $c['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <input type="text" name="unit" class="form-control" value="<?= $product['unit'] ?>" placeholder="Pcs / Box / Kg" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Minimum Stok (Alert)</label>
                                    <input type="number" name="min_stock" class="form-control" value="<?= $product['min_stock'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="<?= base_url('index.php/admin/products') ?>" class="btn btn-secondary">Batal</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>