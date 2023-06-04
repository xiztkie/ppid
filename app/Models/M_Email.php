<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Email extends Model
{
    protected $table = 'email';
    protected $primaryKey = 'id_email';
    protected $returnType = 'array';
    protected $allowedFields = ['smtp_host', 'smtp_user', 'smtp_pass', 'smtp_port', 'smtp_crypto'];

    public function editemail($data)
    {
        return $this->update($data['id_email'], $data);
    }

}
