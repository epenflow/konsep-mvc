<?php

class mhs extends Controller
{
    public function index()
    {
        $data['judul']  = 'daftar mahasiswa';
        $data['mhs'] = $this->models('mhs_models')->getData();
        $this->view('template/header', $data);
        $this->view('mhs/index', $data);
        $this->view('template/footer');
    }
    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->models('mhs_models')->getAllMhasiswaById($id);
        $this->view('template/header', $data);
        $this->view('mhs/detail', $data);
        $this->view('template/footer');
    }
    public function tambah()
    {
        if ($this->models('mhs_models')->tambahData($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mhs');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mhs');
            exit;
        }
    }
    public function hapus($id)
    {
        if ($this->models('mhs_models')->hapusData($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/mhs');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mhs');
            exit;
        }
    }

    public function getedit()
    {
        echo json_encode($this->models('mhs_models')->getAllMhasiswaById($_POST['id']));
    }

    public function edit()
    {
        if ($this->models('mhs_models')->editData($_POST) > 0) {
            Flasher::setFlash('berhasil', 'di edit', 'success');
            header('Location: ' . BASEURL . '/mhs');
            exit;
        } else {
            Flasher::setFlash('gagal', 'di edit', 'danger');
            header('Location: ' . BASEURL . '/mhs');
            exit;
        }
    }

    public function cari()
    {
        $data['judul']  = 'daftar mahasiswa';
        $data['mhs'] = $this->models('mhs_models')->cariData();
        $this->view('template/header', $data);
        $this->view('mhs/index', $data);
        $this->view('template/footer');
    }
}
