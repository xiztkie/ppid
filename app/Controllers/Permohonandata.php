<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_Permohonandata;
use App\Models\M_Prosespermohonan;

class Permohonandata extends BaseController
{
    public function __construct()
    {
        $this->M_Permohonandata = new M_Permohonandata();
        $this->M_Prosespermohonan = new M_Prosespermohonan();
        helper('form');
        helper('date');
    }
    public function index()
    {
        $currentpage = $this->request->getVar('page_perdata') ?: 1;
        $keyword = $this->request->getVar('keyword');
        $perdata = $this->M_Permohonandata;

        // Check if the session level is 'Operator' and add the condition
        if (session('level') === 'Operator') {
            $perdata->where('permohonan.id_int', session('id_int'));
        }

        if ($keyword) {
            $perdata = $perdata->search($keyword);
        }

        $data = [
            'title' => 'Permohonan data',
            'permohonandata' => $perdata->join('instansi', 'instansi.id_int = permohonan.id_int')
                ->orderBy('id_pemohon', 'DESC')
                ->paginate(10, 'permohonan'),
            'pager' => $this->M_Permohonandata->pager,
            'currentpage' => $currentpage,
            'isi' => 'admin/permohonandata'
        ];

        return view('layout/wrapper', $data);
    }


    public function indexbaru()
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');
    
        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $currentpage = $this->request->getVar('page_perbaru') ? $this->request->getVar('page_perbaru') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $perbaru = $this->M_Permohonandata->search($keyword);
        } else {
            $perbaru = $this->M_Permohonandata;
        }

        $data = [
            'title' => 'Permohonan data baru',
            'permohonanbaru' => $perbaru->join('instansi', 'instansi.id_int = permohonan.id_int')
                ->where('permohonan.status_tiket', 1)
                ->table('instansi')
                ->orderBy('id_pemohon', 'DESC')
                ->paginate(10, 'permohonanbaru'),
            'pager' => $this->M_Permohonandata->pager,
            'currentpage' => $currentpage,
            'isi'   => 'admin/permohonanbaru'
        ];
        return view('layout/wrapper', $data);
    }

    public function indexproses()
    {
        $currentpage = $this->request->getVar('page_perbaru') ? $this->request->getVar('page_perbaru') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $perbaru = $this->M_Permohonandata->search($keyword);
        } else {
            $perbaru = $this->M_Permohonandata;
        }

        // Check if the session level is 'Operator' and add the condition
        if (session('level') === 'Operator') {
            $perbaru->where('permohonan.id_int', session('id_int'));
        }

        $data = [
            'title' => 'Proses Permohonan Data',
            'proses_tiket' => $this->M_Prosespermohonan->getProses(),
            'prosespermohonan' => $perbaru->join('instansi', 'instansi.id_int = permohonan.id_int')
                ->where('permohonan.status_tiket', 2)
                ->where('permohonan.solved', null)
                ->orderBy('id_pemohon', 'DESC')
                ->paginate(10, 'prosespermohonan'),
            'pager' => $this->M_Permohonandata->pager,
            'currentpage' => $currentpage,
            'isi'   => 'admin/prosespermohonan'
        ];
        return view('layout/wrapper', $data);
    }

    public function accepttiket($id_pemohon)
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');
    
        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $no_tiket = $this->request->getPost('no_tiket');
        $data = array(
            'id_pemohon' => $id_pemohon,
            'status_tiket' => $this->request->getPost('status_tiket'),
            'keterangan' => $this->request->getPost('keterangan'),
            'verifikasi_date' => date('Y-m-d H:i:s')
        );
        $this->M_Permohonandata->accepttiket($data);
        session()->setFlashdata('pesan', $no_tiket . ' Permohonan Berhasil Disetujui !!!');
        return redirect()->to(base_url('permohonanbaru'));
    }

    public function tolaktiket($id_pemohon)
    {
        $isLoggedIn = session('log');
        $userRole = session()->get('level');
    
        if (!$isLoggedIn || $userRole !== 'Admin') {
            // Jika pengguna tidak terautentikasi atau bukan Admin, redirect ke halaman lain
            return redirect()->to(base_url('home'));
        }
        $no_tiket = $this->request->getPost('no_tiket');
        $data = array(
            'id_pemohon' => $id_pemohon,
            'status_tiket' => $this->request->getPost('status_tiket'),
            'keterangan' => $this->request->getPost('keterangan'),
            'verifikasi_date' => date('Y-m-d H:i:s')
        );
        $this->M_Permohonandata->accepttiket($data);
        session()->setFlashdata('pesan', $no_tiket . ' Permohonan Berhasil Di Tolak !!!');
        return redirect()->to(base_url('permohonanbaru'));
    }

    public function closetiket($id_pemohon)
    {
        $no_tiket = $this->request->getPost('no_tiket');
        $data = array(
            'id_pemohon' => $id_pemohon,
            'solved' => $this->request->getPost('solved'),
            'solved_date' => date('Y-m-d H:i:s')
        );
        $this->M_Permohonandata->accepttiket($data);
        session()->setFlashdata('pesan', $no_tiket . ' Permohonan Berhasil Di Tutup !!!');
        return redirect()->to(base_url('prosespermohonan'));
    }

    public function prosestiket($id_pemohon)
    {
        $no_tiket = $this->request->getPost('no_tiket');
        $data = array(
            'id_pemohon' => $id_pemohon,
            'status_pro' => $this->request->getPost('status_pro'),
            'ket_proses' => $this->request->getPost('ket_proses'),
            'date_proses' => date('Y-m-d H:i:s')
        );
        $this->M_Permohonandata->prosestiket($data);
        session()->setFlashdata('pesan', $no_tiket . ' Permohonan Berhasil Di Proses!!!');
        return redirect()->to(base_url('prosespermohonan'));
    }
}
