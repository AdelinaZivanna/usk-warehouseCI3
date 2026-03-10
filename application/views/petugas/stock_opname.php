<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">Input Hasil Cek Fisik</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('index.php/petugas/stock_opname_update'); ?>" method="post">
                        <div class="form-group">
                            <label>Pilih Barang</label>
                            <select name="id_barang" class="form-control" required>
                                <option value="">-- Pilih Barang --</option>
                                <?php foreach ($products as $p) : ?>
                                    <option value="<?= $p['id_barang']; ?>"><?= $p['nama_barang']; ?> (Sistem: <?= $p['stok_saat_ini']; ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Stok Fisik di Gudang</label>
                            <input type="number" name="stok_fisik" class="form-control" required placeholder="Masukkan jumlah asli yang dihitung">
                        </div>

                        <div class="form-group">
                            <label>Alasan Penyesuaian</label>
                            <select name="keterangan" class="form-control" required>
                                <option value="Barang Rusak">Barang Rusak</option>
                                <option value="Kesalahan Input">Kesalahan Input Sebelumnya</option>
                                <option value="Barang Hilang">Barang Hilang</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-warning">Sesuaikan Stok</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>