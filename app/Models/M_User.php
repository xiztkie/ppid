<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
    protected $table = 'user';

    public function selectinstansi()
    {
        return $this->db->table('instansi')->get()->getResultArray();
    }
    public function search($keyword)
    {
        return $this->table('user')->like('username', $keyword);
    }

    public function adduser($data)
    {
        $this->db->table('user')->insert($data);
    }
    public function edituser($data)
    {
        $this->db->table('user')
            ->where('id_user', $data['id_user'])
            ->update($data);
    }
    public function deleteuser($data)
    {
        $this->db->table('user')
            ->where('id_user', $data['id_user'])
            ->delete($data);
    }
}
