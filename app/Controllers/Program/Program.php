<?php

namespace App\Controllers\Program;

use App\Controllers\BaseController;

class Program extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Halaman Utama | Program'       
        ];

        return view('program/index', $data);
    }

    
}