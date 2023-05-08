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

    public function authenticate()
    {
        // Ambil informasi username atau email dan password dari form login
        $usernameOrEmail = $this->request->getVar('username_or_email');
        $password = $this->request->getVar('password');

        // Cari user berdasarkan username atau email yang dimasukkan
        $user = $this->userModel->where('username', $usernameOrEmail)
                          ->orWhere('e_mail', $usernameOrEmail)
                          ->first();

        // Jika user ditemukan, verifikasi password
        if ($user && password_verify($password, $this->userModel['password'])) {
            // Ambil data user dan pegawai terkait dengan user yang sedang login
            $user = $this->userModel->getWithPegawai($this->userModel['id']);

            // Simpan data user dan pegawai ke dalam session
            $session = session();
            $sessionData = [
                'id' => $this->userModel['id'],
                'username' => $this->userModel['username'],
                'role' => $this->userModel['role'],
                'id_pegawai' => [
                    'id_pegawai' => $this->pegawaiModel['id_pegawai'],
                    'nama_pegawai' => $this->pegawaiModel['nama_pegawai']
                ]
            ];
            $session->set($sessionData);

            // Redirect ke halaman dashboard
            return redirect()->to('/');
        } else {
            // Tampilkan pesan error dan redirect kembali ke halaman login
            session()->setFlashdata('error', 'Username atau password salah.');
            return redirect()->back();
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