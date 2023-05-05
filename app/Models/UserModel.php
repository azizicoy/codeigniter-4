<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tb_user';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['username', 'e_mail', 'password', 'role', 'id_pegawai'];

    public function getPegawai()
    {
        return $this->hasOne(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }


}