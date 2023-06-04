<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Statistik extends Model
{
    protected $table = 'permohonan';

    public function permohonanData()
    {
        $sql = "SELECT
        instansi.nama_int,
        COUNT(permohonan.id_pemohon) AS totalpermohonan,
        SUM(CASE WHEN permohonan.status_tiket = 1 THEN 1 ELSE 0 END) AS permohonanbaru,
        SUM(CASE WHEN permohonan.status_tiket = 2 AND (permohonan.solved IS NULL OR permohonan.solved = 0) THEN 1 ELSE 0 END) AS permohonanproses,
        SUM(CASE WHEN permohonan.solved = 1 AND permohonan.status_tiket <> 2 THEN 1 ELSE 0 END) AS permohonansetuju,
        SUM(CASE WHEN (permohonan.status_tiket = 3 OR permohonan.status_tiket = 2) AND prosestiket.status_pro = 'Ditolak' THEN 1 ELSE 0 END) AS permohonantolak
    FROM
        instansi
    LEFT JOIN
        permohonan ON instansi.id_int = permohonan.id_int
    LEFT JOIN
        prosestiket ON permohonan.id_pemohon = prosestiket.id_pemohon
    GROUP BY
        instansi.nama_int";

        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function permohonanDataWithFilter($namaInt, $bulan, $tahun)
    {
        $builder = $this->db->table('instansi');
        $builder->select('instansi.nama_int,
        COUNT(permohonan.id_pemohon) AS totalpermohonan,
        SUM(CASE WHEN permohonan.status_tiket = 1 THEN 1 ELSE 0 END) AS permohonanbaru,
        SUM(CASE WHEN permohonan.status_tiket = 2 AND (permohonan.solved IS NULL OR permohonan.solved = 0) THEN 1 ELSE 0 END) AS permohonanproses,
        SUM(CASE WHEN permohonan.solved = 1 OR permohonan.status_tiket = 2 THEN 1 ELSE 0 END) AS permohonansetuju,
        SUM(CASE WHEN (permohonan.status_tiket = 3 OR permohonan.status_tiket = 2) AND prosestiket.status_pro = \'Ditolak\' THEN 1 ELSE 0 END) AS permohonantolak');
        $builder->join('permohonan', 'instansi.id_int = permohonan.id_int', 'left');
        $builder->join('prosestiket', 'permohonan.id_pemohon = prosestiket.id_pemohon', 'left');

        if ($namaInt) {
            $builder->where('instansi.nama_int', $namaInt);
        }
        if ($bulan) {
            $builder->where('MONTH(permohonan.created_at)', $bulan);
        }
        if ($tahun) {
            $builder->where('YEAR(permohonan.created_at)', $tahun);
        }

        $builder->groupBy('instansi.nama_int');
        $query = $builder->get();

        return $query->getResult();
    }

    public function selectinstansi()
    {
        return $this->db->table('instansi')->get()->getResultArray();
    }

    public function getInfopublikData()
    {
        $sql = "SELECT infopublik.*, instansi.nama_int
        FROM infopublik
        JOIN instansi ON infopublik.id_int = instansi.id_int
        ORDER BY infopublik.counter DESC";

        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function countinfopublik()
    {
        return $this->db->table('infopublik')->countAllResults();
    }

    public function countpermohonan()
    {
        return $this->db->table('permohonan')->countAllResults();
    }

    public function countselesai()
    {
        return $this->db->table('permohonan')->where('solved', 2)->countAllResults();
    }

    public function countdownload()
    {
        $result = $this->db->table('infopublik')->selectSum('counter')->get()->getRow();
        return $result->counter;
    }
}
