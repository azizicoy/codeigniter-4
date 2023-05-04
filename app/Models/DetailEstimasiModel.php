<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailEstimasiModel extends Model
{
    protected $table            = 'tb_detail_estimasi';
    protected $primaryKey       = 'id_detail_estimasi';
    protected $allowedFields    = ['nama_pemilik', 'e_mail', 'no_telp', 'alamat'];

    public function getDetail($id = false)
    {
        $query = $this->select()
        ->join('tb_estimasi_perbaikan', 'tb_estimasi_perbaikan.id_estimasi = tb_detail_estimasi.id_estimasi')
        ->join('tb_jenis_servis', 'tb_jenis_servis.id_jenis_servis = tb_detail_estimasi.id_jenis_servis')
        ->join('tb_spare_parts', 'tb_spare_parts.id_part = tb_detail_estimasi.id_part');       
         if ($id == false) 
        {
            return $query->get()->getResultArray();
        }

        return $this->where(['id_detail_estimasi' => $id])->first();
    }
    
}