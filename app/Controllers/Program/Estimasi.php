<?php

namespace App\Controllers\Program;

use App\Models\MobilModel;
use App\Models\PegawaiModel;
use App\Models\SparePartModel;
use App\Models\ServisModel;
use App\Models\EstimasiModel;
use App\Models\PemilikModel;
use App\Models\DetailEstimasiModel;
use Dompdf\Dompdf;

use App\Controllers\BaseController;

class Estimasi extends BaseController
{
    protected $pemilikModel;
    protected $estimasiModel;
    protected $sparePartModel;
    protected $pegawaiModel;
    protected $mobilModel;
    protected $servisModel;
    protected $detailEstimasiModel;

    public function __construct()
    {
        $this->estimasiModel = new EstimasiModel();
        $this->sparePartModel = new SparePartModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->mobilModel = new mobilModel();
        $this->servisModel = new ServisModel();
        $this->pemilikModel = new PemilikModel();
        $this->detailEstimasiModel = new DetailEstimasiModel();
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
            'judul'     => 'Halaman Estimasi | Program',
            'utama'     => 'Estimasi',
            'estimasi'  => $this->estimasiModel->getEstimasi($slug),
            'detail'    => $this->detailEstimasiModel->getDetail($slug),
        ];
        
        if (empty($data['estimasi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Estimasi Tidak Ada');
        }
        
        return view('program/estimasi/estimasi_detail', $data);
    }

    // Print ke dalam tabel
    public function prev($slug)
    {
        $data = [
            'judul'     => 'Halaman Print Preview | Program',
            'utama'     => 'Print',
            'estimasi'  => $this->estimasiModel->getEstimasi($slug),
            'detail'    => $this->detailEstimasiModel->getDetail($slug),
        ];
        
        if (empty($data['estimasi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Estimasi Tidak Ada');
        }
        
        return view('program/estimasi/estimasi_print', $data);
    }
    public function print()
    {
        $dompdf = new Dompdf();
        
        // Ambil data berdasarkan id estimasi dan detail
         
        $html = view('program/estimasi/estimasi_print'); 
        
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // load
        $dompdf->loadHtml($html);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('data.pdf', array('Attachment' => false));
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
        $hargaServis = $this->request->getVar('total_harga_servis');
        $hargaSpart = $this->request->getVar('total_harga');
        $jumlah = $this->request->getVar('jumlah_part');
    
        // Hitung subtotal
        $subtotal = $hargaServis + ($hargaSpart * $jumlah);

    
        // Insert data yang diambil dari View estimasi_input
        $data = [
            'id_pemilik'         => $this->request->getVar('id_pemilik'),
            'id_mobil'           => $this->request->getVar('id_mobil'),
            'id_pegawai'         => $this->request->getVar('id_pegawai'),
            'keluhan'            => $this->request->getVar('keluhan'),
            'kode_estimasi'      => $this->request->getVar('kode_estimasi'),
            'tgl_estimasi'       => $this->request->getVar('tgl_estimasi'),
            'estimasi_biaya'     => $subtotal
        ];
        // Insert Data Ke Estimasi Model
        $this->estimasiModel->insert($data);

        // Ambil Id dari Data Yang Tersimpan
        $idEstimasi = $this->estimasiModel->getInsertID();

        // variabel harga servis
        $hargaServis = $this->request->getVar('total_harga_servis');

        // variabel harga spart
        $hargaSpart = $this->request->getVar('total_harga');

        // jumlah part
        $jumlah = $this->request->getVar('jumlah_part');

        // total harga servis + harga part
        $subtotal = $hargaServis += $hargaSpart;
        
        // Insert data yang diambil dari atas
        $dataServis = [
            'id_estimasi'       => $idEstimasi,
            'id_jenis_servis'   => $this->request->getVar('jenis_servis'),
            'id_part'           => $this->request->getVar('nama_part'),
            'harga_jasa_servis' => $hargaServis,
            'jumlah_part'       => $jumlah,
            'harga'             => $hargaSpart,
            'subtotal'          => $subtotal
        ];
        $this->detailEstimasiModel->insert($dataServis);

        return redirect()->to('/program/estimasi/index');
    }
    


    // ================================DELETE ESTIMASI================================
    public function delete($id)
    {
        $this->estimasiModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('/program/estimasi/index');
    }

    // contoh print
    public function contoh()
    {
        $data = [
            'estimasi' => $this->estimasiModel->getEstimasi(),
            'detail' => $this->detailEstimasiModel->getDetail(),
        ];
        return view('program/estimasi/estimasi_print', $data);
    }

    
}