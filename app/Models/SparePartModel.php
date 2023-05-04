<?php

namespace App\Models;

use CodeIgniter\Model;

class SparePartModel extends Model
{
    protected $table            = 'tb_spare_parts';
    protected $primaryKey       = 'id_part';
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_part', 'nama_part', 'satuan', 'harga', 'jumlah_part'];

    public function getPart()
    {
        return $this->findAll();
    }
}