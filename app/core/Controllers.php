<?php

class Controller
{
    // fungsi view disini adalah untuk mengambil data dari folder app views
    public function view($view, $data = [])
    {
        // mereturn view dari folder views
        require_once '../app/views/' . $view . '.php';
    }

    public function models($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
