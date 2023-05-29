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
        $currentpage = $this->request->getVar('page_perdata') ? $this->request->getVar('page_perdata') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $perdata = $this->M_Permohonandata->search($keyword);
        } else {
            $perdata = $this->M_Permohonandata;
        }

        $data = [
            'title' => 'Permohonan data',
            'permohonandata' => $perdata->join('instansi', 'instansi.id_int = permohonan.id_int')
                ->table('instansi')
                ->orderBy('id_pemohon', 'DESC')
                ->paginate(10, 'permohonan'),
            'pager' => $this->M_Permohonandata->pager,
            'currentpage' => $currentpage,
            'isi'   => 'admin/permohonandata'
        ];
        return view('layout/wrapper', $data);
    }

    public function indexbaru()
    {
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

        $data = [
            'title' => 'Proses Permohonan Data',
            'proses_tiket'=> $this->M_Prosespermohonan->getProses(),
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
