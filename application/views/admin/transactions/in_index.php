<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('pesan'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Barang Masuk</h6>
            <a href="<?= base_url('index.php/admin/report_in'); ?>" target="_blank" class="btn btn-info btn-sm">
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
                            <th>Supplier</th>
                            <th>Jumlah</th>
                            <th>Petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($ins)) : ?>
                            <tr>
                                <td colspan="5" class="text-center">Data masih kosong atau query join bermasalah.</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach($ins as $i) : ?>
                            <tr>
                                <td><?= date('d/m/Y H:i', strtotime($i['datetime'])); ?></td>
                                <td><?= $i['product_name']; ?></td>
                                <td><?= $i['supplier_name']; ?></td>
                                <td><span class="badge badge-success">+ <?= $i['qty']; ?></span></td>
                                <td><?= $i['user_name']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>