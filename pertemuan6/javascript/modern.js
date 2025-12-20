// 1.Arrow Function 
    // Function Expression
    const tampilNama = function (nama) {
    return `Hello ${nama}`;
    };

    console.log(tampilNama('Budi'));

    //Arrow Function 
    const tampilkanNama = (nama) => {
    return `Halo ${nama}`;
    };

    console.log(tampilkanNama('Budi'));

    // Arrow Function Implisit return
    const tampilnyaNama = nama => `Halo ${nama}`;

    console.log(tampilnyaNama('Budi'));

// 2.Filter
    const angka = [-2, -2, 6, -8, 3, 6, 8, -10];
    let angkabaru = [];
    // menggunakan For cara lama
    for (let i = 0; i < angka.length; i++) {
    if (angka[i] >= 0) {
        angkabaru.push(angka[i]);
    }
    }

    //Ubah penggunaan for menjadi method filter() 
    const arrFilter = angka.filter((a) => {
    // jika angka lebih besar sama dengan nol
    if (a >= 0) {
        // Masukkan angka baru ke array baru
        angkabaru.push(a);
    }
    });

// 3.Map
    // MAP
    const angkabaru2 = angka.map((a) => a * 2);
    console.log(angkabaru2);
    // Perlu diingat kembali map() membuat array baru

// 4.Reduce
    // REDUCE
    // accumulator : tempat menampung hasil
    // currentValue : angka yang sedang diproses
    // 0 : Angka awal accumulator, dimulai dari mana
    const angkabaru3 = angka.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
    console.log(angkabaru3);

// 5.Destructuring Assignment 
    // Array
    const kelas = ['A', 'B', 'C'];

    const [senin, rabu, kamis] = kelas;
    console.log(`Kelas hari senin itu kelas: ${senin}`);
    console.log(`Kelas hari rabu itu kelas: ${rabu}`);
    console.log(`Kelas hari kamis itu kelas: ${kamis}`);

    // Object
    const mahasiswa = {
    nama: 'Budi',
    umur: 20,
    };
 
    const { nama, umur } = mhs;
    console.log(`Nama mahasiswa: ${nama}`);
    console.log(`Umur mahasiswa: ${umur}`);

    // Destructuring object dan assign ke variable baru
    const mhs = {
    nama: 'Budi',
    umur: 20, 
    };

    const { nama: n, umur: u } = mhs;
    console.log(`Nama mahasiswa: ${n}`);
    console.log(`Umur mahasiswa: ${u}`); 
 


