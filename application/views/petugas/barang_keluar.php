<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('pesan'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-info">Riwayat Barang Keluar</h6>
            <a href="<?= base_url('index.php/petugas/out_create') ?>" class="btn btn-info btn-sm">
                <i class="fas fa-plus"></i> Input Barang Keluar
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Tujuan</th> <th>Qty</th>
                        <th>Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($outs as $o) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($o['datetime'])); ?></td>
                        <td><?= $o['product_name']; ?></td>
                        <td><?= $o['destination']; ?></td> <td><span class="badge badge-danger">- <?= $o['qty']; ?></span></td>
                        <td><?= $o['user_name']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>