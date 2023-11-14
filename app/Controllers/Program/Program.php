<?php

namespace App\Controllers\Program;

use App\Controllers\BaseController;
use App\Models\MobilModel;
use App\Models\PegawaiModel;
use App\Models\SparePartModel;
use App\Models\ServisModel;
use App\Models\EstimasiModel;
use App\Models\PemilikModel;
use App\Models\DetailEstimasiModel;
use App\Models\PenjadwalanModel;

class Program extends BaseController
{
    protected $pemilikModel;
    protected $estimasiModel;
    protected $sparePartModel;
    protected $pegawaiModel;
    protected $mobilModel;
    protected $servisModel;
    protected $detailEstimasiModel;
    protected $penjadwalanModel;

    public function __construct()
    {
        $this->estimasiModel = new EstimasiModel();
        $this->sparePartModel = new SparePartModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->mobilModel = new mobilModel();
        $this->servisModel = new ServisModel();
        $this->pemilikModel = new PemilikModel();
        $this->detailEstimasiModel = new DetailEstimasiModel();
        $this->penjadwalanModel = new PenjadwalanModel();
    }
    
    public function index()
    {
        $penjadwalanData = $this->penjadwalanModel->findAll();

        // Mengurutkan penjadwalan berdasarkan tanggal selesai secara ascending (earliest due date)
        usort($penjadwalanData, function ($a, $b) {
            return strtotime($a['tgl_penyerahan']) - strtotime($b['tgl_penyerahan']);
        });

        $events = [];
        foreach ($penjadwalanData as $data) {
            $event = [
                'id' => $data['id_penjadwalan'],
                'content' => $data['kode_penjadwalan'],
                'start' => date('Y-m-d H:i:s', strtotime($data['tgl_dimulai'])),
                'end' => date('Y-m-d H:i:s', strtotime($data['tgl_penyerahan'])),
            ];
            $events[] = $event;
        }
    
        $data = [
            'judul'         => 'Halaman Utama | Program',
            'estimasi'      => $this->estimasiModel->countAllResults(),
            'mobil'         => $this->mobilModel->countAllResults(),
            'penjadwalan'   => $this->penjadwalanModel->countAllResults(),
            'edd'           => $this->penjadwalanModel->getEarliestDueDate(),
            'events'        => $events
        ];
    
        return view('program/index', $data);
    }
    

    
}