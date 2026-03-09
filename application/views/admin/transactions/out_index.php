<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('pesan'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Barang Keluar</h6>
            <a href="<?= base_url('index.php/admin/report_out'); ?>" target="_blank" class="btn btn-info btn-sm">
                <i class="fas fa-print"></i> Cetak Laporan
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Tujuan</th> <th>Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($outs as $o): ?>
                    <tr>
                        <td><?= date('d/m/y H:i', strtotime($o['datetime'])); ?></td>
                        <td><?= $o['product_name']; ?></td>
                        <td><b class="text-danger">- <?= $o['qty']; ?></b></td>
                        <td><?= $o['destination']; ?></td> <td><?= $o['user_name']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>