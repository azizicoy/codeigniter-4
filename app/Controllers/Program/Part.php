<?php

namespace App\Controllers\Program;

use App\Models\SparePartModel;

use App\Controllers\BaseController;

class Part extends BaseController
{
    protected $partModel;
    public function __construct()
    {
        $this->partModel = new SparePartModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Part | Program',
            'utama' => 'Part',
            'part'  => $this->partModel->findAll(),
        ];
        return view('program/part/part_index', $data);
    }

    // ===================================DETAIL=======================================
    public function detail($slug)
    {
        $data = [
            'judul' => 'Halaman Spare Part | Program',
            'utama' => 'Spare Part',
            'part'  => $this->partModel->getPart($slug)
        ];
            
        if (empty($data['part'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Spare Part Tidak Ada');
        }
        return view('program/part/part_detail', $data);
    }

    // =================================INPUT=======================================
    public function input()
    {
        helper('form');
        $data = [
            'judul' => 'Halaman Input Spare Part | Program',
            'utama' => 'Spare Part',
            'validation' => session('validation')
        ];
        return view('program/part/part_input', $data);
    }

    // =====================================SAVE===========================================
    public function save()
    {
        // Rules Validasi
        helper('form');
        if (!$this->validate([
        'nama_part' => 
        [
            'rules' => 'required|is_unique[tb_spare_parts.nama_part]',
            'errors' =>[
                'required' => 'Nama Spare Part harus diisi',
                'is_unique' => 'Nama Spare Part sudah terdaftar'
            ]
        ],
        'satuan' => 
        [
            'rules' => 'required',
            'errors' =>[
                'required' => 'Satuan harus diisi', 
            ]
        ],
        'harga' => 
        [
            'rules' => 'required',
            'errors' =>[
                'required' => 'Harga harus diisi', 
                 ]
        ],
        'jumlah_part' => 
        [
            'rules' => 'required',
            'errors' =>[
                'required' => 'Jumlah Part harus diisi'
                        ]
        ]
        ]))
        {
            return redirect()->to('/program/part/input')->withInput()->with('validation', $this->validator->getErrors());
        }

        // Insert Data
        $this->partModel->save
        ([
            'nama_part'     => $this->request->getVar('nama_part'),
            'satuan'        => $this->request->getVar('satuan'),
            'harga'         => $this->request->getVar('harga'),
            'jumlah_part'   => $this->request->getVar('jumlah_part'),
        ]);
        
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');

        return redirect()->to('/program/part/index');
    }

     // =====================================Edit===========================================
    public function edit($id)
    {
        helper('form');
        $data = [
            'judul'         => 'Halaman Edit Part | Program',
            'utama'         => 'Part',
            'validation'    => session('validation'),
            'part'          => $this->partModel->getPart($id)
        ];
        return view('program/part/part_edit', $data);
    }

     // =======================UPDATE==================================================
     public function update($id) 
     {
          
          helper('form');
          // Rules nama
          $namaLama = $this->partModel->getPart($this->request->getVar('id_part'));
          if($namaLama['nama_part'] == $this->request->getVar('nama_part'))
          {
              $ruleNama = 'required';
          } else {
              $ruleNama = 'required|is_unique[tb_spare_parts.nama_part]';
          }
          // Rules Validasi
          if (!$this->validate([
          'nama_part' => 
          [
              'rules' => $ruleNama,
              'errors' =>[
                  'required' => 'Nama Spare Part harus diisi',
                  'is_unique' => 'Nama Spare Part sudah terdaftar' 
              ]
          ],
          'satuan' => 
          [
              'rules' => 'required',
              'errors' =>[
                  'required' => 'E-Mail harus diisi',  
              ]
          ],
          'harga' => 
          [
              'rules' => 'required',
              'errors' =>[
                  'required' => 'Nomor Telepon harus diisi',  
              ]
          ],
          'jumlah_part' => 
          [
              'rules' => 'required',
              'errors' =>[
                  'required' => 'Jumlah Part harus diisi'
                          ]
          ]
          ]))
          {
              return redirect()->to('/pemilik/edit/' . $this->request->getVar('id_pemilik'))->withInput()->with('validation', $this->validator->getErrors());
          }
         //  simpan data edit
         $this->partModel->save 
         ([
             'id_part'      => $id,    
             'nama_part'    => $this->request->getVar('nama_part'),
             'satuan'       => $this->request->getVar('satuan'),
             'harga'        => $this->request->getVar('harga'),
             'jumlah_part'  => $this->request->getVar('jumlah_part'),
         ]);
         
         session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
 
         return redirect()->to('/program/part/index');
     }

    // ====================================DELETE===============================
    public function delete($id)
    {
        $this->partModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('/program/part/index');
    }
}