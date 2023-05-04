<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PartSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_part'        => 'BP-DP00001',
                'nama_part'        => 'Bumper Depan',
                'harga'       => '700000',
                'jumlah_part'      => '30',
                'satuan'      => 'Unit',
            ],
            [
                'kode_part'        => 'BP-BK00002',
                'nama_part'        => 'Bumper Belakang',
                'harga'       => '650000',
                'jumlah_part'      => '23',
                'satuan'      => 'Unit',
        
            ],
            [
                'kode_part'        => 'PN-DP00003',
                'nama_part'        => 'Panel Atas Bumper Depan',
                'harga'       => '485000',
                'jumlah_part'      => '11',
                'satuan'      => 'Unit',
            ],
            [
                'kode_part'        => 'PN-BK00004',
                'nama_part'        => 'Panel Atas Bumper Belakang',
                'harga'       => '440000',
                'jumlah_part'      => '3',
                'satuan'      => 'Unit',

            ],
            [
                'kode_part'        => 'PR-AT00005',
                'nama_part'        => 'Panel Atas Radiator',
                'harga'       => '500000',
                'jumlah_part'      => '18',
                'satuan'      => 'Unit',
            ],
            [
                'kode_part'        => 'PR-BW00006',
                'nama_part'        => 'Panel Bawah Radiator',
                'harga'       => '550000',
                'jumlah_part'      => '6',
                'satuan'      => 'Unit',
            ],
            [
                'kode_part'        => 'BR-LB00007',
                'nama_part'      => 'Bracket Lampu Besar',
                'harga'          => '500000',
                'jumlah_part'    => '12',
                'satuan'         => 'Unit',
            ],
            [
                'kode_part'        => 'KM-MK00008',
                'nama_part'      => 'Kap Motor',
                'harga'          => '950000',
                'jumlah_part'    => '19',
                'satuan'         => 'Unit',
            ],
            [
                'kode_part'      => 'KD-PD00009',
                'nama_part'      => 'Kedok depan (Panel Depan)',
                'harga'     => '500000',
                'jumlah_part'    => '5',
                'satuan'    => 'Unit',
            ],
            [
                'kode_part'      => 'PP-PP00010',
                'nama_part'      => 'Pipi',
                'harga'     => '350000',
                'jumlah_part'    => '21',
                'satuan'    => 'Unit',
            ],
            [
                'kode_part'      => 'CM-BR00011',
                'nama_part'      => 'Cross Member bawah Radiator',
                'harga'     => '400000',
                'jumlah_part'    => '9',
                'satuan'    => 'Unit',
            ],
            [
                'kode_part'      => 'FS-DP00012',
                'nama_part'      => 'Fender (Spakboard) depan',
                'harga'     => '400000',
                'jumlah_part'    => '7',
                'satuan'    => 'Unit',
            ],
            [
                'kode_part'      => 'GG-WB00013',
                'nama_part'      => 'Grill (Warna body)',
                'harga'     => '350000',
                'jumlah_part'    => '5',
                'satuan'    => 'Unit',
            ],
            [
                'kode_part'      => 'TK-BK00014',
                'nama_part'      => 'Tiang kaca belakang',
                'harga'          => '500000',
                'jumlah_part'    => '6',
                'satuan'    => 'Unit',
            ],
            [
                'kode_part'      => 'TK-DP00015',
                'nama_part'      => 'Tiang kaca depan',
                'harga'          => '600000',
                'jumlah_part'    => '7',
                'satuan'    => 'Unit',
            ],
            [
                'kode_part'      => 'PB-MS00016',
                'nama_part'      => 'Panel belakang mesin',
                'harga'          => '750000',
                'jumlah_part'    => '9',
                'satuan'    => 'Unit',
            ],
        ];


        $this->db->table('tb_spare_parts')->insertBatch($data);
    }
}