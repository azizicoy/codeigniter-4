<?php

namespace App\Controllers\Program;

use App\Controllers\BaseController;

class Penjadwalan extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Penjadwalan | Program'       
        ];

        return view('program/penjadwalan/penjadwalan_index', $data);
    }

    
}