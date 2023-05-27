<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_Permohonandata;

class Permohonandata extends BaseController
{
    public function __construct()
    {
        $this->M_Permohonandata = new M_Permohonandata();
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
            'prosespermohonan' => $perbaru->join('instansi', 'instansi.id_int = permohonan.id_int')
                ->where('permohonan.status_tiket', 2) 
                ->table('instansi')
                ->orderBy('id_pemohon', 'DESC')
                ->paginate(10, 'prosespermohonan'),
            'pager' => $this->M_Permohonandata->pager,
            'currentpage' => $currentpage,
            'isi'   => 'admin/prosespermohonan'
        ];
        return view('layout/wrapper', $data);
    }

   
}
