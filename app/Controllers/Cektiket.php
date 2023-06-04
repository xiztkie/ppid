<?php

namespace App\Controllers;

use App\Models\M_Cektiket;
use App\Models\M_Prosespermohonan;

class Cektiket extends BaseController
{
    protected $M_Cektiket;

    public function __construct()
    {
        $this->M_Cektiket = new M_Cektiket();
        $this->M_Prosespermohonan = new M_Prosespermohonan();
    }

    public function index()
    {
        $no_tiket = $this->request->getPost('no_tiket');
        $kontak = $this->request->getPost('kontak');

        if (empty($no_tiket) || empty($kontak)) {
            $errorMessage = "
            <div class='alert alert-info alert-dismissible fade show mb-0' role='alert'>
                <i class='mdi mdi-alert-circle-outline me-2'></i>
                <b>Silahkan masukan tiket dan nomor kontak anda</b>
            </div>";
            return view('cektiket', ['errorMessage' => $errorMessage]);
        }

        $data = $this->M_Cektiket->getResult(['no_tiket' => $no_tiket, 'kontak' => $kontak]);

        if (empty($data)) {
            $errorMessage = "Data tidak ditemukan.";
            return view('cektiket', ['errorMessage' => $errorMessage]);
        } else {
            $data1 = [
                'proses_tiket'=> $this->M_Prosespermohonan->getProsestiket(),
                'data' => $data
            ];
            return view('hasil', $data1 );
        }
    }

    public function progresstiket()
    {
        $no_tiket = $this->request->getPost('no_tiket');
        $kontak = $this->request->getPost('kontak');

        if (empty($no_tiket) || empty($kontak)) {
            $errorMessage = "
        <div class='alert alert-info alert-dismissible fade show mb-0' role='alert'>
            <i class='mdi mdi-alert-circle-outline me-2'></i>
            <b>Silahkan masukan tiket dan nomor kontak anda</b>
        </div>";

            $data1 = [
                'title' => 'Cek Progress',
                'isi'   => 'admin/cekprogress',
                'errorMessage' => $errorMessage
            ];
            return view('layout/wrapper', $data1);
        }

        $data = $this->M_Cektiket->getResult(['no_tiket' => $no_tiket, 'kontak' => $kontak]);

        if (empty($data)) {
            $errorMessage = "Data tidak ditemukan.";
            $data1 = [
                'title' => 'Cek Progress',
                'isi'   => 'admin/cekprogress',
                'errorMessage' => $errorMessage
            ];
            return view('layout/wrapper', $data1);
        } else {
            $data1 = [
                'title' => 'Cek Progress',
                'isi'   => 'admin/hasilcek',
                'proses_tiket'=> $this->M_Prosespermohonan->getProsestiket(),
                'data' => $data
            ];
            return view('layout/wrapper', $data1);
        }
    }
}
