<?php

namespace App\Models;

use CodeIgniter\Model;

class PemilikModel extends Model
{
    protected $table            = 'tb_pemilik';
    protected $primaryKey       = 'id_pemilik';
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_pemilik', 'e_mail', 'no_telp', 'alamat'];

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

    public function getPemilik($id = false)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_pemilik');
        if ($id == false) 
        {
            return $builder->get()->getResultArray();
        }

        return $this->where(['id_pemilik' => $id])->first();
    }
    public function searchPemilik($keyword)
    {
        return $this->like('nama_pemilik', $keyword)->findAll();
    }
    
}