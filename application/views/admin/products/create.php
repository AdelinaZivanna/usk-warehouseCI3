<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Barang Baru</h1>
    <div class="card shadow col-lg-8">
        <div class="card-body">
            <form action="<?php echo base_url('index.php/admin/product_store') ?>" method="POST">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama barang..." required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Stok Awal</label>
                            <input type="number" name="stok_awal" class="form-control" value="0" min="0" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" name="satuan" class="form-control" placeholder="Pcs / Box / Kg" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Barang</button>
                <a href="<?php echo base_url('index.php/admin/products') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>