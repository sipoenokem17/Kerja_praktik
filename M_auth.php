<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Auth extends Model
{

    public function getUser($username)
    {
        return $this->db->table('users')
        ->select('*')
        ->where('username', $username)
        ->get()
        ->getRowArray();
    }
}
