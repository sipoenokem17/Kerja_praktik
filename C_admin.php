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
            'dataUsers'  => $this->admin->dataUser(),
            'dataBooth'  => $this->admin->dataBooth(),
            'subPage' => '',
        ];
        
        return view('admin/user.php', $data);
    }

        public function detailUser($id_user)
    {
        $detailuser = $this->admin->getdetailUser($id_user);
        return $this->response->setJSON($detailuser);
    }

    public function tambahUser()
    {
        $data = [
            'nama'          => $this->request->getPost('nama'),
            'username'      => $this->request->getPost('username'),
            'password'      => $this->request->getPost('pasword'),
            'no_hp'         => $this->request->getPost('noHandphone'),
            'id_booth'      => $this->request->getPost('id_booth'),
            'user_level'    => $this->request->getPost('userLevel'),
        ];

        $this->admin->tambahUser($data);

        session()->setFlashdata('msg_add', 'Data Berhasil Ditambahkan!');

        return redirect()->to('admin/user');
    }

    public function hapusUser()
    {
        $id_user = $this->request->getPost('delid');

        $this->admin->hapusUser($id_user);


        session()->setFlashdata('msg_del', 'Data Berhasil Dihapus!');

        return redirect()->to('admin/user');
    }

    public function ubahDataUser()
    {
        $id_user = $this->request->getPost('u_id');

        $data = [
            'nama'         => $this->request->getPost('u_nama'),
            'username'     => $this->request->getPost('u_username'),
            'password'     => $this->request->getPost('u_password'),
            'No_hp'        => $this->request->getPost('u_noHp'),
            'id_booth'     => $this->request->getPost('u_id_booth'),
            'user_level'   => $this->request->getPost('user_Level'),
        ];

        $this->admin->ubahDataUser($data, $id_user);

        session()->setFlashdata('msg_upd', 'Data Berhasil Diperbaharui!');

        return redirect()->to('admin/user');
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
