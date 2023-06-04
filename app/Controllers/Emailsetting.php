<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_Email;

class Emailsetting extends BaseController
{
    public function __construct()
    {
        $this->M_Email = new M_Email();
        helper('form');
    }

    public function index()
    {
        $model = $this->M_Email;
        $settings = $model->findAll();

        $data = [
            'title' => 'Email Settings',
            'settings' => $settings,
            'isi'   => 'admin/email'
        ];

        return view('layout/wrapper', $data);
    }

    public function editemail($id_email)
    {
        $smtp_host = $this->request->getPost('smtp_host');
        $smtp_user = $this->request->getPost('smtp_user');
        $smtp_pass = $this->request->getPost('smtp_pass');
        $smtp_port = $this->request->getPost('smtp_port');
        $smtp_crypto = $this->request->getPost('smtp_crypto');

        $data = array(
            'id_email' => $id_email,
            'smtp_host' => $smtp_host,
            'smtp_user' => $smtp_user,
            'smtp_pass' => $smtp_pass,
            'smtp_port' => $smtp_port,
            'smtp_crypto' => $smtp_crypto
        );

        $this->M_Email->editemail($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah !!!');
        return redirect()->to(base_url('email'));
    }
}
