<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tb_user';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['username', 'e_mail', 'password', 'role'];

    public function getLogin($username, $password)
    {
        return $this->db->table('tb_user')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }


}