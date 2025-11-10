<!DOCTYPE html>
<html lang="id">
<head>
    <title>Profil Pengguna</title>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang, <?= htmlspecialchars($data['user']['name']); ?></h1> 
        
        <p>Email: <?= htmlspecialchars($data['user']['email']); ?></p>
        
        <a href="index.php" class="btn">Kembali ke Daftar</a>
    </div>
</body>
</html>