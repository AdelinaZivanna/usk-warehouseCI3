<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Inventaris Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>SKU</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($products as $p) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><mark><?= $p['sku']; ?></mark></td>
                            <td><?= $p['name']; ?></td>
                            <td><?= $p['category_name']; ?></td>
                            <td>
                                <b class="<?= ($p['stock'] <= $p['min_stock']) ? 'text-danger' : 'text-dark'; ?>">
                                    <?= $p['stock']; ?>
                                </b>
                            </td>
                            <td><?= $p['unit']; ?></td>
                            <td>
                                <?php if($p['stock'] <= 0) : ?>
                                    <span class="badge badge-dark">Habis Total</span>
                                <?php elseif($p['stock'] <= $p['min_stock']) : ?>
                                    <span class="badge badge-danger">Kritis (Segera Order)</span>
                                <?php else : ?>
                                    <span class="badge badge-success">Stok Aman</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>