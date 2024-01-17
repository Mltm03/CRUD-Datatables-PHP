<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('plantilla/sidebar');
    }
    public function tablas()
    {
        return view('tablas');
    }
    public function registros()
    {
        return view('registros');
    }
}
