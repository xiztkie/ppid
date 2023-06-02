<?php

namespace App\Controllers;

use App\Models\M_Statistik;
use CodeIgniter\Controller;

class Statistik extends Controller
{
    public function index()
    {
        $model = new M_Statistik();

        $data['dataper'] = $model->permohonanData();
        $data['opd'] = $model->selectinstansi();

        return view('statistik', $data);
    }

    public function filter()
    {
        $model = new M_Statistik();
        $data['opd'] = $model->selectinstansi();

        // Mengambil nilai filter dari permintaan GET
        $namaInt = $this->request->getGet('nama_int');
        $bulan = $this->request->getGet('bulan');
        $tahun = $this->request->getGet('tahun');

        // Menggunakan filter jika ada
        if ($namaInt !== '' || $bulan !== '' || $tahun !== '') {
            $data['dataper'] = $model->permohonanDataWithFilter($namaInt, $bulan, $tahun);
        } else {
            $data['dataper'] = $model->permohonanData();
        }

        $print = $this->request->getGet('print');
        if ($print === 'true') {
            return $this->printTable($data);
        } else {

            return view('statistik', $data);
        }
    }

    public function printTable()
    {
        $model = new M_Statistik();

        // Mengambil nilai filter dari permintaan GET
        $namaInt = $this->request->getGet('nama_int');
        $bulan = $this->request->getGet('bulan');
        $tahun = $this->request->getGet('tahun');

        // Menggunakan filter jika ada
        if ($namaInt !== '' || $bulan !== '' || $tahun !== '') {
            $data['dataper'] = $model->permohonanDataWithFilter($namaInt, $bulan, $tahun);
        } else {
            $data['dataper'] = $model->permohonanData();
        }

        $tableHtml = $this->generateTableHtml($data['dataper']);
        $data['tableHtml'] = $tableHtml;

        return view('printstatistik', $data);
    }

    private function generateTableHtml($data)
    {
        $html = '<table>';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>Nama Instansi</th>';
        $html .= '<th>Permohonan Baru</th>';
        $html .= '<th>Permohonan Proses</th>';
        $html .= '<th>Permohonan Setuju</th>';
        $html .= '<th>Permohonan Tolak</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';

        foreach ($data as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row->nama_int . '</td>';
            $html .= '<td>' . $row->permohonanbaru . '</td>';
            $html .= '<td>' . $row->permohonanproses . '</td>';
            $html .= '<td>' . $row->permohonansetuju . '</td>';
            $html .= '<td>' . $row->permohonantolak . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }
}
