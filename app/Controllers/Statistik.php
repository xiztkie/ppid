<?php

namespace App\Controllers;

use App\Models\M_Statistik;
use App\Models\M_Home;
use CodeIgniter\Controller;

class Statistik extends Controller
{
    public function index()
    {
        $model = new M_Statistik();
    
        $data['dataper'] = $model->permohonanData();
        $data['opd'] = $model->selectinstansi();
        $data['infopublik'] = $model->getInfopublikData();
        $data['countinfopublik'] = $model->countinfopublik();
        $data['countpermohonan'] = $model->countpermohonan(); // Menambahkan inisialisasi variabel $countpermohonan
        $data['countselesai'] = $model->countselesai();
        $data['countdownload'] = $model->countdownload();
    
        return view('statistik', $data);
    }
    

    public function download($id_info)
    {
        $modelS = new M_Home();

        // Increase the counter value
        $modelS->incrementCounter($id_info);

        // Get file information based on ID
        $fileInfo = $modelS->find($id_info, 'id_info');

        if ($fileInfo) {
            // Get the file path to be downloaded
            $filePath = FCPATH . 'files/infopublik/' . $fileInfo['file_info'];

            // Check if the file exists
            if (file_exists($filePath)) {
                // Set HTTP headers to initiate the download
                header("Content-Type: application/octet-stream");
                header("Content-Transfer-Encoding: Binary");
                header("Content-Disposition: attachment; filename=\"" . basename($filePath) . "\"");
                header("Content-Length: " . filesize($filePath));

                // Read the file and send the content to the output
                readfile($filePath);
            } else {
                // Handle the case when the file is not found
                echo "File not found.";
            }
        } else {
            // Handle the case when the ID info is not valid
            echo "Invalid ID info.";
        }
    }

    public function filter()
    {
        $model = new M_Statistik(); // Membuat instance model
        $data['dataper'] = $model->permohonanData();
        $data['opd'] = $model->selectinstansi();
        $data['infopublik'] = $model->getInfopublikData();
        $data['countinfopublik'] = $model->countinfopublik();
        $data['countpermohonan'] = $model->countpermohonan(); // Menambahkan inisialisasi variabel $countpermohonan
        $data['countselesai'] = $model->countselesai();
        $data['countdownload'] = $model->countdownload();
        
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
