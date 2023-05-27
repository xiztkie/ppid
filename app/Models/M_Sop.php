<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Sop extends Model
{
    protected $table = 'sop';
    protected $allowfields = [ 'judul_sop', 'file_sop', 'created_at'];

    public function search($keyword)
    {
        return $this->table('sop')->like('judul_sop', $keyword);
    }

    public function addsop($data)
    {
        $this->db->table('sop')->insert($data);
    }
    public function editsop($data)
    {
        $this->db->table('sop')
            ->where('id_sop', $data['id_sop'])
            ->update($data);
    }
    public function deletesop($data)
    {
        $this->db->table('sop')
            ->where('id_sop', $data['id_sop'])
            ->delete($data);
    }
    public function filedata($id_sop)
    {
        return $this->db->table('sop')
            ->select('file_sop')
            ->where('id_sop', $id_sop)
            ->get()
            ->getRowArray();
    }
}
