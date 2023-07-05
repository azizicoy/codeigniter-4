<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjadwalanModel extends Model
{
    protected $table            = 'tb_penjadwalan';
    protected $primaryKey       = 'id_penjadwalan';
    protected $allowedFields    = ['id_estimasi', 'kode_penjadwalan', 'tgl_dimulai', 'tgl_selesai', 'status'];

    public function getPenjadwalan($slug = false)
    {
        $query = $this->select()->join('tb_estimasi_perbaikan', 'tb_estimasi_perbaikan.id_estimasi = tb_penjadwalan.id_estimasi')->orderBy('tgl_dimulai', 'ASC');
        if ($slug == false) 
        {
            return $query->get()->getResultArray();
        }

        return $this->where(['id_penjadwalan' => $slug])->first();
    }

    public function updateStatus($idPenjadwalan, $status)
    {
        $this->where('id_penjadwalan', $idPenjadwalan)
            ->set('status', $status)
            ->update();
    }

    public function getEarliestDueDate()
    {
        $query = $this->select('tgl_dimulai, tgl_selesai')->orderBy('tgl_dimulai', 'ASC')->first();
        return $query;
    }

    

}