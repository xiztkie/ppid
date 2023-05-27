<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Laporandata extends Model
{
    protected $table = 'laporan';
    protected $allowfields = [ 'judul_lap', 'file_lap', 'created_at'];

    public function search($keyword)
    {
        return $this->table('laporan')->like('judul_lap', $keyword);
    }

    public function addlap($data)
    {
        $this->db->table('laporan')->insert($data);
    }
    public function editlap($data)
    {
        $this->db->table('laporan')
            ->where('id_lap', $data['id_lap'])
            ->update($data);
    }
    public function deletelap($data)
    {
        $this->db->table('laporan')
            ->where('id_lap', $data['id_lap'])
            ->delete($data);
    }
    public function filedata($id_lap)
    {
        return $this->db->table('laporan')
            ->select('file_lap')
            ->where('id_lap', $id_lap)
            ->get()
            ->getRowArray();
    }
}
