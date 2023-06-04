<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Statistik;
use App\Models\M_Dashboard;

class Admin extends BaseController
{
    public function index()
    {
        $model = new M_Statistik();
        $modelD = new M_Dashboard();

        $data = array(
            'title' => 'Dashboard',
            'dataper' => $model->permohonanData(),
            'opd' => $model->selectinstansi(),
            'infopublik' => $model->getInfopublikData(),
            'countinfopublik' => $model->countinfopublik(),
            'countpermohonan' => $model->countpermohonan(),
            'countselesai' => $model->countselesai(),
            'countbaru' => $modelD->countbaru(),
            'isi'   => 'admin/dashboard'

        );

        // Data untuk bar chart
        $data['namainstansi'] = array_column($modelD->countIdPemohonByInstansi(), 'nama_int');
        $data['jumlahpermohonan'] = array_column($modelD->countIdPemohonByInstansi(), 'count_id_pemohon');

        return view('layout/wrapper', $data);
    }
}
