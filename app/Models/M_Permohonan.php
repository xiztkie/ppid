<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Permohonan extends Model
{
    public function selectinstansi()
    {
        return $this->db->table('instansi')->get()->getResultArray();
    }
    public function generatetiket()
    {
        helper('number');
        $date     = date('dmy');
        $rno = rand(1, 999);
        $format     = "TKT$rno$date";
        $builder = $this->db->table('permohonan');
        $builder->selectMax('id_pemohon', 'no_pemohonMax');
        $query = $builder->get();
        if ($query->getNumRows() > 0) {
            foreach ($query->getResult() as $key) {
                $kd = '';
                $ambildata = substr($key->no_pemohonMax, 1);
                $increment = intval($ambildata) + 1;
                $kd = sprintf('%03s', $increment);
            }
        } else {
            $kd = '002';
        }
        return $format . $kd;
    }
    public function kirimdata($data)
    {
        $this->db->table('permohonan')->insert($data);
    }
}
