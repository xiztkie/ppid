<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_Instansi;

class Instansi extends BaseController
{
    public function __construct()
    {
        $this->M_Instansi = new M_Instansi();
        helper('form');
    }

    public function index()
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');
    
        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $currentpage = $this->request->getVar('page_instansi') ? $this->request->getVar('page_instansi') : 1;
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $instansi = $this->M_Instansi->search($keyword);
        }else{
            $instansi = $this->M_Instansi;
        }

        $data = [
            'title' => 'Instansi',
            'instansi' => $instansi->orderBy('id_int', 'DESC')->paginate(10, 'instansi'),
            'pager' => $this->M_Instansi->pager,
            'currentpage' => $currentpage,
            'isi'   => 'admin/instansi'
        ];
        return view('layout/wrapper', $data);
    }

    public function addinstansi()
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');
    
        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $data = array(
            'nama_int' => $this->request->getPost('nama_int'),
        );
        $this->M_Instansi->addinstansi($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan !!!');
        return redirect()->to(base_url('instansi'));
    }

    public function editinstansi($id_int)
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');
    
        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $data = array(
            'id_int' => $id_int,
            'nama_int' => $this->request->getPost('nama_int')
        );
        $this->M_Instansi->editinstansi($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah !!!');
        return redirect()->to(base_url('instansi'));
    }

    public function delete($id_int)
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');
    
        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $data = array(
            'id_int' => $id_int,
        );
        $this->M_Instansi->deleteinstansi($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus !!!');
        return redirect()->to(base_url('instansi'));
    }
}
