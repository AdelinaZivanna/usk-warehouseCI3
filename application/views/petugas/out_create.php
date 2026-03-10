<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">Form Input Barang Keluar</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('index.php/petugas/out_add'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih Barang</label>
                            <select name="product_id" class="form-control" required>
                                <option value="">-- Pilih Barang --</option>
                                <?php foreach ($products as $p) : ?>
                                    <option value="<?= $p['id_barang']; ?>"><?= $p['nama_barang']; ?> (Stok: <?= $p['stok_saat_ini']; ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tujuan / Penerima</label>
                            <input type="text" name="destination" class="form-control" placeholder="Contoh: Toko Cabang A / Produksi" required>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Keluar</label>
                            <input type="number" name="qty" class="form-control" min="1" required placeholder="0">
                        </div>

                        <button type="submit" class="btn btn-danger">Keluarkan Barang</button>
                        <a href="<?= base_url('index.php/petugas/barang_keluar'); ?>" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>