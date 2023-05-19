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
            'data' => 'Halaman Login | Program',
            'validation' => session('validation'),
        ];

        return view('program/auth/login', $data);
    }

    public function validasi()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $validasi = \Config\Services::validation();

        // Rules Validasi
        $valid = $this->validate([
            'username' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Username harus diisi'                
                    ]
                        ],
            'password' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Password harus diisi'
                ]
            ]]);
        if (!$valid){
            $session_error = [
                'error_username'=> $validasi->getError('username'),
                'error_password'=> $validasi->getError('password')
            ];

            session()->setFlashdata($session_error);

            return redirect()->back()->withInput();
        }
    }
   

    public function logout()
    {
        // Hapus data session dan redirect ke halaman login
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}