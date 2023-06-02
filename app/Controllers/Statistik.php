<?php

namespace App\Controllers;
use App\Models\M_Permohonan;
use App\Models\M_Infopublik;

class Statistik extends BaseController
{
    public function __construct()
    {
        $this->M_Permohonan = new M_Permohonan();
        $this->M_Infopublik = new M_Infopublik();
        helper('date');
    }
    public function index()
    {
        
        $data = array(
            'title' => 'Statistik',
            'opd' => $this->M_Permohonan->selectinstansi(),
        );
        return view('statistik', $data);
    }
}
