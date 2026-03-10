<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Input Barang Keluar</h1>
    
    <?php echo $this->session->flashdata('pesan'); ?>

    <div class="card shadow col-lg-6">
        <div class="card-body">
            <form action="<?= base_url('index.php/admin/transaction_out_store') ?>" method="POST">
                
                <div class="form-group">
                    <label>Pilih Barang</label>
                    <select name="barang_id" class="form-control" required>
                        <option value="">-- Pilih Barang --</option>
                        <?php foreach($products as $p): ?>
                            <option value="<?= $p['id'] ?>">
                                <?= $p['nama_barang'] ?> (Sisa: <?= $p['stok_saat_ini'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Jumlah Keluar</label>
                    <input type="number" name="jumlah" class="form-control" min="1" placeholder="Masukkan jumlah..." required>
                </div>

                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-minus"></i> Kurangi Stok
                </button>
                <a href="<?= base_url('index.php/admin/products') ?>" class="btn btn-secondary">Batal</a>
                
            </form>
        </div>
    </div>
</div>