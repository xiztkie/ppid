<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_Sop;

class Sop extends BaseController
{
    public function __construct()
    {
        $this->M_Sop = new M_Sop();
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
        $currentpage = $this->request->getVar('page_Sop') ? $this->request->getVar('page_Sop') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $Sop = $this->M_Sop->search($keyword);
        } else {
            $Sop = $this->M_Sop;
        }

        $data = [
            'title' => 'Sop',
            'sop' => $Sop->orderBy('id_sop', 'DESC')->paginate(10, 'sop'),
            'pager' => $this->M_Sop->pager,
            'currentpage' => $currentpage,
            'isi'   => 'admin/sop'
        ];
        return view('layout/wrapper', $data);
    }

    public function addsop()
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');

        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $fileinfo = $this->request->getFile('file_sop');
        $fileinfo->move('files/sop');
        $namafileinfo = $fileinfo->getName();

        $data = array(
            'judul_sop' => $this->request->getPost('judul_sop'),
            'file_sop' => $namafileinfo,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->M_Sop->addsop($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan !!!');
        return redirect()->to(base_url('sop'));
    }

    public function editsop($id_sop)
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');

        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $data = array(
            'id_sop' => $id_sop,
            'judul_sop' => $this->request->getPost('judul_sop'),
            'file_sop' => $this->request->getPost('file_sop')
        );
        $this->M_Sop->editSop($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah !!!');
        return redirect()->to(base_url('sop'));
    }

    public function delete($id_sop)
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');

        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $file_sop = $this->M_Sop->filedata($id_sop);
        unlink('files/sop/' . $file_sop['file_sop']);

        $data = array(
            'id_sop' => $id_sop,
        );
        $this->M_Sop->deletesop($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus !!!');
        return redirect()->to(base_url('sop'));
    }
}
