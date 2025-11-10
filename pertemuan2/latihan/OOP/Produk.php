 <?php
 // == PARENT CLASS (CLASS INDUK) ==
// Class ini berisi semua properti/method umum
// yang dimiliki oleh SEMUA produk.

class Produk {

    // Properti umum
    public $judul,
           $penulis, 
           $penerbit,
           $harga;
 
    // Constructor milik Parent
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    } 

    // Membuat method setter untuk melakukan perubahan pada property protected/private.
    public function setJudul($judulBaru)
    {
        return $this->judul = $judulBaru;
    }

    public function getJudul()
    {
        return $this->judul;
    }

    // Method milik Parent
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    // Cara mengakses Harga dari Child Class
    public function getHarga()
    {
        return $this->harga;
    }

    // Ini adalah method 'getInfoProduk' versi PARENT (Umum) OVERRIDE
    public function getInfoProduk() {
    return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    }
}

// KOMIK //

class Komik extends Produk 
{
    public $jumlahHalaman;

    public function __construct( $judul, $penulis, $penerbit, $harga, $jumlahHalaman) 
    {
        parent::__construct( $judul, $penulis, $penerbit, $harga);
        $this->jumlahHalaman = $jumlahHalaman;
    }

    //  public function getInfoProduk() 
    //  {
    //     $info = "Komik: " . parent::getLabel() . " | Harga: " . $this->harga . " | Halaman: " . $this->jumlahHalaman ;
    //     return $info; 
    //  }

     // Method ini 'menimpa' method getInfoProduk() milik Parent OVERRIDE
    public function getInfoProduk() 
    {
    // 1. Kita tetap panggil method ASLI milik Parent
    // menggunakan 'parent::'
    $infoParent = parent::getInfoProduk();

    // 2. Kita tambahkan info spesifik milik Komik
    return "Komik : {$infoParent} - {$this->jumlahHalaman} Halaman.";
    }
}

//Komik 1
$komik1 = new Komik('Naruto', 'Penulis Naruto', '2004', 1000, 10);
echo $komik1->getInfoProduk();
echo "<br>";

// GAME //
class Game extends Produk 
{
    // Properti khusus milik Game
    public $waktuMain;

    public function __construct( $judul, $penulis, $penerbit, $harga, $waktuMain ) {
        parent::__construct( $judul, $penulis, $penerbit, $harga );
        $this->waktuMain = $waktuMain;
    }

    // Method ini 'menimpa' method getInfoProduk() milik Parent
    public function getInfoProduk() {
    $infoParent = parent::getInfoProduk();
    return "Game : {$infoParent} ~ {$this->waktuMain} Jam.";
    }

    // Cara mengakses Harga dari Child Class
    public function getHarga()
    {
        return $this->harga;
    }

    // // Method khusus Game
    // public function getInfoProduk() {
    //     $info = "Game : " . parent::getLabel() . " | Rp. {$this->harga} | {$this->waktuMain} Jam.";
    //     return $info;
    // }

}

// Komik & Game
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";  

// Cara memanggil harga yang benar menggunakan method dari child class
echo $produk2->getHarga();
echo "<hr>";  


// Ubah $harga menjadi "private"
// Private hanya bisa diakses pada class dimana dia didefinisikan
// public $judul, $penulis, $penerbit;
// private $harga;

// Ini Setter
// Property Private yang awalnya "Naruto" berubah menjadi "Goku"
$produk1->setJudul('Goku');
echo $produk1->getInfoProduk(); // Komik: Goku | Masashi Kishimoto, Shonen Jump (Rp. 3000) - 100 Halaman

// Memanggil getJudul dari Child Class (Komik)
echo $produk1->getJudul();
?>