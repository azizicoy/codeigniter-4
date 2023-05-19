<?php

namespace App\Controllers\Program;

use App\Models\PemilikModel;
use App\Models\ServisModel;
use CodeIgniter\Validation\Validation;

use App\Controllers\BaseController;
use Tests\Support\Libraries\ConfigReader;

class Pemilik extends BaseController
{
    protected $pemilikModel;
    protected $servisModel;
    
    public function __construct()
    {
        $this->pemilikModel = new PemilikModel();
        $this->servisModel = new ServisModel();
        helper('form');
    }
    public function index()
    {
        $data = [
            'judul' => 'Halaman Pemilik | Program',
            'utama' => 'Pemilik',
            'pemilik' => $this->pemilikModel->getPemilik()
        ];

        return view('program/pemilik/pemilik_index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'judul' => 'Halaman Pemilik | Program',
            'utama' => 'Pemilik',
            'pemilik' => $this->pemilikModel->getPemilik($slug)
        ];
        
        if (empty($data['pemilik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pemilik Tidak Ada');
        }

        return view('program/pemilik/pemilik_detail', $data);
    }

    // =================================INPUT=======================================
    public function input()
    {
        helper('form');
        $data = [
            'judul' => 'Halaman Input Pemilik | Program',
            'utama' => 'Pemilik',
            'validation' => session('validation')
        ];
        return view('program/pemilik/pemilik_input', $data);
    }
    // =====================================SAVE===========================================
    public function save()
    {
        // Rules Validasi
        helper('form');
        if (!$this->validate([
        'nama_pemilik' => 
        [
            'rules' => 'required|is_unique[tb_pemilik.nama_pemilik]',
            'errors' =>[
                'required' => 'Nama Pemilik harus diisi',
                'is_unique' => 'Nama Pemilik sudah terdaftar' 
            ]
        ],
        'e_mail' => 
        [
            'rules' => 'required|is_unique[tb_pemilik.e_mail]',
            'errors' =>[
                'required' => 'E-Mail harus diisi', 
                'is_unique' => 'E-Mail sudah terdaftar'
            ]
        ],
        'no_telp' => 
        [
            'rules' => 'required|is_unique[tb_pemilik.no_telp]',
            'errors' =>[
                'required' => 'Nomor Telepon harus diisi', 
                'is_unique' => 'Nomor Telepon sudah terdaftar'  
            ]
        ],
        'alamat' => 
        [
            'rules' => 'required',
            'errors' =>[
                'required' => 'Alamat harus diisi'
                        ]
        ]
        ]))
        {
            return redirect()->to('/program/pemilik/input')->withInput()->with('validation', $this->validator->getErrors());
        }

        // Insert Data
        $this->pemilikModel->save
        ([
            'nama_pemilik' => $this->request->getVar('nama_pemilik'),
            'e_mail' => $this->request->getVar('e_mail'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');

        return redirect()->to('/program/pemilik/index');
    }
    // =======================================EDIT=============================================
    public function edit($id)
    {
        helper('form');
        $data = [
            'judul' => 'Halaman Edit Pemilik | Program',
            'utama' => 'Pemilik',
            'validation' => session('validation'),
            'pemilik' => $this->pemilikModel->getPemilik($id)
        ];
        return view('program/pemilik/pemilik_edit', $data);
    }
    // =======================UPDATE==================================================
    public function update($id) 
    {
         
         helper('form');
         // Rules nama
         $namaLama = $this->pemilikModel->getPemilik($this->request->getVar('id_pemilik'));
         if($namaLama['nama_pemilik'] == $this->request->getVar('nama_pemilik'))
         {
             $ruleNama = 'required';
         } else {
             $ruleNama = 'required|is_unique[tb_pemilik.nama_pemilik]';
         }
         // Rules Email
         $emailLama = $this->pemilikModel->getPemilik($this->request->getVar('id_pemilik'));
         if($emailLama['e_mail'] == $this->request->getVar('e_mail'))
         {
             $ruleEmail = 'required';
         } else {
             $ruleEmail = 'required|is_unique[tb_pemilik.e_mail]';
         }
         // Rules NoTelp
         $no_telpLama = $this->pemilikModel->getPemilik($this->request->getVar('id_pemilik'));
         if($no_telpLama['no_telp'] == $this->request->getVar('no_telp'))
         {
             $ruleNoTelp = 'required';
         } else {
             $ruleNoTelp = 'required|is_unique[tb_pemilik.no_telp]';
         }
         // Rules Validasi
         if (!$this->validate([
         'nama_pemilik' => 
         [
             'rules' => $ruleNama,
             'errors' =>[
                 'required' => 'Nama Pemilik harus diisi',
                 'is_unique' => 'Nama Pemilik sudah terdaftar' 
             ]
         ],
         'e_mail' => 
         [
             'rules' => $ruleEmail,
             'errors' =>[
                 'required' => 'E-Mail harus diisi', 
                 'is_unique' => 'E-Mail sudah terdaftar'
             ]
         ],
         'no_telp' => 
         [
             'rules' => $ruleNoTelp,
             'errors' =>[
                 'required' => 'Nomor Telepon harus diisi', 
                 'is_unique' => 'Nomor Telepon sudah terdaftar'  
             ]
         ],
         'alamat' => 
         [
             'rules' => 'required',
             'errors' =>[
                 'required' => 'Alamat harus diisi'
                         ]
         ]
         ]))
         {
             return redirect()->to('/pemilik/edit/' . $this->request->getVar('id_pemilik'))->withInput()->with('validation', $this->validator->getErrors());
         }
        //  simpan data edit
        $this->pemilikModel->save 
        ([
            'id_pemilik' => $id,    
            'nama_pemilik' => $this->request->getVar('nama_pemilik'),
            'e_mail' => $this->request->getVar('e_mail'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');

        return redirect()->to('/program/pemilik/index');
    }

    // ====================================DELETE===============================
    public function delete($id)
    {
        $this->pemilikModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('/program/pemilik/index');
    }

    
}