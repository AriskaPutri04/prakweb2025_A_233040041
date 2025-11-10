<?php

// Memanggil init untuk menjalankan autoload
require_once 'App/init.php';

// instance sebuah class
// $cat = new Cat();
$cat = new App\Produk\Cat();
echo "<br>";
echo $cat->run(); // menjalankan method di dalamnya
?>