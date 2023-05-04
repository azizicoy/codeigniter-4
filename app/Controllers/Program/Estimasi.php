<?php

namespace App\Controllers\Program;

use App\Models\MobilModel;
use App\Models\PegawaiModel;
use App\Models\SparePartModel;
use App\Models\ServisModel;
use App\Models\EstimasiModel;
use App\Models\PemilikModel;

use App\Controllers\BaseController;

class Estimasi extends BaseController
{
    protected $pemilikModel;
    protected $estimasiModel;
    protected $sparePartModel;
    protected $pegawaiModel;
    protected $mobilModel;
    protected $servisModel;

    public function __construct()
    {
        $this->estimasiModel = new EstimasiModel();
        $this->sparePartModel = new SparePartModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->mobilModel = new mobilModel();
        $this->servisModel = new ServisModel();
        $this->pemilikModel = new PemilikModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Estimasi Biaya | Program',
            'utama'       => 'Estimasi',
            'estimasi' => $this->estimasiModel->getEstimasi()

        ];
// dd($data);
        return view('program/estimasi/estimasi_index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'judul' => 'Halaman Estimasi | Program',
            'utama' => 'Estimasi',
            'estimasi' => $this->estimasiModel->getEstimasi($slug)
        ];
        
        if (empty($data['estimasi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Estimasi Tidak Ada');
        }

        return view('program/estimasi/estimasi_detail', $data);
    }
    public function input()
    {
        $data = [
            'judul'     => 'Estimasi Biaya | Program',
            'utama'     => 'Estimasi',
            'mobil'     => $this->mobilModel->getMobil(),
            'estimasi'  => $this->estimasiModel->getEstimasi(),
            'servis'    => $this->servisModel->getServis(),
            'pegawai'    => $this->pegawaiModel->getPegawai(),
            'parts'     => $this->sparePartModel->getPart(),
            'pemilik'   => $this->pemilikModel->getPemilik() 
        ];

        return view('program/estimasi/estimasi_input', $data);
    }

    public function save()
    {
        helper('form');
      // Menghitung total harga servis
      $total_harga_servis = 0;
      $jenis_servis = $this->request->getVar('jenis_servis');
      if (!empty($jenis_servis)) {
          foreach ($jenis_servis as $id) {
              $jenisServis = $this->servisModel->find($id);
              $total_harga_servis += $jenisServis['harga_jasa_servis'];
          }
      }
    //   dd($jenis_servis);
      // Menghitung total harga spare part
      $total_harga_spare_part = 0;
      $spare_part = $this->request->getVar('nama_part');
      if (!empty($spare_part)) {
          foreach ($spare_part as $id) {
              $sparePart = $this->sparePartModel->find($id);
              $total_harga_spare_part += ($sparePart['harga'] * $id);
          }
      }
        
    //   menghitung total estimasi biaya
        $total_estimasi_biaya = $total_harga_servis + $total_harga_spare_part;
        // inser data
       $this->estimasiModel->save([
            'id_mobil' => $this->request->getVar('id_mobil'),
            'id_pemilik' => $this->request->getVar('id_pemilik'),
            'id_pegawai' => $this->request->getVar('id_pegawai'),
            'kode_estimasi' => $this->request->getVar('kode_estimasi'),
            'tgl_estimasi' => $this->request->getVar('tgl_estimasi'),
            'keluhan' => $this->request->getVar('keluhan'),
            'estimasi_biaya' => $total_estimasi_biaya
        ]);

        // dd($dump);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');

        return redirect()->to('/program/estimasi/index');
    }
    public function print()
    {
        $data = [
            'judul' => 'Estimasi Biaya | Program',
            'utama'       => 'Estimasi',
            'estimasi' => $this->estimasiModel->getEstimasi()
        ];

        return view('program/estimasi/estimasi_print', $data);
    }

    
}