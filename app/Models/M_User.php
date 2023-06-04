<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'level', 'id_int'];

    public function adduser($data)
    {
        return $this->insert($data);
    }

    public function edituser($data)
    {
        return $this->update($data['id_user'], $data);
    }

    public function deleteuser($data)
    {
        return $this->delete($data);
    }

    // Mengambil data pengguna berdasarkan ID pengguna
    public function getUserById($id_user)
    {
        return $this->where('id_user', $id_user)->first();
    }

    // Cari pengguna berdasarkan keyword
    public function search($keyword)
    {
        return $this->like('username', $keyword);
    }

    // Select instansi dari tabel instansi
    public function selectinstansi()
    {
        return $this->db->table('instansi')->get()->getResultArray();
    }
}
