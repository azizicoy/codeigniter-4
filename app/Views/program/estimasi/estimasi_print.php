<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print | Estimasi Biaya</title>
    <style>
    .container {
        padding: 0 5px;
    }

    #satu {
        display: flex;
        justify-content: space-between;
    }

    .tabelAtas {
        width: 100%;
    }

    #tabelDua {
        width: 50%;
    }

    .tabelAtas td,
    #tabelDua td {
        border: none;
    }

    .info {
        display: flex;
        flex-direction: column;
    }

    .info span {
        margin-bottom: 5px;
    }

    .tanggal {
        display: flex;
        align-items: center;
    }

    h2 {
        text-align: center;
    }

    /* Tabel */
    .tabelSatu {
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid black;
    }

    .nama-pemilik {
        display: flex;
        justify-content: space-around;
    }

    .tabelTiga {
        margin: auto;
    }

    .tabelTiga td {
        border: none;
        padding: 2rem 6rem;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container">
        <!-- bagian atas sebelum garis -->
        <section id="satu">
            <!-- colum ikon -->
            <table class="tabelAtas">
                <tr>
                    <td colspan="3">
                        <h3>PT. SEJAHTERA BUANA TRADA - BODY REPAIR</h3>
                    </td>
                </tr>
                <tr>
                    <td>JL. Raya Bekasi KM. 19 Pulogadung</td>
                    <td>Tanggal</td>
                    <td><span> <?= date('d-m-Y', strtotime($estimasi['tgl_estimasi'])); ?></span></td>
                </tr>
                <tr>
                    <td>Rawa Terate - Cakung</td>
                    <td>Jam</td>
                    <td><span><?= date('H:i', strtotime($estimasi['tgl_estimasi'])); ?></span></td>
                </tr>
                <tr>
                    <td>Jakarta Timur 13920 - TELP : (021) 4609308</td>
                    <td>Kode Estimasi</td>
                    <td><span><?= $estimasi['kode_estimasi']; ?></span></td>
                </tr>
            </table>
        </section>
        <hr>
        <!-- Judul, nama pemilik dll -->
        <section id="dua">
            <div class="row-judul">
                <h2>Estimasi Biaya Perbaikan</h2>
            </div>
            <hr>
            <table id="tabelDua">
                <tr>
                    <td>
                        Nama Pemilik
                    </td>
                    <td>
                        : <?= $estimasi['nama_pemilik']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Nomor Polisi
                    </td>
                    <td>
                        : <?= $estimasi['nopol']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Vendor
                    </td>
                    <td>
                        : <?= $estimasi['nama_pegawai']; ?>
                    </td>
                </tr>
            </table>
        </section>
        <!-- tabel -->
        <section id="tiga">
            <p>
            <table class="tabelSatu">
                <thead>
                    <tr>
                        <th>Keluhan</th>
                        <th>Keterangan Jasa/Spare Part</th>
                        <th>Harga Jasa/Spare Part</th>
                        <th>Jumlah Spare Part</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="2"><?= $estimasi['keluhan']; ?></td>
                        <td><?= $detail['jenis_servis']; ?></td>
                        <td><?= 'Rp. ' . number_format($detail['harga_jasa_servis'], 0, ',', '.'); ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $detail['nama_part']; ?></td>
                        <td><?= 'Rp. '.number_format($detail['harga'],0,".","."); ?></td>
                        <td><?= $detail['jumlah']; ?></td>
                        <td><?= 'Rp. '.number_format($estimasi['estimasi_biaya'],0,".","."); ?></td>
                    </tr>

                </tbody>
            </table>
            </p>

            <!-- tabel nama pemilik -->

            <table class="tabelTiga">
                <tr>
                    <td>Nama Pemilik</td>
                    <td>Nama Pegawai</td>
                </tr>
                <tr>
                    <td><?= $estimasi['nama_pemilik']; ?></td>
                    <td><?= $estimasi['nama_pegawai']; ?></td>
                </tr>
            </table>

        </section>
    </div>
</body>

</html>