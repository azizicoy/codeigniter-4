<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Halaman Profile | Program'
        ];

        return view('program/user/index', $data);
    }
    public function user()
    {
        $data = [
            'data' => 'Halaman Login | Program'
        ];

        return view('program/user/index', $data);
    }
}