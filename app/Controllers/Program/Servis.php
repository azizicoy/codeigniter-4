<?php

namespace App\Controllers\Program;

use App\Models\ServisModel;

use App\Controllers\BaseController;

class Servis extends BaseController
{
    protected $jenisServis;

    public function __construct()
    {
        $this->jenisServis = new ServisModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Jenis Servis | Program',       
            'utama' => 'Jenis Servis',       
            'servis'=> $this->jenisServis->getServis()
        ];

        return view('program/jenisServis/jenis_servis_index', $data);
    }

    
    public function delete($id) // fungsi delete
    {
        $this->jenisServis->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('/program/servis/index');
    }

    
}