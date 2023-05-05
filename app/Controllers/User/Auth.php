<?php

namespace App\Controllers\User;

use App\Models\PegawaiModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    protected $pegawaiModel;
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $data = [
            'data' => 'Halaman Login | Program'
        ];

        return view('program/auth/login', $data);
    }

    public function login()
    {

        helper(['form']);
        if (!$this->validate([
            'username' => 
            [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' =>[
                    'required' => 'username harus diisi',
                    'min_length' => 'Username Harus Lebih Dari 3 Karakter',
                    'max_length' => 'Username Tidak Boleh Lebih Dari 20 Karakter'
                ]
            ],
            'password' => 
            [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' =>[
                    'required' => 'password harus diisi',
                    'min_length' => 'Password Harus Lebih Dari 5 Karakter',
                    'max_length' => 'Password Tidak Boleh Lebih Dari 255 Karakter'
                ]
            ],

        ]))
        {
            return view('program/auth/login');
        }
    }

    public function auth()
    {
        # code...
    }
}