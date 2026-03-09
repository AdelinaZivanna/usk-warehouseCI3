<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('pesan'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('index.php/admin/supplier_create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Supplier
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Supplier</th>
                            <th>No. Telp</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($suppliers as $s): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $s['name']; ?></td>
                            <td><?= $s['phone']; ?></td>
                            <td><?= $s['address']; ?></td>
                            <td>
                                <a href="<?= base_url('index.php/admin/supplier_edit/'.$s['id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('index.php/admin/supplier_delete/'.$s['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus supplier ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>