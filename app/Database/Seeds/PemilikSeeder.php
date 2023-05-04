<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PemilikSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_pemilik'  => 'Ali',
                'alamat'        => 'Jl. Huda Masa 44',
                'e_mail'        => 'darth@gmail.com',
                'no_telp'       => '088964123121'
            ],
            [
                'nama_pemilik'  => 'Asik',
                'alamat'        => 'Jl. Mawar Putih 1',
                'e_mail'        => 'asik@gmail.com',
                'no_telp'       => '088881636171'
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('tb_pemilik')->insertBatch($data);
    }
}