<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Instansi extends Model
{
    protected $table = 'instansi';
    protected $primaryKey = 'id_int';
    protected $allowedFields = ['nama_int'];

    public function getInstansiById($id_int)
    {
        return $this->where('id_int', $id_int)->first();
    }

    public function search($keyword)
    {
        return $this->table('instansi')->like('nama_int', $keyword);
    }

    public function addinstansi($data)
    {
        $this->db->table('instansi')->insert($data);
    }
    public function editinstansi($data)
    {
        $this->db->table('instansi')
            ->where('id_int', $data['id_int'])
            ->update($data);
    }
    public function deleteinstansi($data)
    {
        $this->db->table('instansi')
            ->where('id_int', $data['id_int'])
            ->delete($data);
    }
}
