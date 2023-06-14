<?php

namespace App\Models;

use CodeIgniter\Model;

class SparePartModel extends Model
{
    protected $table            = 'tb_spare_parts';
    protected $primaryKey       = 'id_part';
    protected $allowedFields    = ['nama_part', 'satuan', 'harga', 'jumlah_part'];

    public function getPart($slug = false)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_spare_parts');
        if ($slug == false) 
        {
            return $builder->get()->getResultArray();
        }

        return $this->where(['id_part' => $slug])->first();
    }


    public function decreaseQuantity($idPart, $jumlah)
    {
    $part = $this->find($idPart);
    $part['jumlah_part'] -= $jumlah;
    $this->update($idPart, $part);
    }

}