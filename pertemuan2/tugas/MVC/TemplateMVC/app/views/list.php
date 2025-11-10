<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        
        <h1>Daftar Pengguna</h1>

        <a href="<?= BASEURL; ?>/user/tambah" class="btn">Tambah Data Pengguna</a>
        
        <table class="user-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['users'] as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['name']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td>
                        <a href="index.php?url=user/detail/<?= $user['id']; ?>" class="btn-small">Detail</a>
                        
                        <a href="index.php?url=user/edit/<?= $user['id']; ?>" class="btn-small btn-edit">Edit</a>
                        
                        <a href="index.php?url=user/hapus/<?= $user['id']; ?>" class="btn-small btn-danger" onclick="return confirm('Yakin ingin menghapus data <?= htmlspecialchars($user['name']); ?>?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
