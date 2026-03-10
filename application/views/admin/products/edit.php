<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Barang</h1>
    <div class="card shadow col-lg-8">
        <div class="card-body">
            <form action="<?php echo base_url('index.php/admin/product_update') ?>" method="POST">
                <input type="hidden" name="id_barang" value="<?php echo $product['id_barang'] ?>">

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" value="<?php echo $product['nama_barang'] ?>" required>
                </div>

                <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" name="satuan" class="form-control" value="<?php echo $product['satuan'] ?>" required>
                </div>

                <div class="form-group">
                    <label>Stok Saat Ini (Hasil Cek Fisik)</label>
                    <input type="number" name="stok_saat_ini" class="form-control" value="<?= $product['stok_saat_ini']; ?>" required>
                    <small class="text-muted">*Ubah angka ini jika ada perbedaan dengan stok di sistem.</small>
                </div>

                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="<?php echo base_url('index.php/admin/products') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>