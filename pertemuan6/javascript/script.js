var x = 10; // var banyak keretangan;
console.log(x);

var y = 20;
console.log(y);

var z = 30;
console.log(z)


// BUAT NAMA DAN NPM
var nama = "ariskaputri";
console.log(nama);

var NPM = "233040041";
console.log(NPM);


// BUAT DETEKSI BILANGAN
const angka = 10;

if (angka % 2 === 0) {
    console.log("Ini bilangan genap");
} else {
    console.log("Ini bilangan ganjil");
}


// BUATKAN IF ELSE, JIKA lulus, maka tampilkan ucapan "selamat", 
// JIKA TIDAK LULUS, UCAPKAN "SEMANGAT",
// JIKA NGULANG UCAPKAN "SILAHKAN AMBIL LAGI"
// jika bukan tiga tiganya, bilang "format salah"
const kelulusan = "LULUS";

if (kelulusan === "LULUS") {
    console.log("SELAMAT ANDA LULUS");
} else if (kelulusan === "TIDAK LULUS") {
    console.log("TETAP SEMANGAT");
} else if (kelulusan === "NGULANG") {
    console.log("SILAHKAN AMBIL LAGI");
} else {
    console.log("TIDAK ADA DI FORMAT");
}


// FUNCTION 
function tambah(a,b) {
     console.log(a + b);
}

tambah(10,10);

// FUNGSI PENGURANGAN
function pengurangan(a,b) {
     console.log(a - b);
}

pengurangan(15,5)

// FUNGSI VOLUME DUA KUBUS
function volumeDuaKubus(a, b) {
    var volumeA = a * a * a;
    var volumeB = b * b * b;
    return volumeA + volumeB;
}

console.log(volumeDuaKubus(8, 3));
console.log(volumeDuaKubus(10, 15));


// ARRAY
const hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
console.log(hari[6]);

const array = ["AriskaPutri", "233040041", ['PW,', 'PBD', 'PSI', 'PMP']];
console.log(array[2][2]);

// key : value
const object = {
    nama : "Ariska",
    umur : 21,
    npm : "233040041",
    email : "ariskaputri918@gmail.com",
    sapa : function () {
        return "Halo nama saya " + nama
    }
}
console.log(object.sapa());

// COBA BUATKAN OBJECT MAHASISWA, YANG DIMANA DIDALAMNYA TERDAPAT FUNGSI LULUS
// YANG PARAMETERNYA ADALAH NILAI INDEX (A,B,C,D,E), JIKA NILAINYA E, MAKA GAK LULUS
const mahasiswa = {
    nama : "Ariska",
    umur : 21,
    npm : "233040041",
    email : "ariskaputri918@gmail.com",
    lulus : function (na) {
        if (NA === "E") {
            return "TIDAK LULUS" 
        }else {
            return "LULUS"
        }
    }
}
console.log(mahasiswa.lulus(A));

