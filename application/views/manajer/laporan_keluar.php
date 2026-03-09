<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Keluar</th>
                            <th>Petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($outs as $o) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($o['datetime'])); ?></td>
                            <td><?= $o['product_name']; ?></td>
                            <td><?= $o['qty']; ?></td>
                            <td><?= $o['user_name']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>