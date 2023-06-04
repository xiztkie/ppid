<?php

namespace App\Controllers;

use App\Models\M_Permohonan;
use CodeIgniter\Email\Email;
use CodeIgniter\Validation\Validation;
use CodeIgniter\Validation\Exceptions\ValidationException;

class Permohonan extends BaseController
{
    public function __construct()
    {
        $this->M_Permohonan = new M_Permohonan();
        $this->validation = \Config\Services::validation();
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
        $validation = $this->validation;

        $validation->setRules([
            'nik' => [
                'label' => 'NIK',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom NIK harus diisi.',
                ],
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama harus diisi.',
                ],
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Alamat harus diisi.',
                ],
            ],
            'kontak' => [
                'label' => 'Kontak',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Kontak harus diisi.',
                ],
            ],
            'pekerjaan' => [
                'label' => 'Pekerjaan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Pekerjaan harus diisi.',
                ],
            ],
            'kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Kategori harus diisi.',
                ],
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Kolom Email harus diisi.',
                    'valid_email' => 'Format Email tidak valid.',
                ],
            ],
            'kebutuhan' => [
                'label' => 'Informasi Yang Dibutuhkan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Informasi Yang Dibutuhkan harus diisi.',
                ],
            ],
            'tujuan' => [
                'label' => 'Tujuan Pengunaan Informasi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Tujuan Pengunaan Informasi harus diisi.',
                ],
            ],
            'id_int' => [
                'label' => 'ID Instansi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ID Instansi harus diisi.',
                ],
            ],
            'cara_info' => [
                'label' => 'Cara Memperoleh Informasi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Cara Memperoleh Informasi harus diisi.',
                ],
            ],
            'dgn_cara' => [
                'label' => 'Cara Mendapatkan Salinan Informasi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Cara Mendapatkan Salinan Informasi harus diisi.',
                ],
            ],
            'file' => [
                'label' => 'File',
                'rules' => 'uploaded[file]|max_size[file,2048]|ext_in[file,zip,rar,pdf,jpeg,jpg]',
                'errors' => [
                    'uploaded' => 'File Belum Diupload',
                    'max_size' => 'Ukuran File terlalu besar.',
                    'ext_in' => 'Ekstensi File tidak valid. Hanya diperbolehkan file dengan ekstensi: pdf, doc, docx.',
                ],
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, redirect back with error messages
            return redirect()->back()->withInput()->with('validationErrors', $validation->getErrors());
        }

        $file = $this->request->getFile('file');
        $file->move('files/dokumen');
        $namafile = $file->getName();

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
            'file' => $namafile,
            'status_tiket' => $this->request->getPost('status_tiket'),
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
        $email->setSubject('PERMOHONANA DATA');

        // Load template email menggunakan view()
        $message = view('templatemail', ['nama' => $nama, 'no_tiket' => $no_tiket]);
        $email->setMessage($message);

        $email->send();
    }
}
