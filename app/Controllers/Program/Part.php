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
            'pager' => $this->partModel->pager,
            
        ];
        
        return view('program/part/part_index', $data);
    }

    
}