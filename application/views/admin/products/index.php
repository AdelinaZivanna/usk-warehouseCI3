<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('pesan'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('index.php/admin/product_create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Barang
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>SKU/Kode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Min. Stok</th> <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($products as $p): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $p['sku']; ?></td>
                            <td><?= $p['name']; ?></td>
                            <td><span class="badge badge-info"><?= $p['category_name']; ?></span></td>
                            
                            <td>
                                <?php if($p['stock'] <= $p['min_stock']): ?>
                                    <span class="badge badge-danger"><?= $p['stock']; ?> (Low)</span>
                                <?php else: ?>
                                    <span class="badge badge-success"><?= $p['stock']; ?></span>
                                <?php endif; ?>
                            </td>

                            <td><?= $p['min_stock']; ?></td> <td><?= $p['unit']; ?></td>
                            <td>
                                <a href="<?= base_url('index.php/admin/product_edit/' . $p['id']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('index.php/admin/product_delete/' . $p['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus barang ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>