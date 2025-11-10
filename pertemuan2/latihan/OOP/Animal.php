<?php
// 1. Definisi Abstract Class
abstract class Animal
{
    public $name = 'Kucing';

    // - INTI ABSTRACT METHOD -
    // 2. Abstract Method
    // Method ini HANYA deklarasi, tidak punya isi ({})
    // Ini adalah 'KONTRAK' atau 'ATURAN WAJIB' untuk semua Child Class (turunan).
    // Child class dipaksa untuk 'override' dan mengisi method ini.
    public abstract function run();
}

// 3. Child Class
// Class Cat adalah class yang mewarisi (extends) Animal.
class Cat extends Animal
{
    // 4. Implementasi Wajib
    // Jika method 'run()' ini tidak ada, PHP akan ERROR!
    // Karena Cat 'berjanji' untuk mengisi kontrak 'run()' dari Parent Abstract-nya.
    public function run()
    {
        // Di sini kita definisikan perilaku 'run' yang spesifik untuk Cat.
        return $this->name . " itu Berlari";
    }
}

// 5. Cara Penggunaan
// Kita hanya bisa membuat object dari class turunannya (Cat)
$cat = new Cat();
echo $cat->run(); 


// DEFINISI INTERFACE (KONTRAK)
// Gunakan keyword 'interface'.
interface BisaDimakan
{
    // Ini adalah 'KONTRAK' wajib: Setiap class yang mengimplementasikan ini harus mengisi method ini.
    public function makan();
}

// Apel 'implements' (mengimplementasikan) kontrak BisaDimakan.
class Apel implements BisaDimakan
{
    // Jika method 'makan()' ini tidak ada, PHP akan ERROR!
    // Apel mengisi kontrak 'makan()' dengan logikanya sendiri.
    public function makan()
    {
        return "Apel dimakan: Langsung kunyah";
    }
}

// Jeruk juga 'implements' kontrak yang sama.
class Jeruk implements BisaDimakan
{
    // 6. Implementasi Wajib
    // Meskipun nama method-nya sama, logikanya berbeda!
    public function makan()
    {
        return "Jeruk dimakan: Kupas dulu, baru kunyah";
    }
}

//Cara Penggunaan
$apel = new Apel();
$jeruk = new Jeruk();
echo "<hr>";  

echo $apel->makan(); // Apel dimakan: Langsung kunyah
echo "<br>";
echo $jeruk->makan(); // Jeruk dimakan: Kupas dulu, baru kunyah
?>