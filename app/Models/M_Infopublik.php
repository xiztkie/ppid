<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Infopublik extends Model
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

    public function addinfopublik($data)
    {
        $this->db->table('infopublik')->insert($data);
    }
    public function editinfopublik($data)
    {
        $this->db->table('infopublik')
            ->where('id_info', $data['id_info'])
            ->update($data);
    }
    public function deleteinfopublik($data)
    {
        $this->db->table('infopublik')
            ->where('id_info', $data['id_info'])
            ->delete($data);
    }
    public function filedata($id_info)
    {
        return $this->db->table('infopublik')
            ->select('file_info')
            ->where('id_info', $id_info)
            ->get()
            ->getRowArray();
    }
}
