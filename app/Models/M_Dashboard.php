<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Dashboard extends Model
{
    protected $table ='permohonan';

    public function countbaru()
    {
        return $this->db->table('permohonan')->where('status_tiket', 1)->countAllResults();
    }
    
    public function countIdPemohonByInstansi()
    {
        $builder = $this->db->table('instansi');
        $builder->select('instansi.nama_int, COUNT(permohonan.id_pemohon) AS count_id_pemohon');
        $builder->join('permohonan', 'instansi.id_int = permohonan.id_int', 'left');
        $builder->groupBy('instansi.nama_int');
        $query = $builder->get();
    
        return $query->getResult();
    }
}
