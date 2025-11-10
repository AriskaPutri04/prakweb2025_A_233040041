<!DOCTYPE html>
<html lang="id">
<head>
    <title><?= $data['judul']; ?></title>
</head>
<body>
    <div class="container">
        <h1>Edit Data Pengguna: <?= htmlspecialchars($data['user']['name']); ?></h1>
        
        <form action="<?= BASEURL; ?>/user/prosesUbah" method="post">
            
            <input type="hidden" name="id" value="<?= $data['user']['id']; ?>"> 

            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" 
                value="<?= htmlspecialchars($data['user']['name']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" 
                value="<?= htmlspecialchars($data['user']['email']); ?>" required>

            <button type="submit" class="btn">Ubah Data</button>
        </form>
    </div> 
</body>
</html>