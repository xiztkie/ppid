<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Cektiket extends Model
{
    protected $table = 'permohonan';

    public function getResult($where)
    {
        return $this->where($where)->findAll();
    }
}
