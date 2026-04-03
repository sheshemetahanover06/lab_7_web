<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Home',
            'content' => 'Ini adalah halaman utama website praktikum CodeIgniter.'
        ];

        return view('home', $data);
    }
}