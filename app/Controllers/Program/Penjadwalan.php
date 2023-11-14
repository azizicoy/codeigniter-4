<?php

namespace App\Controllers\Program;

use App\Models\PenjadwalanModel;
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
    // ===========================DETAIL============================================
    public function detail($slug)
    {
        $data = [
            'judul' => 'Halaman Penjadwalan | Program',
            'utama' => 'Penjadwalan',
            'penjadwalan' => $this->penjadwalanModel->getPenjadwalan($slug)
        ];
        
        if (empty($data['penjadwalan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Penjadwalan Tidak Ada');
        }

        return view('program/penjadwalan/penjadwalan_detail', $data);
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
             'rules' => 'required|is_unique[tb_penjadwalan.kode_penjadwalan]',
             'errors' =>[
                 'required' => 'Kode Estimasi diisi',
                 'is_unique' => 'Kode Estimasi sudah terdaftar' 
             ]
         ],
         'tgl_dimulai' => 
         [
             'rules' => 'required',
             'errors' =>[
                 'required' => 'Tanggal harus diisi'
             ]
         ],
         'tgl_penyerahan' => 
         [
             'rules' => 'required',
             'errors' =>[
                 'required' => 'Tanggal penyerahan harus diisi'
                         ]
         ]
         ]))
         {
             return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
         }
 
         // Insert Data
         $data = $this->penjadwalanModel->save([
            'id_estimasi'       => $this->request->getVar('id_estimasi'),
            'kode_penjadwalan'  => $this->request->getVar('kode_penjadwalan'),
            'tgl_dimulai'       => $this->request->getVar('tgl_dimulai'),
            'tgl_penyerahan'    => $this->request->getVar('tgl_penyerahan'),
            'status'            => $this->request->getVar('status'),
         ]);
        //  dd($data);
         
         session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
 
         return redirect()->to('/program/penjadwalan/index');
     }
    
    // =======================================EDIT=============================================
    public function edit($id)
    {
        helper('form');
        $data = [
            'judul' => 'Halaman Edit Penjadwalan | Program',
            'utama' => 'Penjadwalan',
            'validation' => session('validation'),
            'penjadwalan' => $this->penjadwalanModel->getPenjadwalan($id),
            'estimasi' => $this->estimasiModel->getEstimasi()
        ];
        return view('program/penjadwalan/penjadwalan_edit', $data);
    }
    
      // =======================UPDATE==================================================
      public function update($id) 
      {
           
           helper('form');
           // Rules nama
           $kodeLama = $this->penjadwalanModel->getPenjadwalan($this->request->getVar('id_penjadwalan'));
           if($kodeLama['kode_penjadwalan'] == $this->request->getVar('kode_penjadwalan'))
           {
               $ruleKode = 'required';
           } else {
               $ruleKode = 'required|is_unique[tb_penjadwalan.kode_penjadwalan]';
           }
           // Rules Email
           $estimasiLama = $this->penjadwalanModel->getPenjadwalan($this->request->getVar('id_penjadwalan'));
           if($estimasiLama['id_estimasi'] == $this->request->getVar('id_estimasi'))
           {
               $ruleEstimasi = 'required';
           } else {
               $ruleEstimasi = 'required|is_unique[tb_penjadwalan.id_estimasi]';
           }
           // Rules Validasi
           if (!$this->validate([
            'id_estimasi' => 
            [
                'rules' => $ruleEstimasi,
                'errors' =>[
                    'required' => 'Kode Estimasi harus diisi',
                    'is_unique' => 'Kode Estimasi sudah terdaftar' 
                ]
            ],
            'kode_penjadwalan' => 
            [
                'rules' => $ruleKode,
                'errors' =>[
                    'required' => 'Kode Penjadwalan diisi',
                    'is_unique' => 'Kode Penjadwalan sudah terdaftar' 
                ]
            ],
            'tgl_dimulai' => 
            [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Tanggal harus diisi'
                ]
            ],
            'tgl_penyerahan' => 
            [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Tanggal penyerahan harus diisi'
                            ]
            ]
            ]))
           {
               return redirect()->to('/penjadwalan/edit/' . $this->request->getVar('id_penjadwalan'))->withInput()->with('validation', $this->validator->getErrors());
           }
          //  simpan data edit
          $this->penjadwalanModel->save 
          ([
              'id_penjadwalan'      => $id,    
              'id_estimasi'         => $this->request->getVar('id_estimasi'),
              'kode_penjadwalan'    => $this->request->getVar('kode_penjadwalan'),
              'tgl_dimulai'         => $this->request->getVar('tgl_dimulai'),
              'tgl_penyerahan'      => $this->request->getVar('tgl_penyerahan'),
              'status'              => $this->request->getVar('status'),
          ]);
          
          session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
  
          return redirect()->to('/program/penjadwalan/index');
      }
      
    //   ================================Ubah Status====================================
    public function updateStatus($idPenjadwalan)
    {
        $status = $this->request->getPost('status');

        // Lakukan validasi status jika diperlukan

        $data = [
            'status' => $status
        ];

        $this->penjadwalanModel->update($idPenjadwalan, $data);

        return redirect()->to('/penjadwalan')->with('pesan', 'Status penjadwalan berhasil diperbarui.');
    }

    // ====================================DELETE===============================
    public function delete($id)
    {
        $this->penjadwalanModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('/program/penjadwalan/index');
    }
}