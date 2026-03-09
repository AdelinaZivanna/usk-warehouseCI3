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
                            <th>Supplier</th>
                            <th>Jumlah</th>
                            <th>Petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($ins as $i) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($i['datetime'])); ?></td>
                            <td><?= $i['product_name']; ?></td>
                            <td><?= $i['supplier_name']; ?></td>
                            <td><?= $i['qty']; ?></td>
                            <td><?= $i['user_name']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>