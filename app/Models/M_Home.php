<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Home extends Model
{
    protected $table = 'infopublik';
    protected $allowfields = ['id_int', 'informasi', 'judul', 'file_info', 'created_at'];


    public function selectinstansi()
    {
        return $this->db->table('instansi')->get()->getResultArray();
    }
    public function search($keyword)
    {
        return $this->table('infopublik')->like('judul', $keyword);
    }
}
