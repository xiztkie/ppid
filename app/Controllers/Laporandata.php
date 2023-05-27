<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_Laporandata;

class Laporandata extends BaseController
{
    public function __construct()
    {
        $this->M_Laporandata = new M_Laporandata();
        helper('form');
        helper('date');
    }

    public function index()
    {
        $currentpage = $this->request->getVar('page_lap') ? $this->request->getVar('page_lap') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $lap = $this->M_Laporandata->search($keyword);
        } else {
            $lap= $this->M_Laporandata;
        }

        $data = [
            'title' => 'Laporan Data',
            'laporandata' => $lap->orderBy('id_lap', 'DESC')->paginate(10, 'laporandata'),
            'pager' => $this->M_Laporandata->pager,
            'currentpage' => $currentpage,
            'isi'   => 'admin/laporandata'
        ];
        return view('layout/wrapper', $data);
    }

    public function addlap()
    {

        $fileinfo = $this->request->getFile('file_lap');
        $fileinfo->move('files/laporan');
        $namafileinfo = $fileinfo->getName();

        $data = array(
            'judul_lap' => $this->request->getPost('judul_lap'),
            'file_lap' => $namafileinfo,
            'created_at' => date('Y-m-d H:i:s')            
        );
        $this->M_Laporandata->addlap($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan !!!');
        return redirect()->to(base_url('laporandata'));
    }

    public function editlap($id_lap)
    {
        $data = array(
            'id_lap' => $id_lap,
            'judul_lap' => $this->request->getPost('judul_lap'),
            'file_lap' => $this->request->getPost('file_lap')
        );
        $this->M_Laporandata->editlap($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah !!!');
        return redirect()->to(base_url('laporandata'));
    }

    public function delete($id_lap)
    {
        
        $file_lap = $this->M_Laporandata->filedata($id_lap);
        unlink('files/laporan/' . $file_lap['file_lap']);

        $data = array(
            'id_lap' => $id_lap,
        );
        $this->M_Laporandata->deletelap($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus !!!');
        return redirect()->to(base_url('laporandata'));
    }
}
