<?php
// class home adalah class child dari Controller
class home extends Controller
{
    // index adalah controller default
    public function index()
    {
        // variabel data berfungsi untuk mengirimkan nilai ke halaman yang ingin dituju
        $data['judul']  = 'home';
        // $data['nama'] = $this->models('user_models')->getUser();
        // $data['mhs_home'] = $this->models('mhs_models')->getData();
        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer');
    }
}
