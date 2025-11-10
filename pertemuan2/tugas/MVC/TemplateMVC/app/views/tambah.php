<!DOCTYPE html>
<html lang="id">
<head>
    <title><?= $data['judul']; ?></title>
</head>
<body>
    <div class="container">
        <h1>Tambah Data Pengguna</h1>
        
        <form action="<?= BASEURL; ?>/user/prosesTambah" method="post">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required> 

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required> 

            <button type="submit" class="btn">Simpan Data</button>
        </form>
    </div>
</body>
</html>