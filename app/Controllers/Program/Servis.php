<?php

namespace App\Controllers\Program;

use App\Models\ServisModel;

use App\Controllers\BaseController;

class Servis extends BaseController
{
    protected $servisModel;

    public function __construct()
    {
        $this->servisModel = new ServisModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Jenis Servis | Program',       
            'utama' => 'Jenis Servis',       
            'servis'=> $this->servisModel->getServis()
        ];

        return view('program/jenisServis/jenis_servis_index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'judul' => 'Halaman Jenis Servis | Program',
            'utama' => 'Jenis Servis',
            'servis' => $this->servisModel->getServis($slug)
        ];
        
        if (empty($data['servis'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Servis Tidak Ada');
        }

        return view('program/jenisServis/jenis_servis_detail', $data);
    }
     // =================================INPUT=======================================
     public function input()
     {
         helper('form');
         $data = [
             'judul' => 'Halaman Input Jenis Servis | Program',
             'utama' => 'Jenis Servis',
             'validation' => session('validation')
         ];
         return view('program/jenisServis/jenis_servis_input', $data);
     }

     // =====================================SAVE===========================================
    public function save()
    {
        // Rules Validasi
        helper('form');
        if (!$this->validate([
        'jenis_servis' => 
        [
            'rules' => 'required',
            'errors' =>[
                'required' => 'Jenis Servis harus diisi',
            ]
        ],
        'harga_jasa_servis' => 
        [
            'rules' => 'required',
            'errors' =>[
                'required' => 'E-Mail harus diisi'
            ]
        ],
        ]))
        {
            return redirect()->to('/program/servis/input')->withInput()->with('validation', $this->validator->getErrors());
        }

        // Insert Data
        $this->servisModel->save
        ([
            'jenis_servis'      => $this->request->getVar('jenis_servis'),
            'harga_jasa_servis' => $this->request->getVar('harga_jasa_servis'),
        ]);
        
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');

        return redirect()->to('/program/servis/index');
    }

    // =======================================EDIT=============================================
    public function edit($id)
    {
        helper('form');
        $data = [
            'judul' => 'Halaman Edit Jenis servis | Program',
            'utama' => 'Jenis servis',
            'validation' => session('validation'),
            'servis' => $this->servisModel->getServis($id)
        ];
        return view('program/jenisServis/jenis_servis_edit', $data);
    }
    
     // =======================UPDATE==================================================
     public function update($id) 
     {
          helper('form');
          // Rules nama
         $servisLama = $this->servisModel->getServis($this->request->getVar('id_jenis_servis'));
        //  dd($servisLama);
         if($servisLama['jenis_servis'] == $this->request->getVar('jenis_servis'))
         {
             $ruleServis = 'required';
         } else {
             $ruleServis = 'required|is_unique[tb_jenis_servis.jenis_servis]';
         }
          // Rules Validasi
          if (!$this->validate([
          'jenis_servis' => 
          [
              'rules'   => $ruleServis,
              'errors'  =>[
                  'required' => 'Jenis Servis harus diisi',
                  'is_unique' => 'Jenis Servis Sudah Terdaftar'
              ]
          ],
          'harga_jasa_servis' => 
          [
              'rules'   => 'required',
              'errors'  =>[
                  'required' => 'Harga Jasa Servis harus diisi', 
              ]
          ]
          ]))
          {
              return redirect()->to('/servis/edit/' . $this->request->getVar('id_jenis_servis'))->withInput()->with('validation', $this->validator->getErrors());
          }
         //  simpan data edit
         $this->servisModel->save 
         ([
             'id_jenis_servis'      => $id,    
             'jenis_servis'         => $this->request->getVar('jenis_servis'),
             'harga_jasa_servis'    => $this->request->getVar('harga_jasa_servis')
         ]);
         
         session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
 
         return redirect()->to('/program/servis/index');
     }

    
    public function delete($id) // fungsi delete
    {
        $this->servisModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('/program/servis/index');
    }

    
}