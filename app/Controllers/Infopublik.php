<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_Infopublik;

class Infopublik extends BaseController
{
    public function __construct()
    {
        $this->M_Infopublik = new M_Infopublik();
        helper('form');
        helper('date');
    }

    public function index()
    {
        $currentpage = $this->request->getVar('page_infopublik') ? $this->request->getVar('page_infopublik') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $infopublik = $this->M_Infopublik->search($keyword);
        } else {
            $infopublik = $this->M_Infopublik;
        }

        $data = [
            'title' => 'Infopublik',
            'opd' => $this->M_Infopublik->selectinstansi(),
            'infopublik' => $infopublik->join('instansi', 'instansi.id_int = infopublik.id_int')
                                        ->table('instansi')
                                        ->orderBy('id_info', 'DESC')->paginate(10, 'infopublik'),
            'pager' => $this->M_Infopublik->pager,
            'currentpage' => $currentpage,
            'isi'   => 'admin/infopublik'
        ];
        return view('layout/wrapper', $data);
    }

    public function addinfopublik()
    {

        $fileinfo = $this->request->getFile('file_info');
        $fileinfo->move('files/infopublik');
        $namafileinfo = $fileinfo->getName();

        $data = array(
            'id_int' => $this->request->getPost('id_int'),
            'informasi' => $this->request->getPost('informasi'),
            'judul' => $this->request->getPost('judul'),
            'file_info' => $namafileinfo,
            'created_at' => date('Y-m-d H:i:s')           
        );
        $this->M_Infopublik->addinfopublik($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan !!!');
        return redirect()->to(base_url('infopublik'));
    }

    public function editinfopublik($id_info)
    {
        $data = array(
            'id_info' => $id_info,
            'id_int' => $this->request->getPost('id_int'),
            'informasi' => $this->request->getPost('informasi'),
            'judul' => $this->request->getPost('judul'),
            'file_info' => $this->request->getPost('file_info')
        );
        $this->M_Infopublik->editinfopublik($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah !!!');
        return redirect()->to(base_url('infopublik'));
    }

    public function delete($id_info)
    {
        
        $file_info = $this->M_Infopublik->filedata($id_info);
        unlink('files/infopublik/' . $file_info['file_info']);

        $data = array(
            'id_info' => $id_info,
        );
        $this->M_Infopublik->deleteinfopublik($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus !!!');
        return redirect()->to(base_url('infopublik'));
    }
}
