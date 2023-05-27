<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_User;

class User extends BaseController
{
    public function __construct()
    {
        $this->M_User = new M_User();
        helper('form');
    }

    public function index()
    {
        $currentpage = $this->request->getVar('page_instansi') ? $this->request->getVar('page_instansi') : 1;
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $user = $this->M_User->search($keyword);
        }else{
            $user = $this->M_User;
        }

        $data = [
            'title' => 'User',
            'opd' => $this->M_User->selectinstansi(),
            'user' => $user->orderBy('id_user', 'DESC')->paginate(10, 'user'),
            'pager' => $this->M_User->pager,
            'currentpage' => $currentpage,
            'isi'   => 'admin/user'
        ];
        return view('layout/wrapper', $data);
    }

    public function adduser()
    {
        $data = array(
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
            'id_int' => $this->request->getPost('id_int')
        );
        $this->M_User->adduser($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan !!!');
        return redirect()->to(base_url('user'));
    }

    public function edituser($id_user)
    {
        $data = array(
            'id_user' => $id_user,
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
            'id_int' => $this->request->getPost('id_int')
        );
        $this->M_User->edituser($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah !!!');
        return redirect()->to(base_url('user'));
    }
    
    public function delete($id_user)
    {
        $data = array(
            'id_user' => $id_user,
        );
        $this->M_User->deleteuser($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus !!!');
        return redirect()->to(base_url('User'));
    }
}
