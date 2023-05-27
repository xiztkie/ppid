<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'isi'   => 'admin/dashboard'
        );
        return view('layout/wrapper', $data);
    }
}


