<?php

namespace App\Controllers;

use App\Models\M_Home;
use App\Models\M_Laporandata;
use App\Models\M_Regulasidata;
use App\Models\M_Sop;

class Home extends BaseController
{
   public function __construct()
   {
      $this->M_Home = new M_Home();
      $this->M_Regulasidata = new M_Regulasidata();
      $this->M_Laporandata = new M_Laporandata();
      $this->M_Sop = new M_Sop();
   }
   public function index()
   {
      $currentpage = $this->request->getVar('page_infopublik') ? $this->request->getVar('page_infopublik') : 1;
      $keyword = $this->request->getVar('keyword');
      $dataInstansi = $this->request->getVar('id_int');
      $dataType = $this->request->getVar('informasi');

      // Apply filters
      $filters = [
         'keyword' => $keyword,
         'id_int' => $dataInstansi,
         'informasi' => $dataType
      ];

      // Get filtered infopublik data
      $infopublik = $this->M_Home->getFilteredData($filters);

      $data = [
         'title' => 'Infopublik',
         'opd' => $this->M_Home->selectinstansi(),
         'infopublik' => $infopublik->join('instansi', 'instansi.id_int = infopublik.id_int')->orderBy('id_info', 'DESC')->paginate(10, 'infopublik'),
         'pager' => $this->M_Home->pager,
         'currentpage' => $currentpage,
         'isi'   => 'admin/infopublik'
      ];
      return view('home', $data);
   }

   public function download($id_info)
   {
      $model = new M_Home();

      // Increase the counter value
      $model->incrementCounter($id_info);

      // Get file information based on ID
      $fileInfo = $model->find($id_info);

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

   public function tentang()
   {
      return view('tentang');
   }
   public function tugas()
   {
      return view('tugas');
   }
   public function struktur()
   {
      return view('struktur');
   }
   public function kontak()
   {
      return view('kontak');
   }
   public function regulasi()
   {
      $regulasidata = $this->M_Regulasidata->orderBy('id_reg', 'DESC')->findAll();
      $sopdata = $this->M_Sop->orderBy('id_sop', 'DESC')->findAll();

      $data = [
         'title' => 'Regulasi Data',
         'regulasidata' => $regulasidata,
         'sopdata' => $sopdata,
         'isi' => 'admin/regulasidata'
      ];

      return view('regulasi', $data);
   }
   public function laporan()
   {
      $currentpage = $this->request->getVar('page_lap') ? $this->request->getVar('page_lap') : 1;
      $keyword = $this->request->getVar('keyword');
      if ($keyword) {
         $lap = $this->M_Laporandata->search($keyword);
      } else {
         $lap = $this->M_Laporandata;
      }

      $data = [
         'title' => 'Laporan Data',
         'laporandata' => $lap->orderBy('id_lap', 'DESC')->paginate(10, 'laporandata'),
         'pager' => $this->M_Laporandata->pager,
         'currentpage' => $currentpage,
         'isi'   => 'admin/laporandata'
      ];
      return view('laporan', $data);
   }
}
