<?php

namespace App\Controllers;

use App\Models\M_Home;
use App\Models\M_Laporandata;
use App\Models\M_Regulasidata;

class Home extends BaseController
{
   public function __construct()
   {
      $this->M_Home = new M_Home();
      $this->M_Regulasidata = new M_Regulasidata();
      $this->M_Laporandata = new M_Laporandata();
   }
   public function index()
   {
      $currentpage = $this->request->getVar('page_infopublik') ? $this->request->getVar('page_infopublik') : 1;
      $keyword = $this->request->getVar('keyword');
      if ($keyword) {
         $infopublik = $this->M_Home->search($keyword);
      } else {
         $infopublik = $this->M_Home;
      }

      $data = [
         'title' => 'Infopublik',
         'opd' => $this->M_Home->selectinstansi(),
         'infopublik' => $infopublik->orderBy('id_info', 'DESC')->paginate(10, 'infopublik'),
         'pager' => $this->M_Home->pager,
         'currentpage' => $currentpage,
         'isi'   => 'admin/infopublik'
      ];
      return view('home', $data);
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
      $currentpage = $this->request->getVar('page_reg') ? $this->request->getVar('page_reg') : 1;
      $keyword = $this->request->getVar('keyword');
      if ($keyword) {
         $reg = $this->M_Regulasidata->search($keyword);
      } else {
         $reg = $this->M_Regulasidata;
      }

      $data = [
         'title' => 'Regulasi Data',
         'regulasidata' => $reg->orderBy('id_reg', 'DESC')->paginate(10, 'regulasidata'),
         'pager' => $this->M_Regulasidata->pager,
         'currentpage' => $currentpage,
         'isi'   => 'admin/regulasidata'
      ];
      return view('regulasi',$data);
   }
   public function laporan()
   {
      $currentpage = $this->request->getVar('page_lap') ? $this->request->getVar('page_lap') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $lap = $this->M_Laporandata->search($keyword);
        } else {
            $lap= $this->M_Laporandata;
        }

        $data = [
            'title' => 'Laporan Data',
            'laporandata' => $lap->orderBy('id_lap', 'DESC')->paginate(10, 'laporandata'),
            'pager' => $this->M_Laporandata->pager,
            'currentpage' => $currentpage,
            'isi'   => 'admin/laporandata'
        ];
      return view('laporan',$data);
   }
}
