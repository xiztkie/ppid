<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Regulasidata extends Model
{
    protected $table = 'regulasi';
    protected $allowfields = [ 'judul_reg', 'file_reg', 'created_at'];

    public function search($keyword)
    {
        return $this->table('regulasi')->like('judul_reg', $keyword);
    }

    public function addreg($data)
    {
        $this->db->table('regulasi')->insert($data);
    }
    public function editreg($data)
    {
        $this->db->table('regulasi')
            ->where('id_reg', $data['id_reg'])
            ->update($data);
    }
    public function deletereg($data)
    {
        $this->db->table('regulasi')
            ->where('id_reg', $data['id_reg'])
            ->delete($data);
    }
    public function filedata($id_reg)
    {
        return $this->db->table('regulasi')
            ->select('file_reg')
            ->where('id_reg', $id_reg)
            ->get()
            ->getRowArray();
    }
}
