<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Kategori</h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="<?= base_url('index.php/admin/category_update') ?>" method="POST">
                        
                        <input type="hidden" name="id" value="<?= $category['id']; ?>">

                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="name" class="form-control" value="<?= $category['name']; ?>" required>
                        </div>
                        
                        <button type="submit" class="btn btn-warning">Update Data</button>
                        <a href="<?= base_url('index.php/admin/categories') ?>" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>