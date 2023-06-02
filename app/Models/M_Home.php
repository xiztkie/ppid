<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Home extends Model
{
    protected $table = 'infopublik';
    protected $primaryKey = 'id_info';
    protected $allowedFields = ['id_int', 'informasi', 'judul', 'file_info', 'counter', 'created_at'];

    public function incrementCounter($id_info)
    {
        $this->where('id_info', $id_info)
            ->set('counter', 'counter + 1', false)
            ->update();
    }

    public function selectinstansi()
    {
        return $this->db->table('instansi')->get()->getResultArray();
    }
    public function search($keyword)
    {
        return $this->table('infopublik')->like('judul', $keyword);
    }
}
