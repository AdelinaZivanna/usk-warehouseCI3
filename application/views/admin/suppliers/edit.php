<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Supplier</h1>
    <div class="card shadow col-lg-8">
        <div class="card-body">
            <form action="<?= base_url('index.php/admin/supplier_update') ?>" method="POST">
                
                <input type="hidden" name="id" value="<?= $supplier['id'] ?>">

                <div class="form-group">
                    <label>Nama Supplier</label>
                    <input type="text" name="name" class="form-control" value="<?= $supplier['name'] ?>" required>
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" name="phone" class="form-control" value="<?= $supplier['phone'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="address" class="form-control" rows="3" required><?= $supplier['address'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="<?= base_url('index.php/admin/suppliers') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>