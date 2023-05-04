<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
            
                'kode_pegawai'      => 'PPA0083614',
                'nama_pegawai'      => 'Daniel',
                'alamat_pegawai'    => 'Jl. Mercu 91',
                'e_mail_pegawai'    => 'daniel@gmail.com',
                'no_telp_pegawai'   => '086353617212',
                'nama_vendor'       => 'PPG A'
            ],
            [
            
                'kode_pegawai'      => 'PPB0086614',
                'nama_pegawai'      => 'Jon',
                'alamat_pegawai'    => 'Jl. Mimpi Mu 81',
                'e_mail_pegawai'    => 'jon@gmail.com',
                'no_telp_pegawai'   => '089663612667',
                'nama_vendor'       => 'PPG B'
            ],
            [
            
                'kode_pegawai'      => 'PWA2086084',
                'nama_pegawai'      => 'Hugh',
                'alamat_pegawai'    => 'Jl. Kongsi laut 11',
                'e_mail_pegawai'    => 'hugh@gmail.com',
                'no_telp_pegawai'   => '086645512311',
                'nama_vendor'       => 'PW'
            ],
            [
                'kode_pegawai'      => 'ATU2086055',
                'nama_pegawai'      => 'Fanta',
                'alamat_pegawai'    => 'Jl. Soda Kue 70',
                'e_mail_pegawai'    => 'fanta@gmail.com',
                'no_telp_pegawai'   => '089663773514',
                'nama_vendor'       => 'ATU'
            ],
            [
                'kode_pegawai'      => 'GLA1178614',
                'nama_pegawai'      => 'Kola',
                'alamat_pegawai'    => 'Jl. Merdeka barat 1',
                'e_mail_pegawai'    => 'kola@gmail.com',
                'no_telp_pegawai'   => '089665536144',
                'nama_vendor'       => 'GLASURIT'
            ],
        ];


        $this->db->table('tb_pegawai')->insertBatch($data);
    }
}