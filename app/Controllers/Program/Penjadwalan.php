<?php

namespace App\Controllers\Program;

use App\Models\PenjadwalanModel;
use App\Models\EstimasiModelModel;
use App\Controllers\BaseController;
use App\Models\EstimasiModel;

class Penjadwalan extends BaseController
{
    protected $penjadwalanModel;
    protected $estimasiModel;

    public function __construct()
    {
        $this->penjadwalanModel = new PenjadwalanModel();
        $this->estimasiModel = new EstimasiModel();
    }

    // ===============================Index=================================
    public function index()
    {
        $data = [
            'judul'  => 'Penjadwalan | Program',
            'utama'  => 'Penjadwalan',       
            'jadwal' => $this->penjadwalanModel->getPenjadwalan()     
        ];

        return view('program/penjadwalan/penjadwalan_index', $data);
    }

    // ===========================Input======================================
    public function input()
    {
        helper('form');
        $data = [
            'judul'         => 'Halaman Input Penjadwalan | Program',
            'utama'         => 'Penjadwalan',
            'estimasi'      => $this->estimasiModel->getEstimasi(),
            'validation'    => session('validation')
        ];
        return view('program/penjadwalan/penjadwalan_input', $data);
    }

     // =====================================SAVE===========================================
     public function save()
     {
         // Rules Validasi
         helper('form');
         if (!$this->validate([
         'id_estimasi' => 
         [
             'rules' => 'required|is_unique[tb_penjadwalan.id_estimasi]',
             'errors' =>[
                 'required' => 'Kode Estimasi harus diisi',
                 'is_unique' => 'Kode Estimasi sudah terdaftar' 
             ]
         ],
         'kode_penjadwalan' => 
         [
             'rules' => 'required',
             'errors' =>[
                 'required' => 'Tanggal harus diisi', 
             ]
         ],
         'tgl_dimulai' => 
         [
             'rules' => 'required',
             'errors' =>[
                 'required' => 'Tanggal harus diisi'
             ]
         ],
         'tgl_selesai' => 
         [
             'rules' => 'required',
             'errors' =>[
                 'required' => 'Tgl_selesai harus diisi'
                         ]
         ]
         ]))
         {
             return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
         }
 
         // Insert Data
         $data = $this->penjadwalanModel->save([
            'id_estimasi' => $this->request->getVar('id_estimasi'),
            'kode_penjadwalan' => $this->request->getVar('kode_penjadwalan'),
            'tgl_dimulai' => $this->request->getVar('tgl_dimulai'),
            'tgl_selesai' => $this->request->getVar('tgl_selesai'),
         ]);
         dd($data);
         
         session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
 
         return redirect()->to('/program/penjadwalan/index');
     }
    
}