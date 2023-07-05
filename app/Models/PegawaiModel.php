<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'tb_pegawai';
    protected $primaryKey       = 'id_pegawai';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
       'kode_pegawai', 'nama_pegawai', 'alamat_pegawai', 'e_mail_pegawai', 'no_telp_pegawai', 'nama_vendor'
    ];


    public function getPegawai($slug = false)
    {
        if ($slug == false) 
        {
            return $this->findAll();
        }

        return $this->where(['id_pegawai' => $slug])->first();
    }

    public function getUserByUsernameOrEmail($usernameOrEmail)
    {
        return $this->db->table('tb_pegawai')
            ->where('username', $usernameOrEmail)
            ->orWhere('email', $usernameOrEmail)
            ->get()
            ->getRowArray();
    }
    
}