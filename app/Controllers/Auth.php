<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Auth;
use App\Models\M_Instansi;


class Auth extends BaseController
{
    public function __construct()
    {
        $this->M_Auth = new M_Auth();
        $this->M_Instansi = new M_Instansi();
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
            // Jika validasi berhasil
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->M_Auth->login($username, $password);
            if ($cek) {
                // Jika data cocok
                if (password_verify($password, $cek['password'])) {
                    // Jika password cocok
                    session()->set('log', true);
                    session()->set('username', $cek['username']);
                    session()->set('level', $cek['level']);

                    // Mendapatkan data instansi berdasarkan id_int
                    $instansi = $this->M_Instansi->getInstansiById($cek['id_int']);
                    if ($instansi) {
                        session()->set('id_int', $cek['id_int']);
                        session()->set('nama_int', $instansi['nama_int']);
                    } else {
                        session()->setFlashdata('pesan', 'Data Instansi Tidak Ditemukan');
                        return redirect()->to(base_url('auth/login'));
                    }

                    return redirect()->to(base_url('admin'));
                } else {
                    // Jika password tidak cocok
                    session()->setFlashdata('pesan', 'Username / Password Anda Salah Silahkan Login Kembali');
                    return redirect()->to(base_url('auth/login'));
                }
            } else {
                // Jika data tidak cocok
                session()->setFlashdata('pesan', 'Username / Password Anda Salah Silahkan Login Kembali');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            // Jika validasi gagal
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
        return redirect()->to(base_url('home'));
    }
}
