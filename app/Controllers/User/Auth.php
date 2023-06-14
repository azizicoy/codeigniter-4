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

    // ==================================Register=====================================
    public function register()
    {
        $data = [
            'data' => 'Halaman Registrasi',
            'validation' => session('validation')
        ];
        return view('program/auth/register', $data);
    }
    
    public function validation()
    {
        // Validasi input
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[tb_user.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'e_mail' => [
                'rules' => 'required|is_unique[tb_user.e_mail]',
                'errors' => [
                    'required' => 'E-mail harus diisi',
                    'is_unique' => 'E-mail sudah terdaftar'
                ]
            ],
            'password1' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal harus terdiri dari 6 karakter'
                ]
            ],
            'password2' => [
                'rules' => 'required|matches[password1]',
                'errors' => [
                    'required' => 'Konfirmasi password harus diisi',
                    'matches' => 'Konfirmasi password tidak cocok'
                ]
            ]
        ])) {
            // Jika validasi gagal, kembalikan ke halaman registrasi dengan pesan kesalahan
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        // Jika validasi berhasil, lakukan proses registrasi
        $username   = $this->request->getPost('username');
        $email      = $this->request->getPost('e_mail');
        $password   = $this->request->getPost('password1');

        // Hash password sebelum disimpan ke database
        $hashedPassword = password_hash(strval($password), PASSWORD_DEFAULT);

        // Simpan data pengguna ke database
        
        $this->userModel->insert([
            'username'  => $username,
            'e_mail'    => $email,
            'password'  => $hashedPassword
        ]);

        // Redirect ke halaman sukses registrasi atau halaman login
        return redirect()->to('/')->with('pesan', 'Registrasi berhasil! Silakan login.');
    }

// ============================Login============================================
        public function login()
        {
            if (session('username')) {
                return redirect()->to('/program');
            }
            $data = [
                'data' => 'Halaman Login',
                'validation' => session('validation')
            ];
            return view('program/auth/login', $data);
        }
    
        public function processLogin()
        {
            // Validasi input

            // Ambil data input
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
    
            // Cari pengguna berdasarkan username
            $user = $this->userModel->login($username);
    
            // Verifikasi password
            if ($user && password_verify(strval($password), $user['password'])) {
                // Set session pengguna
                session()->set('username', $user['username']);
                session()->set('password', $user['password']);
                session()->set('e_mail', $user['e_mail']);
    
                // Redirect ke halaman home
                return redirect()->to('/program');
            } else {
                // Tampilkan pesan kesalahan
                return redirect()->back()->withInput()->with('error', 'Username atau Password Salah.');
            }
        }
// =============================Logout============================================
        public function logout()
        {
            // Hapus session pengguna
            
            session()->remove('username');
    
            // Redirect ke halaman login
            return redirect()->to('/')->with('pesan', 'Berhasil Log Out.');
        }
    }
    