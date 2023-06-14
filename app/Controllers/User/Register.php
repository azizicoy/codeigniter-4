<?php

namespace App\Controllers\User;

use App\Models\PegawaiModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Register extends BaseController
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

    // Registrasi
    public function register()
    {
        helper(['form']);

        $data = [
            'data' => 'Halaman Register | Program'
        ];

        return view('auth/register', $data);
       
    }

    // Validasi Resgister
    public function validation()
    {
        // Validasi input
        if (!$this->validate([
            'username' =>[
                'rules' => 'required|is_unique[tb_user.username]',
                'error' =>[
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah terdaftar' 
                ]
            ],
            'e_mail' =>[
                'rules' => 'required|is_unique[tb_user.e_mail]',
                'error' =>[
                    'required' => 'E_mail harus diisi',
                    'is_unique' => 'E_mail sudah terdaftar' 
                ]
            ],
            'password' =>[
                'rules' => 'required|is_unique[tb_user.password]',
                'error' =>[
                    'required' => 'Password harus diisi',
                    'is_unique' => 'Password sudah terdaftar' 
                ]
            ]
            ]))
            {
            // Tampilkan pesan kesalahan
            return redirect()->to('/user/auth/register')->withInput()->with('validation', $this->validator->getErrors());
            };
    }

     // Login
     public function login()
     {
         helper(['form']);
 
         return view('auth/login');
     }

     
    public function processLogin()
    {
        // Validasi input
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // Ambil data input
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Cari pengguna berdasarkan username
        
        $user = $this->userModel->where('username', $username)->first();

        // Verifikasi password
        if ($user && password_verify($password, $user['password'])) {
            // Set session pengguna
            $session = session();
            $session->set([
                'isLoggedIn' => true,
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role']
            ]);

            // Redirect ke halaman home
            return redirect()->to('user/auth/login');
        } else {
            // Tampilkan pesan kesalahan
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }
    }

    public function logout()
    {
        // Hapus session pengguna
        $session = session();
        $session->remove(['isLoggedIn', 'id', 'username', 'role']);

        // Redirect ke halaman login
        return redirect()->to('user/auth/login')->with('success', 'Logged out successfully.');
    }
}

    // public function validasi()
    // {
    //     $username = $this->request->getVar('username');
    //     $password = $this->request->getVar('password');

    //     $validasi = \Config\Services::validation();

    //     // Rules Validasi
    //     $valid = $this->validate([
    //         'username' => [
    //             'rules' => 'required',
    //             'errors' =>[
    //                 'required' => 'Username harus diisi'                
    //                 ]
    //                     ],
    //         'password' => [
    //             'rules' => 'required',
    //             'errors' =>[
    //                 'required' => 'Password harus diisi'
    //             ]
    //         ]]);
    //     if (!$valid){
    //         $session_error = [
    //             'error_username'=> $validasi->getError('username'),
    //             'error_password'=> $validasi->getError('password')
    //         ];

    //         session()->setFlashdata($session_error);

    //         return redirect()->back()->withInput();
    //     }
    // }
   