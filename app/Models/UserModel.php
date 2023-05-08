<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tb_user';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['username', 'e_mail', 'password', 'role', 'id_pegawai'];

    public function getWithPegawai($id)
    {
        return $this->select('tb_user.*, tb_pegawai.nama_pegawai')
                    ->join('tb_pegawai', 'tb_pegawai.id_pegawai = tb_user.id_pegawai')
                    ->where('tb_user.id', $id)
                    ->first();
    }


}