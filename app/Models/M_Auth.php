<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Auth extends Model
{
    protected $table = 'user'; 
    protected $primaryKey = 'id_user'; 
    protected $allowedFields = ['username', 'password', 'level']; 

    public function login($username, $password)
    {
        return $this->where('username', $username)
                    ->first();
    }
}