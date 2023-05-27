<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Permohonandata extends Model
{
    protected $table = 'permohonan';

    public function selectinstansi()
    {
        return $this->db->table('instansi')->get()->getResultArray();
    }
    public function search($keyword)
    {
        return $this->table('permohonan')->like('no_tiket', $keyword)->orlike('nama', $keyword)->orlike('kontak', $keyword);
    }
}
