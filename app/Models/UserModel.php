<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tb_user';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['username', 'e_mail', 'password'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function login($username)
    {
     return $this->db->table('tb_user')->where(array('username' => $username))->get()->getRowArray();
    }

}