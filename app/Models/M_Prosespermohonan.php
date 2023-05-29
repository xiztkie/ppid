<?php namespace App\Models;

use CodeIgniter\Model;

class M_Prosespermohonan extends Model
{
    protected $table = 'prosestiket';
    protected $primaryKey = 'id_pemohon';

    protected $returnType = 'array';
    protected $allowedFields = ['id_pemohon', 'other_columns'];

    public function getProses()
    {
        return $this
            ->join('permohonan', 'permohonan.id_pemohon = prosestiket.id_pemohon')
            ->join('instansi', 'instansi.id_int = permohonan.id_int')
            ->where('permohonan.status_tiket', 2)
            ->where('permohonan.solved', null)
            ->orderBy('prosestiket.id_pemohon', 'DESC')
            ->findAll();
    }
}