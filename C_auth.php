<?php

namespace App\Controllers;

use App\Models\M_auth;

class C_auth extends BaseController
{
    protected $session;
    protected $Auth;

    public function __construct()
    {
        $this->session = \config\Services::session();
        $this->Auth = new M_auth();
    }

    public function login()
    {
        if ($this->session->has('admin_session') || $this->session->has('user_session')) {
            if ($this->session->get('user_level') == 0) {
                return redirect()->to('/admin');
            }
            if ($this->session->get('user_level') == 1) {
                return redirect()->to('/user');
            }
        } else {
            $data = [
                'title' => 'Login'
            ];
            return view('login', $data);
        }
    }

    public function loginVerification()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        //ambil data user di database yang user_name nya sama 
        $user_check = $this->Auth->getUser($username);

        if ($user_check) { //cek apakah username ditemukan
            if ($user_check['password'] != $password) {
                //cek password jika salah arahkan lagi ke halaman login
                session()->setFlashdata('login_fail', 'Pasword salah!');
                return redirect()->to('/');
            }
            if (($user_check['password'] == $password) && ($user_check['user_level'] == 0)) {
                //jika benar, arahkan user masuk ke halaman admin 
                $sessLogin = [
                    'admin_session' => TRUE,
                    'username'    => $user_check['username'],
                    'user_level'   => $user_check['user_level'],
                ];
                $this->session->set($sessLogin);
                return redirect()->to('/admin');
            }
            if (($user_check['password'] == $password) && ($user_check['user_level'] == 1)) {
                //jika benar, arahkan user masuk ke halaman user 
                $sessLogin = [
                    'user_session' => TRUE,
                    'username'    => $user_check['username'],
                    'user_level'   => $user_check['user_level'],
                ];
                $this->session->set($sessLogin);
                return redirect()->to('/user');
            }
        } else {
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('login_fail', 'Username tidak ditemukan!');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        //hapus session dan kembali ke halaman login
        $this->session->destroy();
        return redirect()->to('/');
    }
}
