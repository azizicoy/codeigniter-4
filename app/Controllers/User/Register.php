<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        $data = [
            'data' => 'Halaman Login | Program'
        ];

        return view('program/auth/register', $data);
    }
}