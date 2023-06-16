<?php

namespace App\Controllers\Program;

use App\Models\MobilModel;
use App\Models\PegawaiModel;
use App\Models\SparePartModel;
use App\Models\ServisModel;
use App\Models\EstimasiModel;
use App\Models\PemilikModel;
use App\Models\DetailEstimasiModel;
use CodeIgniter\I18n\Time;

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
            'judul'         => 'Estimasi Biaya | Program',
            'utama'         => 'Estimasi',
            'estimasi'      => $this->estimasiModel->getEstimasi(),
            'validation'    => session('validation'),
            'time'          => time()
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

    // Ke Preview Print 
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

    
    public function print($slug)
    {
        $dompdf = new Dompdf();
        
        // Ambil data berdasarkan id estimasi dan detail
        $data = [
            'judul'     => 'Halaman Print Preview | Program',
            'utama'     => 'Print',
            'estimasi'  => $this->estimasiModel->getEstimasi($slug),
            'detail'    => $this->detailEstimasiModel->getDetail($slug),
        ];
        
        // jika data tidak ada
        if (empty($data['estimasi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Estimasi Tidak Ada');
        }
        // menampilkan data ke view
        $html = view('program/estimasi/estimasi_print', $data); 
        
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // load
        $dompdf->loadHtml($html);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Estimasi-Biaya.pdf', array('Attachment'=>false));
    }
    public function input()
    {
        $data = [
            'judul'         => 'Estimasi Biaya | Program',
            'utama'         => 'Estimasi',
            'mobil'         => $this->mobilModel->getMobil(),
            'estimasi'      => $this->estimasiModel->getEstimasi(),
            'servis'        => $this->servisModel->getServis(),
            'pegawai'       => $this->pegawaiModel->getPegawai(),
            'parts'         => $this->sparePartModel->getPart(),
            'pemilik'       => $this->pemilikModel->getPemilik(),
            'validation'    => session('validation')
        ];

        return view('program/estimasi/estimasi_input', $data);
    }
    
    // Save Estimasi
    public function save()
    {
        helper('form');
         // Rules Validasi
         if (!$this->validate([
            'id_pemilik' => 
            [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Nama Pemilik harus diisi'
                ]
            ],
            'id_mobil' => 
            [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Nomor Polisi harus diisi'
                ]
            ],
            'id_pegawai' => 
            [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Nama Pegawai harus diisi'
                ]
            ],
            'kode_estimasi' => 
            [
                'rules' => 'required|is_unique[tb_estimasi_perbaikan.kode_estimasi]',
                'errors' =>[
                    'required' => 'Kode Estimasi harus diisi',
                    'is_unique' => 'Kode Estimasi sudah terdaftar' 
                            ]
            ],
            'tgl_estimasi' => 
            [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Tanggal Estimasi harus diisi'
                            ]
            ],
            'keluhan' => 
            [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Keluhan harus diisi'
                            ]
            ],
            'jenis_servis' => 
            [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Jenis Servis harus diisi'
                            ]
            ],
            'nama_part' => 
            [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Spare Part harus diisi'
                            ]
            ]
            ]))
            {
                return (redirect()->back()->withInput()->with('validation', $this->validator->getErrors()));
            }
    
        // Variabel Jumlah Harga 
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
        $this->estimasiModel->save($data);

        // Ambil Id dari Data Yang Tersimpan
        $idEstimasi = $this->estimasiModel->getInsertID();
        
        // Kurangi jumlah spare part di tb_spare_parts
        $idPart = $this->request->getVar('nama_part');
        $jumlah = $this->request->getVar('jumlah_part');
        $this->sparePartModel->decreaseQuantity($idPart, $jumlah);

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
            'jumlah'            => $jumlah,
            'harga'             => $hargaSpart,
            'subtotal'          => $subtotal
        ];
        $this->detailEstimasiModel->insert($dataServis);

        return redirect()->to('/program/estimasi/index')->with('pesan', 'Data Berhasil Diinput.');
    }
    
    // Fungsi Edit
    public function edit($slug)
    {
        helper('form');
        $data = [
            'judul'         => 'Halaman Edit Estimasi | Program',
            'utama'         => 'Estimasi',
            'validation'    => session('validation'),
            'estimasi'      => $this->estimasiModel->getEstimasi($slug),
            'pemilik'       => $this->pemilikModel->getPemilik(),
            'servis'        => $this->servisModel->getServis(),
            'pegawai'       => $this->pegawaiModel->getPegawai(),
            'parts'         => $this->sparePartModel->getPart(),
            'mobil'         => $this->mobilModel->getMobil(),
        ];
        return view('program/estimasi/estimasi_edit', $data);
    }

    // Update Edit
    public function update($slug) 
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
            'id_pemilik' => $slug,    
            'nama_pemilik' => $this->request->getVar('nama_pemilik'),
            'e_mail' => $this->request->getVar('e_mail'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
        ]);
        
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');

        return redirect()->to('/program/pemilik/index');
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
            'estimasi'  => $this->estimasiModel->getEstimasi(),
            'detail'    => $this->detailEstimasiModel->getDetail(),
        ];
        return view('program/estimasi/estimasi_print', $data);
    }

    
}