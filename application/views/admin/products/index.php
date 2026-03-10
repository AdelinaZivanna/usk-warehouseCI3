<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>
    <?php echo $this->session->flashdata('pesan'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo base_url('index.php/admin/product_create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Barang
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Barang</th>
                            <th>Stok Awal</th>
                            <th>Stok Saat Ini</th>
                            <th>Satuan</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($products as $p): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $p['nama_barang']; ?></td>
                            <td><?php echo $p['stok_awal']; ?></td>
                            <td>
                                <?php if($p['stok_saat_ini'] <= 5): ?>
                                    <span class="badge badge-danger"><?php echo $p['stok_saat_ini']; ?> (Menipis)</span>
                                <?php else: ?>
                                    <span class="badge badge-success"><?php echo $p['stok_saat_ini']; ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $p['satuan']; ?></td>
                            <td>
                                <a href="<?php echo base_url('index.php/admin/product_edit/' . $p['id_barang']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?php echo base_url('index.php/admin/product_delete/' . $p['id_barang']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus barang ini?')">
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