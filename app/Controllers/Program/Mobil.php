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
        helper('form');
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
        $pemilik = $this->pemilikModel->getPemilik();
        helper('form');
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
            'rules' => 'required|is_unique[tb_mobil.nama_pemilik]',
            'errors' =>[
                'required' => 'Nama Pemilik harus diisi',
                'is_unique' => 'Nama Pemilik sudah terdaftar' 
            ]
        ],
        'id_pemilik' => 
        [
            'rules' => 'required|is_unique[tb_mobil.id_pemilik]',
            'errors' =>[
                'required' => 'Id Pemilik harus diisi',
                'is_unique' => 'Id Pemilik sudah terdaftar' 
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

        // $namaPemilik = $this->request->getVar('nama_pemilik');
        // $idPemilik = $this->pemilikModel->getid
        // Insert Data
        $this->pemilikModel->save
        ([
            'nopol' => $this->request->getPost('nopol'),
            'id_pemilik' => $this->request->getPost('id_pemilik'),
            'nama_pemilik' => $this->request->getPost('nama_pemilik'),
            'jenis_kendaraan' => $this->request->getPost('jenis_kendaraan'),
            'no_chasis' => $this->request->getPost('no_chasis'),
            'no_mesin' => $this->request->getPost('no_mesin'),
            'warna' => $this->request->getPost('warna'),
            'model' => $this->request->getPost('model'),
            'merk' => $this->request->getPost('merk'),
        ]);
        
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');

        return redirect()->to('/program/mobil/index');
    }
    public function search_pemilik()
    {
        $searchTerm = $this->request->getVar('term');
    
        $pemilik = $this->pemilikModel->searchPemilik($searchTerm);
    
        $data = array();
        foreach ($pemilik as $row) {
            $data[] = $row['nama_pemilik'];
        }
        echo json_encode($data);
    }

}