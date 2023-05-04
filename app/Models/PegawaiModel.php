<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'tb_pegawai';
    protected $primaryKey       = 'id_pegawai';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
       'kode_pegawai', 'nama_pegawai', 'alamat_pegawai', 'e_mail_pegawai', 'no_telp_pegawai', 'nama_vendor'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function getPegawai($slug = false)
    {
        if ($slug == false) 
        {
            return $this->findAll();
        }

        return $this->where(['id_pegawai' => $slug])->first();
    }
}