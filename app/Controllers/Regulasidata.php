<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_Regulasidata;

class Regulasidata extends BaseController
{
    public function __construct()
    {
        $this->M_Regulasidata = new M_Regulasidata();
        helper('form');
        helper('date');
    }

    public function index()
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');

        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $currentpage = $this->request->getVar('page_reg') ? $this->request->getVar('page_reg') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $reg = $this->M_Regulasidata->search($keyword);
        } else {
            $reg = $this->M_Regulasidata;
        }

        $data = [
            'title' => 'Regulasi Data',
            'regulasidata' => $reg->orderBy('id_reg', 'DESC')->paginate(10, 'regulasidata'),
            'pager' => $this->M_Regulasidata->pager,
            'currentpage' => $currentpage,
            'isi'   => 'admin/regulasidata'
        ];
        return view('layout/wrapper', $data);
    }

    public function addreg()
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');

        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $fileinfo = $this->request->getFile('file_reg');
        $fileinfo->move('files/regulasi');
        $namafileinfo = $fileinfo->getName();

        $data = array(
            'judul_reg' => $this->request->getPost('judul_reg'),
            'file_reg' => $namafileinfo,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->M_Regulasidata->addreg($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan !!!');
        return redirect()->to(base_url('regulasidata'));
    }

    public function editreg($id_reg)
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');
    
        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $data = array(
            'id_reg' => $id_reg,
            'judul_reg' => $this->request->getPost('judul_reg'),
            'file_reg' => $this->request->getPost('file_reg')
        );
        $this->M_Regulasidata->editreg($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah !!!');
        return redirect()->to(base_url('regulasidata'));
    }

    public function delete($id_reg)
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');
    
        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $file_reg = $this->M_Regulasidata->filedata($id_reg);
        unlink('files/regulasi/' . $file_reg['file_reg']);

        $data = array(
            'id_reg' => $id_reg,
        );
        $this->M_Regulasidata->deletereg($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus !!!');
        return redirect()->to(base_url('regulasidata'));
    }
}
