<?php

namespace App\Controllers;

use App\Models\M_Admin;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class C_admin extends BaseController   
{
    protected $session;
    protected $admin;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->admin = new M_admin();

        // Cek sesi admin
        if (!$this->session->has('admin_session')) {
            redirect()->to('/')->send(); // 'send()' untuk menghentikan eksekusi lebih lanjut
            exit;
        }
    }

    public function dashboard(): string
    {
        $data = [
            'title' => 'dashboard | Admin sesion',
            'page'  => 'Dashboard',
            'subPage' => '',
        ];

        return view('admin/dashboard.php', $data);
    }

    public function transaksi(): string
    {
        $data = [
            'title' => 'Input Transaksi | Admin sesion',
            'page'  => 'Transaksi',
            'subPage' => '',
        ];

        return view('admin/transaksi.php', $data);
    }

    public function data_barang(): string
    {
        $data = [
            'title' => 'Data Barang | Admin sesion',
            'page'  => 'data_brg',
            'subPage' => '',
        ];

        return view('admin/data_barang.php', $data);
    }

    public function user(): string
    {
        $data = [
            'title' => 'Daftar User | Admin sesion',
            'page'  => 'user',
            'subPage' => '',
        ];

        return view('admin/user.php', $data);
    }

    public function laporan(): string
    {
        $data = [
            'title' => 'Report Laporan | Admin sesion',
            'page'  => 'Laporan',
            'subPage' => '',
        ];

        return view('admin/laporan.php', $data);
    }
}
