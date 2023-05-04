<?php

namespace App\Models;

use CodeIgniter\Model;

class SparePartModel extends Model
{
    protected $table            = 'tb_spare_parts';
    protected $primaryKey       = 'id_part';
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_part', 'nama_part', 'satuan', 'harga', 'jumlah_part'];

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

    public function getPart()
    {
        return $this->findAll();
    }
}