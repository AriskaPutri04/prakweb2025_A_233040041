<?php
// Bisa menggunakan Require
// require_once 'Produk/Animal.php';
// require_once 'Produk/Cat.php';

// // Method khusus autoLoad
// spl_autoload_register(function ($class) {
//     require_once __DIR__ . '/Produk/' . $class . '.php';
// });


// Method khusus autoLoad
spl_autoload_register(function ($class) {
    // 1. Filter: Hanya proses kelas di namespace App\Produk
    if (strpos($class, 'App\\Produk\\') === 0) {
        
        // 2. Ambil Nama Kelas Saja (e.g., dari 'App\Produk\Animal' menjadi 'Animal')
        $parts = explode('\\', $class);
        $className = end($parts); // Mengambil elemen terakhir: Animal
        
        // 3. Gabungkan Path (Baris 8 yang Diperbaiki)
        // __DIR__ adalah /App, jadi path menjadi /App/Produk/Animal.php
        $file = __DIR__ . '/Produk/' . $className . '.php';
        
        if (file_exists($file)) {
            require_once $file;
        }
    }
});
?>
