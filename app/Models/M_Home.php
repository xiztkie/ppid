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

    public function getFilteredData($filters)
    {
        $query = $this->table('infopublik');

        if (isset($filters['keyword'])) {
            $query->like('judul', $filters['keyword']);
        }

        if (isset($filters['id_int'])) {
            if ($filters['id_int'] !== '') {
                $query->where('infopublik.id_int', $filters['id_int']);
            } else {
                $query->orWhere('infopublik.id_int', null);
            }
        }

        if (isset($filters['informasi'])) {
            if ($filters['informasi'] !== '') {
                $query->where('informasi', $filters['informasi']);
            } else {
                $query->orWhere('informasi', null);
            }
        }

        return $query;
    }
}
