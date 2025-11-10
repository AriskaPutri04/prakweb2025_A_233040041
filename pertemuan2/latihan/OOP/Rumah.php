<?php

// Definisi Class Rumah (DENAH)
class Rumah {

    // -- PROPERTY (DATA) --
    // Ini adalah data / keadaan yang akan dimiliki
    // 'public' adalah 'visibility'

    public $warna = "Putih";
    public $jumlahKamar = 4;
    public $alamat = "Jln. Pasundan No. 1";

    // -- BAGIAN KONSTRUKTOR --
    public function __construct( $warnaBaru, $kamarBaru) {
        $this->warna = $warnaBaru; 
        $this->jumlahKamar = $kamarBaru; 
    }

    // -- BAGIAN METHOD (PERILAKU) --
    // Ini adalah perilaku / aksi 
    // 'public' adalah 'visibility

     public function kunciPintu() {
        return "Pintu sudah dikunci!";
    }

    public function gantiWarna($warnaBaru) {
        //'$this->warna' artinya "mengakses property 'warna'
        // milik object ini sendiri"
        $this->warna = $warnaBaru;
    }
}

function pasangListrik($rumah)
{
    return "Rumah yang berwarna " . $rumah->warna . " ini dipasang listrik";
}

// -- BAGIAN OBJECT (RUMAH JADI) --

// 1. Membuat Object pertama dari Class rumah
// Kita sebut ini "rumahSaya"
$rumahSaya = new Rumah ('Biru', 5);
echo pasangListrik($rumahSaya);
$rumahSaya->gantiWarna("Biru");
echo "<br>";
echo "Rumah saya berwarna $rumahSaya->warna"; 
echo "<br>";
echo "rumah saya $rumahSaya->jumlahKamar"; 
echo "<br>";


// // 4. Melihat data lagi setelah diubah
echo "Warna baru rumah saya : " . $rumahSaya->warna; // Otput Biru
echo "<br>";

// // 5. Menjalankan Method lain
echo $rumahSaya->kunciPintu(); // Output: Pintu sudah dikunci
echo "<hr>";  

// Membuat Object kedua dari Class Rumah
// Kita sebut ini "rumah Tetangga"
$rumahTetangga = new Rumah('Merah', 10);
$rumahSaya->gantiWarna("Abu");
echo "Warna rumah tetangga $rumahTetangga->warna"; //Output Merah
echo "<br>";
echo "rumah saya $rumahTetangga->jumlahKamar"; 
echo "<br>";
// // adalah object yang berbeda dari $rumah Saya

// — CONTOH ERROR —
// 3. Coba panggil fungsi dengan data string (SALAH)
$teksBiasa = "Ini cuma string";

// Baris di bawah ini jika dijalankan akan ERROR:
// echo pasanglistrik($teksBiasa);
// PHP akan error karena $teksBiasa BUKAN object 'Rumah'
?>