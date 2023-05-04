<?php

namespace App\Controllers\Program;

use App\Models\DetailEstimasiModel;

use App\Controllers\BaseController;

class DetailEstimasi extends BaseController
{
    protected $detailEstimasi;
    public function __construct()
    {
        $this->detailEstimasi = new DetailEstimasiModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Detail Estimasi | Program',
            'utama' => 'Detail Estimasi',
            'detail'  => $this->detailEstimasi->getDetail()
            
        ];
        
        return view('program/detail/detailEstimasi_index', $data);
    }

    
}