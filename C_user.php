<?php

namespace App\Controllers;

use App\Models\M_User;

class C_User extends BaseController
{
    protected $session;
    protected $user;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->user = new M_User();

        // Cek sesi user
        if (!$this->session->has('user_session')) {
            redirect()->to('/')->send(); // 'send()' untuk menghentikan eksekusi lebih lanjut
            exit;
        }
    }

    public function transaksi(): string
    {
        $data = [
            'title' => 'Input Transaksi | User sesion',
            'page'  => 'Transaksi',
            'subPage' => '',
        ];

        return view('user/transaksi.php', $data);
    }

    public function data_barang(): string
    {
        $data = [
            'title' => 'Data Barang | User sesion',
            'page'  => 'data_brg',
            'subPage' => '',
        ];

        return view('user/data_barang.php', $data);
    }
}