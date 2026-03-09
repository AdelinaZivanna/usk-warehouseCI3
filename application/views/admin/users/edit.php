<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('index.php/admin/user_update') ?>" method="post">
                <input type="hidden" name="id" value="<?= $user['id']; ?>">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="<?= $user['name']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $user['email']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti password">
                    <small class="text-muted text-danger">*Kosongkan jika tidak diganti</small>
                </div>

                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                        <option value="petugas" <?= $user['role'] == 'petugas' ? 'selected' : ''; ?>>Petugas</option>
                        <option value="manajer" <?= $user['role'] == 'manajer' ? 'selected' : ''; ?>>Manajer</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="<?= base_url('index.php/admin/users') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>