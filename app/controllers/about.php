<?php

class about extends Controller
{
    // index adalah controller default
    // variabel nama dan pekerjaan berfungsi untuk menambahkan paramater dan method di url
    public function index($nama = '', $pekerjaan = '')
    {
        // variabel data berfungsi untuk mengirimkan nilai ke halaman yang ingin dituju
        $data['judul']  = 'home about';
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $this->view('template/header', $data);
        $this->view('about/index', $data);
        $this->view('template/footer');
    }
    public function page($id = 'namsa')
    {
        // variabel data berfungsi untuk mengirimkan nilai ke halaman yang ingin dituju
        $data['judul']  = 'page';
        $data['cobas'] = $id;
        $this->view('template/header', $data);
        $this->view('about/page', $data);
        $this->view('template/footer');
    }
}
