<?php
//Controller User Mengatur tampilan daftar user dan detail user
class User extends Controller
{
    // Method utama - routing berdasarkan parameter id
    public function index()
    {
        $data["judul"] = "Data user";
        $data['users'] = $this->model('User_model')->getAllUsers();
        $this->view('list', $data);
    }

    // Tampilkan detail user berdasarkan id
    public function detail($id)
    {
        $data["judul"] = "Detail user";
        $data['user'] = $this->model('User_model')->getUserById($id);
        $this->view('detail', $data);
    }

    // Tampilkan form untuk menambah data baru
    public function tambah()
    {
        $data["judul"] = "Tambah Data user";
        $this->view('tambah', $data); // Memanggil view 'tambah.php'
    }

    // Proses penyimpanan data (CREATE)
    public function prosesTambah()
    {
        // Pengecekan apakah data berhasil ditambahkan
        if( $this->model('User_model')->tambahUserData($_POST) > 0 ) {
            // Jika berhasil, arahkan ke halaman utama/list user
            header('Location: ' . BASEURL . '/user'); 
            exit;
        } else {
            // Jika gagal, bisa diarahkan ke halaman error atau kembali ke form tambah
            header('Location: ' . BASEURL . '/user/tambah'); 
            exit;
        }
    }
    
    // Tampilkan form untuk mengedit data
    public function edit($id)
    {
        $data["judul"] = "Edit Data user";
        // Ambil data user yang akan diedit
        $data['user'] = $this->model('User_model')->getUserById($id);
        $this->view('edit', $data); // Memanggil view 'edit.php'
    }

    // Proses perubahan data (UPDATE)
    public function prosesUbah()
    {
        // Perhatikan bahwa $this->model('User_model')->ubahUserData($_POST) akan menerima ID dari hidden input
        if( $this->model('User_model')->ubahUserData($_POST) > 0 ) {
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            header('Location: ' . BASEURL . '/user/edit/' . $_POST['id']);
            exit;
        }
    }

    // Proses penghapusan data (DELETE)
    public function hapus($id)
    {
        if( $this->model('User_model')->hapusUserData($id) > 0 ) {
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
}

?>