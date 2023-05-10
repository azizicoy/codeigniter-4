<?php

namespace App\Models;

use CodeIgniter\Model;

class EstimasiModel extends Model
{
    protected $table            = 'tb_estimasi_perbaikan';
    protected $primaryKey       = 'id_estimasi';
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['id_mobil', 'id_pemilik', 'id_pegawai', 'kode_estimasi', 'tgl_estimasi', 'keluhan', 'estimasi_biaya'];

    public function getEstimasi($slug = false)
    {
        $query = $this->select()
        ->join('tb_pegawai', 'tb_pegawai.id_pegawai = tb_estimasi_perbaikan.id_pegawai')
        ->join('tb_mobil', 'tb_mobil.id_mobil = tb_estimasi_perbaikan.id_mobil')
        ->join('tb_pemilik', 'tb_pemilik.id_pemilik = tb_estimasi_perbaikan.id_pemilik');

            if ($slug == false) 
        {
            return $query->findAll();
        }

        return $this->where(['id_estimasi' => $slug])->first();
    }
}