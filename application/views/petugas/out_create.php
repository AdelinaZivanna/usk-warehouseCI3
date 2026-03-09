<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Catat Barang Keluar</h1>
    <div class="card shadow col-lg-7">
        <div class="card-body">
            <form action="<?= base_url('index.php/petugas/out_add') ?>" method="POST">
                
                <div class="form-group">
                    <label>Pilih Barang</label>
                    <select name="product_id" class="form-control" required>
                        <option value="">-- Pilih Barang --</option>
                        <?php foreach($products as $p) : ?>
                            <option value="<?= $p['id']; ?>">
                                <?= $p['sku']; ?> - <?= $p['name']; ?> (Sisa Stok: <?= $p['stock']; ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jumlah Keluar</label>
                            <input type="number" name="qty" class="form-control" min="1" placeholder="0" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Waktu Keluar</label>
                            <input type="datetime-local" name="datetime" class="form-control" value="<?= date('Y-m-d\TH:i'); ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Tujuan / Destinasi</label>
                    <input type="text" name="destination" class="form-control" placeholder="Contoh: Toko Cabang Depok" required>
                </div>

                <hr>
                <button type="submit" class="btn btn-danger btn-block font-weight-bold">
                    Keluarkan Barang
                </button>
                <a href="<?= base_url('index.php/petugas/barang_keluar') ?>" class="btn btn-secondary btn-block">Batal</a>
            </form>
        </div>
    </div>
</div>