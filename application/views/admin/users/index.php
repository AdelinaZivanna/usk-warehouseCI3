<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('pesan'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('index.php/admin/user_create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Pengguna
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($users as $u) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $u['name']; ?></td>
                            <td><?= $u['email']; ?></td>
                            <td>
                                <span class="badge <?= $u['role'] == 'admin' ? 'badge-danger' : ($u['role'] == 'manajer' ? 'badge-success' : 'badge-info'); ?>">
                                    <?= ucfirst($u['role']); ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= base_url('index.php/admin/user_edit/'.$u['id']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('index.php/admin/user_delete/'.$u['id']) ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Yakin hapus user ini?')">
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