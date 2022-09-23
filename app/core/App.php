<?php
class App
{
    protected $controller = 'home';
    protected    $method = 'index';
    protected    $params = [];

    public function __construct()
    {
        // ambil fungsi data dari parseURL lalu dimasukan ke variabel url
        $url = $this->parseURL();
        // cek di folder app/controllers apakah ada file sesuai dengan url index ke 0
        if (isset($url)) {
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                // jika ada maka nilai url akan dimasukan ke kontroler
                $this->controller = $url[0];
                unset($url[0]);
            }
        }
        // buka file controllernya
        require_once '../app/controllers/' . $this->controller . '.php';
        // buat object kontroler baru
        $this->controller = new $this->controller;
        // cek nilai url index ke satu
        if (isset($url[1])) {
            // jika ada methodnya di url index ke satu
            if (method_exists($this->controller, $url[1])) {
                // maka url akan dimasukan ke properti method
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        // cek url apakah tidak kosong
        if (!empty($url)) {
            // jika tidak berarti data index terakhir dari index 0 dan 1 dapat dipastikan itu parameternya
            $this->params =  $url;
        }
        // jadi call user func aray adalah satu fungsi bawan php berfungsi untuk membuat satuan array menjadi paramater/argumen dari sebuah function.

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // fungsi memecah url
    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
