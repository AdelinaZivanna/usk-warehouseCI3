<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('pesan'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('index.php/petugas/in_create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Input Barang Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Masuk</th>
                        <th>Supplier</th>
                        <th>Petugas</th> </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($ins as $bm) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($bm['datetime'])); ?></td>
                        <td><?= $bm['product_name']; ?></td>
                        <td><span class="badge badge-success">+ <?= $bm['qty']; ?></span></td>
                        <td><?= $bm['supplier_name']; ?></td>
                        <td><?= $bm['user_name']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>