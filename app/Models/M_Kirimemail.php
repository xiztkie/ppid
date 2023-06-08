<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kirimemail extends Model
{
    protected $table = 'kirimemail';
    protected $primaryKey = 'id_kirim';
    protected $allowedFields = ['alamat_email', 'subject', 'lampiran', 'isi_email'];

    public function getData()
    {
        // Implement your logic here to retrieve the data
        return $this->findAll(); // Contoh: Mengambil semua data dari tabel kirimemail
    }
    
    public function search($keyword)
    {
        return $this->table('kirimemail')->like('no_tiket', $keyword)->orlike('email', $keyword);
    }
}
