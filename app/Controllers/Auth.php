<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\M_Auth;


class Auth extends BaseController
{
    public function __construct()
    {
        $this->M_Auth = new M_Auth();
        helper('form');
        helper('url');
    }
    public function index()
    {
    }
    public function login()
    {
        echo view('login');
    }
    public function proseslogin()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ]
        ])) {
            //jika valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->M_Auth->login($username, $password);
            if ($cek) {
                //jika data cocok
                session()->set('log', true);
                session()->set('username', $cek['username']);
                session()->set('level', $cek['level']);
                session()->set('id_int', $cek['id_int']);
                //login
                return redirect()->to(base_url('admin'));
            } else {
                //jika data tidak cocok
                session()->setFlashdata('pesan', ' Username / Password Anda Salah Silahkan Login Kembali');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/login'));
        }
    }
    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('level');
        session()->remove('id_int');

        session()->setFlashdata('pesan', 'Anda Telah Logout !!!');
        return redirect()->to(base_url('#'));
    }
}
