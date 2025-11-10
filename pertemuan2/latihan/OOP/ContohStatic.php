<?php
class ContohStatic
{
    public static $angka = 1;

    public static function hallo()
    {
        // Akses property static menggunakan self::
        // return 'Hallo' . $this->angka; // Tidak bisa menggunakan $this
        return 'Hallo' . self::$angka;
    }
}

echo ContohStatic::$angka;
echo "<br>";
echo ContohStatic::hallo();

// === Membuat Constant menggunakan define()
// Define memerlukan 2 buah parameter
// Parameter: nama variable dan nilai nya.
// Ketika membuat constant, nama variable nya KAPITAL
define("NAMA", "Hikmal Ryvaldi");

// === Membuat Constant menggunakan const.
// Sama seperti define nama variable nya KAPITAL
const NRP = 2230400;

// Untuk mengaksesnya sama seperti akses variable biasa
echo NAMA;
echo '<br>';
echo NRP;
echo "<hr>";  

// Menerapkan constant pada class 'CobaConstant'.
class CobaConstant
{ 
    // define('COBA', 'BEBAS'); // ERROR (define() tidak bisa digunakan di dalam class scope)
    const JURUSAN = 'Teknik Informatika';
}

// Cara mengakses constant sama seperti static
echo CobaConstant::JURUSAN;
?>