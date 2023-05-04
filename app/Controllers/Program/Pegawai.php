<?php

namespace App\Controllers\Program;

use App\Models\PegawaiModel;

use App\Controllers\BaseController;

class Pegawai extends BaseController
{
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
        helper('form');
    }
    public function index()
    {
        $data = [
            'judul' => 'Pegawai | Program', 
            'utama' => 'Pegawai',
            'pegawai' => $this->pegawaiModel->getPegawai()
        ];
        
        return view('program/pegawai/pegawai_index', $data);
    }
    public function detail($slug)
    {
        $data = [
            'judul' => 'Halaman Pegawai | Program',
            'utama' => 'Pegawai',
            'pegawai' => $this->pegawaiModel->getPegawai($slug)
        ];
        
        if (empty($data['pegawai'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Pegawai Tidak Ada');
        }

        return view('program/pegawai/pegawai_detail', $data);
    }
    public function input()
    {
        session();
        $data = [
            'judul' => 'Halaman Input Pegawai | Program',
            'utama' => 'Pegawai',
            'validation' => session('validation'),
        ];
        return view('program/pegawai/pegawai_input', $data);
    }
    // Fungsi Simpan data Pegawai
    public function save()
    {
        // Rules Validasi
        helper('form');
        if (!$this->validate([
        'kode_pegawai' => 
        [
            'rules' => 'required|is_unique[tb_pegawai.kode_pegawai]',
            'errors' =>[
                'required' => 'Kode Pegawai harus diisi',
                'is_unique' => 'Kode Pegawai sudah terdaftar' 
            ]
        ],
        'nama_pegawai' => 
        [
            'rules' => 'required|is_unique[tb_pegawai.nama_pegawai]',
            'errors' =>[
                'required' => 'Nama Pegawai harus diisi',
                'is_unique' => 'Nama Pegawai sudah terdaftar' 
            ]
        ],
        'nama_vendor' => 
        [
            'rules' => 'required',
            'errors' =>[
                'required' => 'Vendor harus diisi'
            ]
        ],
        'e_mail_pegawai' => 
        [
            'rules' => 'required|is_unique[tb_pegawai.e_mail_pegawai]',
            'errors' =>[
                'required' => 'E-Mail harus diisi', 
                'is_unique' => 'E-Mail sudah terdaftar'  
            ]
        ],
        'no_telp_pegawai' => 
        [
            'rules' => 'required|is_unique[tb_pegawai.no_telp_pegawai]',
            'errors' =>[
                'required' => 'Nomor Telepon harus diisi', 
                'is_unique' => 'Nomor Telepon sudah terdaftar'  
            ]
        ],
        'alamat_pegawai' => 
        [
            'rules' => 'required',
            'errors' =>[
                'required' => 'Alamat Pegawai harus diisi'
                        ]
        ]
        ]))
        {
            return redirect()->to('/program/pegawai/input')->withInput()->with('validation', $this->validator->getErrors());
        }

        // Insert Data
        $this->pegawaiModel->save
        ([
            'kode_pegawai' => $this->request->getVar('kode_pegawai'),
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'e_mail_pegawai' => $this->request->getVar('e_mail_pegawai'),
            'no_telp_pegawai' => $this->request->getVar('no_telp_pegawai'),
            'alamat_pegawai' => $this->request->getVar('alamat_pegawai'),
            'nama_vendor' => $this->request->getVar('nama_vendor'),
        ]);
        
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');

        return redirect()->to('/program/pegawai/index');
    }

    // Edit Data
    public function edit($slug)
    {
        helper('form');
        $data = [
            'judul' => 'Halaman Edit Pegawai | Program',
            'utama' => 'Pegawai',
            'validation' => session('validation'),
            'pegawai' => $this->pegawaiModel->getPegawai($slug)
        ];
        return view('program/pegawai/pegawai_edit', $data);
    }
   

}