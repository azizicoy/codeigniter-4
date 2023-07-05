<?php

namespace App\Controllers\Program;

use App\Models\MobilModel;
use App\Models\PemilikModel;

use App\Controllers\BaseController;

class Mobil extends BaseController
{
    protected $mobilModel;
    protected $pemilikModel;

    public function __construct()
    {
        helper(['url']);
        $this->mobilModel = new MobilModel();
        $this->pemilikModel = new PemilikModel();
        
    }
    public function index()
    {
        $mobil = $this->mobilModel->getMobil();
        $data = [
            'judul' => 'Mobil | Program',
            'utama' => 'Mobil',
            'mobil' =>  $mobil,
        ];
        return view('program/mobil/mobil_index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'judul' => 'Halaman Mobil | Program',
            'utama' => 'Mobil',
            'mobil' => $this->mobilModel->getMobil($slug)
        ];
        
        if (empty($data['mobil'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Mobil Tidak Ada');
        }

        return view('program/mobil/mobil_detail', $data);
    }

    public function input()
    {
        helper('form');
        // Variabel Instance pemilikModel
        $pemilik = $this->pemilikModel->getPemilik();
        
        $data = [
            'judul' => 'Halaman Input Mobil | Program',
            'utama' => 'Mobil',
            'pemilik' => $pemilik,
            'validation' => session('validation'),
        ];
        return view('program/mobil/mobil_input', $data);
    }

    public function save()
    {
        // Rules Validasi
        helper('form');
        if (!$this->validate([
        'nopol' => 
        [
            'rules' => 'required|is_unique[tb_mobil.nopol]',
            'errors' =>[
                'required' => 'Nomor Polisi harus diisi',
                'is_unique' => 'Nomor Polisi sudah terdaftar' 
            ]
        ],
        'nama_pemilik' => 
        [
            'rules' => 'required|is_unique[tb_mobil.id_pemilik]',
            'errors' =>[
                'required' => 'Nama Pemilik harus diisi',
                'is_unique' => 'Nama Pemilik sudah terdaftar' 
            ]
        ],
        'jenis_kendaraan' => 
        [
            'rules' => 'required',
            'errors' =>[
                'required' => 'Jenis Kendaraan harus diisi',
            ]
        ],
        'no_chasis' => 
        [
            'rules' => 'required|is_unique[tb_mobil.no_chasis]',
            'errors' =>[
                'required' => 'Nomor Chasis harus diisi', 
                'is_unique' => 'Nomor Chasis sudah terdaftar'
            ]
        ],
        'no_mesin' => 
        [
            'rules' => 'required|is_unique[tb_mobil.no_mesin]',
            'errors' =>[
                'required' => 'Nomor Mesin harus diisi', 
                'is_unique' => 'Nomor Mesin sudah terdaftar'  
            ]
        ],
        'warna' => 
        [
            'rules' => 'required',
            'errors' =>[
                'required' => 'Warna harus diisi'
                        ]
            ],
        'model' => 
        [
            'rules' => 'required',
            'errors' =>[
                'required' => 'Model harus diisi'
                ]
        ],
        'merk' => 
        [
            'rules' => 'required',
            'errors' =>[
                'required' => 'Merk harus diisi'
                ]
        ],
        ]))
        {
            return redirect()->to('/program/mobil/input')->withInput()->with('validation', $this->validator->getErrors());
        }
        
        // Insert Data
        $mo = $this->mobilModel->save
        ([
            'nopol' => $this->request->getVar('nopol'),
            'id_pemilik' => $this->request->getVar('nama_pemilik'),
            'jenis_kendaraan' => $this->request->getVar('jenis_kendaraan'),
            'no_chasis' => $this->request->getVar('no_chasis'),
            'no_mesin' => $this->request->getVar('no_mesin'),
            'warna' => $this->request->getVar('warna'),
            'model' => $this->request->getVar('model'),
            'merk' => $this->request->getVar('merk'),
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');

        return redirect()->to('/program/mobil/index');
    }
    public function edit($slug)
    {
        helper('form');
        $data = [
            'judul' => 'Halaman Edit Mobil | Program',
            'utama' => 'Mobil',
            'validation' => session('validation'),
            'mobil' => $this->mobilModel->getMobil($slug),
            'pemilik' => $this->pemilikModel->getPemilik()
        ];
        return view('program/mobil/mobil_edit', $data);
    }

    // =======================UPDATE==================================================
    public function update($id) 
    { 
           helper('form');
           // Rules nama
           $nopolLama = $this->mobilModel->getMobil($this->request->getVar('id_mobil'));
           if($nopolLama['nopol'] == $this->request->getVar('nopol'))
           {
               $ruleNopol = 'required';
           } else {
               $ruleNopol = 'required|is_unique[tb_mobil.nopol]';
           }
           // Rules nama
           $namaLama = $this->mobilModel->getMobil($this->request->getVar('id_mobil'));
           if($namaLama['id_pemilik'] == $this->request->getVar('id_pemilik'))
           {
               $ruleNama = 'required';
           } else {
               $ruleNama = 'required|is_unique[tb_mobil.id_pemilik]';
           }
           // Rules Chasis
           $chasisLama = $this->mobilModel->getMobil($this->request->getVar('id_mobil'));
           if($chasisLama['no_chasis'] == $this->request->getVar('no_chasis'))
           {
               $ruleChasis = 'required';
           } else {
               $ruleChasis = 'required|is_unique[tb_mobil.e_mail]';
           }
           // Rules No Mesin
           $no_mesinLama = $this->mobilModel->getMobil($this->request->getVar('id_mobil'));
           if($no_mesinLama['no_mesin'] == $this->request->getVar('no_mesin'))
           {
               $ruleNoMesin = 'required';
           } else {
               $ruleNoMesin = 'required|is_unique[tb_mobil.no_mesin]';
           }
           // Rules Validasi
           if (!$this->validate([
           'nopol' => 
           [
               'rules' => $ruleNopol,
               'errors' =>[
                   'required' => 'Nomor Polisi harus diisi',
                   'is_unique' => 'Nomor Polisi sudah terdaftar' 
               ]
           ],
           'id_pemilik' => 
           [
               'rules' => $ruleNama,
               'errors' =>[
                   'required' => 'Nama Pemilik harus diisi', 
                   'is_unique' => 'Nama Pemilik sudah terdaftar'
               ]
           ],
           'jenis_kendaraan' => 
           [
               'rules' => 'required',
               'errors' =>[
                   'required' => 'Jenis_kendaraan harus diisi'
                           ]
            ],
           'no_chasis' => 
           [
               'rules' => $ruleChasis,
               'errors' =>[
                   'required' => 'E-Mail harus diisi', 
                   'is_unique' => 'E-Mail sudah terdaftar'
               ]
           ],
           'no_mesin' => 
           [
               'rules' => $ruleNoMesin,
               'errors' =>[
                   'required' => 'Nomor Telepon harus diisi', 
                   'is_unique' => 'Nomor Telepon sudah terdaftar'  
               ]
           ],
           'warna' => 
           [
               'rules' => 'required',
               'errors' =>[
                   'required' => 'Warna harus diisi', 
               ]
           ],
           'model' => 
           [
               'rules' => 'required',
               'errors' =>[
                   'required' => 'Model harus diisi', 
               ]
           ],
           'merk' => 
           [
               'rules' => 'required',
               'errors' =>[
                   'required' => 'Merk harus diisi', 
               ]
           ],
           ]))
           {
               return redirect()->to('/mobil/edit/' . $this->request->getVar('id_mobil'))->withInput()->with('validation', $this->validator->getErrors());
           }
          //  simpan data edit
          $this->mobilModel->save 
          ([
              'id_mobil'        => $id,    
              'id_pemilik'      => $this->request->getVar('id_pemilik'),
              'nopol'           => $this->request->getVar('nopol'),
              'jenis_kendaraan' => $this->request->getVar('jenis_kendaraan'),
              'no_chasis'       => $this->request->getVar('no_chasis'),
              'no_mesin'        => $this->request->getVar('no_mesin'),
              'warna'           => $this->request->getVar('warna'),
              'model'           => $this->request->getVar('model'),
              'merk'            => $this->request->getVar('merk'),
          ]);
          
          session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
  
          return redirect()->to('/program/mobil/index');
    }

    // ====================================DELETE===============================
    public function delete($id)
    {
        $this->mobilModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('/program/mobil/index');
    }
}