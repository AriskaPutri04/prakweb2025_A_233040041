// STUDI KASUS 
function tambahPenumpang(namaPenumpang, penumpang) {
  // 1. Angkot kosong
  if (penumpang.length === 0) {
    penumpang.push(namaPenumpang);
    return penumpang;
  }

  // 2. Telusuri kursi
  for (let i = 0; i < penumpang.length; i++) {
    // Kursi kosong 
    if (penumpang[i] === undefined) {
      penumpang[i] = namaPenumpang;
      return penumpang;
    }

    // Nama sama
    if (penumpang[i] === namaPenumpang) {
      console.log(namaPenumpang + " sudah ada di dalam angkot");
      return penumpang;
    }
  }
 
  // 3. Semua kursi terisi -> tambah kursi baru
  penumpang.push(namaPenumpang);
  return penumpang;
}

let penumpang = [];

penumpang = tambahPenumpang("Galih", penumpang);
penumpang = tambahPenumpang("Sandhika", penumpang);
penumpang = tambahPenumpang("Dody", penumpang);
penumpang = tambahPenumpang("Sandhika", penumpang); // error -> nama duplikat
console.log(penumpang);
