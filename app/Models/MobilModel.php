<?php

namespace App\Models;

use CodeIgniter\Model;

class MobilModel extends Model
{
    protected $table            = 'tb_mobil';
    protected $primaryKey       = 'id_mobil';
    protected $allowedFields    = ['nopol', 'id_pemilik', 'jenis_kendaraan', 'no_chasis', 'no_mesin', 'warna', 'model', 'merk'];

    public function getMobil($slug = false)
    {
        $query = $this->select()->join('tb_pemilik', 'tb_pemilik.id_pemilik = tb_mobil.id_pemilik');
        if ($slug == false) 
        {
            return $query->get()->getResultArray();
        }

        return $this->where(['id_mobil' => $slug])->first();
    }
}