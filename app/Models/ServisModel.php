<?php

namespace App\Models;

use CodeIgniter\Model;

class ServisModel extends Model
{
    protected $table            = 'tb_jenis_servis';
    protected $primaryKey       = 'id_jenis_servis';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jenis_servis', 'harga_jasa_servis'];

    public function getServis()
    {
        return $this->findAll();
    }
}