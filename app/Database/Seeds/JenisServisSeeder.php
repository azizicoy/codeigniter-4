<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisServisSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_jenis_servis'     => 'Ketok + Cat',
                'jenis_servis'          => 'Bumper Depan/Belakang',
                'harga_jasa_servis'     => '700000',
            ],
            [
                'kode_jenis_servis' => 'Ganti part + Cat',
                'jenis_servis'      => 'Bumper Depan/Belakang',
                'harga_jasa_servis'     => '650000',
            ],
            [
                'kode_jenis_servis'     => 'Ketok + Cat',
                'jenis_servis'      => 'Ext.Bumper Depan/Belakang',
                'harga_jasa_servis'     => '450000',
            ],
            [
                'kode_jenis_servis' => 'Ganti part + Cat',
                'jenis_servis'      => 'Ext.Bumper Depan/Belakang',
                'harga_jasa_servis'     => '400000',
            ],
            [
                'kode_jenis_servis'     => 'Ketok + Cat',
                'jenis_servis'      => 'Panel Atas/Bawah Bumper Depan',
                'harga_jasa_servis'     => '485000',
            ],
            [
                'kode_jenis_servis' => 'Ganti part + Cat',
                'jenis_servis'          => 'Panel Atas/Bawah Bumper Depan',
                'harga_jasa_servis'     => '440000',
            ],
            [
                'kode_jenis_servis'     => 'Ketok + Cat',
                'jenis_servis'      => 'Bracket Lampu Besar ',
                'harga_jasa_servis'     => '500000',
            ],
            [
                'kode_jenis_servis' => 'Ganti part + Cat',
                'jenis_servis'      => 'Bracket Lampu Besar',
                'harga_jasa_servis'     => '550000',
            ],
            [
                'kode_jenis_servis'     => 'Ketok + Cat',
                'jenis_servis'      => 'Panel atas/bawah Radiator ',
                'harga_jasa_servis'     => '500000',
            ],
            [
                'kode_jenis_servis' => 'Ganti part + Cat',
                'jenis_servis'      => 'Panel atas/bawah Radiator',
                'harga_jasa_servis'     => '550000',
            ],
            [
                'kode_jenis_servis'     => 'Ketok + Cat',
                'jenis_servis'      => 'Kap Motor',
                'harga_jasa_servis'     => '950000',
            ],
            [
                'kode_jenis_servis' => 'Ganti part + Cat',
                'jenis_servis'      => 'Kap Motor',
                'harga_jasa_servis'     => '885000',
            ],
            [
                'kode_jenis_servis'     => 'Ketok + Cat',
                'jenis_servis'      => 'Kedok depan (Panel Depan)',
                'harga_jasa_servis'     => '500000',
            ],
            [
                'kode_jenis_servis' => 'Ganti part + Cat',
                'jenis_servis'      => 'Kedok depan (Panel Depan)',
                'harga_jasa_servis'     => '550000',
            ],
            [
                'kode_jenis_servis'     => 'Ketok + Cat',
                'jenis_servis'      => 'Ketok + Cat Pipi',
                'harga_jasa_servis'     => '350000',
            ],
            [
                'kode_jenis_servis' => 'Ganti part + Cat',
                'jenis_servis'      => 'Pipi',
                'harga_jasa_servis'     => '450000',
            ],//
            [
                'kode_jenis_servis'     => 'Ketok + Cat',
                'jenis_servis'      => 'Ketok + Cat Cross Member bawah Radiator',
                'harga_jasa_servis'     => '400000',
            ],
            [
                'kode_jenis_servis' => 'Ganti part + Cat',
                'jenis_servis'      => 'Cross Member bawah Radiator',
                'harga_jasa_servis'     => '350000',
            ],
            [
                'kode_jenis_servis'     => 'Ketok + Cat',
                'jenis_servis'      => 'Ketok + Cat Fender (Spakboard) depan',
                'harga_jasa_servis'     => '700000',
            ],
            [
                'kode_jenis_servis' => 'Ganti part + Cat',
                'jenis_servis'      => 'Fender (Spakboard) depan',
                'harga_jasa_servis'     => '650000',
            ],
            [
                'kode_jenis_servis'     => 'Ketok + Cat',
                'jenis_servis'      => 'Ketok + Cat Grill (Warna body)',
                'harga_jasa_servis'     => '400000',
            ],//
            [
                'kode_jenis_servis' => 'Ganti part + Cat',
                'jenis_servis'      => 'Grill (Warna body)',
                'harga_jasa_servis'     => '350000',
            ],
            [
                'kode_jenis_servis' => 'Ketok + Cat',
                'jenis_servis'      => 'Tiang kaca depan/belakang',
                'harga_jasa_servis' => '500000',
            ],
            [   'kode_jenis_servis' => 'Ganti part + Cat',
                'jenis_servis'      => 'Tiang kaca depan/belakang',
                'harga_jasa_servis'     => '600000',
            ],
            [
                'kode_jenis_servis'     => 'Ketok + Cat',
                'jenis_servis'      => 'Panel belakang mesin',
                'harga_jasa_servis'     => '750000',
            ],
        ];
        $this->db->table('tb_jenis_servis')->insertBatch($data);
    }
}