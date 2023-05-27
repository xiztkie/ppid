<?php

namespace App\Controllers;

use App\Models\M_Permohonan;
use CodeIgniter\Email\Email;

class Permohonan extends BaseController
{
    public function __construct()
    {
        $this->M_Permohonan = new M_Permohonan();
        $this->email = \Config\Services::email();
        helper('form');
        helper('number');
        helper('date');
    }
    public function index()
    {
        $data = [
            'opd' => $this->M_Permohonan->selectinstansi(),
        ];
        return view('permohonan', $data);
    }
    function generatetiket()
    {
        return json_encode($this->M_Permohonan->generatetiket());
    }
    

    public function tambahtiket()
    {
        $data = array(
            'no_tiket' => $this->request->getPost('no_tiket'),
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'kontak' => $this->request->getPost('kontak'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'kategori' => $this->request->getPost('kategori'),
            'email' => $this->request->getPost('email'),
            'kebutuhan' => $this->request->getPost('kebutuhan'),
            'tujuan' => $this->request->getPost('tujuan'),
            'id_int' => $this->request->getPost('id_int'),
            'cara_info' => $this->request->getPost('cara_info'),
            'dgn_cara' => $this->request->getPost('dgn_cara'),
            'file' => $this->request->getPost('file'),
            'status_tiket' => $this->request->getPost('status_tiket'),
            'status_proses' => $this->request->getPost('status_proses'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->M_Permohonan->kirimdata($data);

        $emailto = $data['email'];
        $no_tiket = $data['no_tiket'];
        $nama = $data['nama'];
        $this->sendEmail($emailto, $no_tiket, $nama);

        session()->setFlashdata('pesan', 'Permohonan anda telah dikirim dengan nomor tiket <br>');
        session()->setFlashdata('no_tiket', $data['no_tiket']);
        session()->setFlashdata('pesan_email', '<br>nomor tiket dapat dilihat diemail anda ');
        session()->setFlashdata('email', $data['email']);
        return redirect()->to(base_url('permohonan'));
    }

    private function sendEmail($emailto, $no_tiket, $nama)
    {
        $email = \Config\Services::email();

        $email->setTo($emailto);
        $email->setFrom('ppid.puncakjaya@outlook.com', 'PPID PUNCAK JAYA');
        $email->setSubject('PERMOHONANA DATA' );
        $email->setMessage('Dear ' . $nama  . $no_tiket . 'Thank you for registering.');
        

        $email->send();
    }
}
