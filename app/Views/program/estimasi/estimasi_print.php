<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print | Estimasi Biaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4 ">
        <div class="row">
            <!-- colum ikon -->
            <div class="col-md-9">
                <h6>PT. SEJAHTERA BUANA TRADA - BODY REPAIR</h6>
                <p>JL. Raya Bekasi KM. 19 Pulogadung
                    <br>
                    Rawa Terate - Cakung
                    <br>
                    Jakarta Timur 13920 - TELP : (021) 4609308
                </p>
            </div>
            <!-- kolom tanggal estimasi -->
            <div class="col">
                <!-- tanggal estimasi -->
                <div class="tgl">Tanggal</div>
                <div class="jam">Jam</div>
                <div class="jam">Kode Estimasi</div>
            </div>
            <div class="col">
                <!-- tanggal estimasi -->
                <div class="tgl">: <?= $estimasi['tgl_estimasi']; ?></div>
                <div class="jam">: <?= $estimasi['kode_estimasi']; ?></div>
            </div>
        </div>
        <hr>
        <!-- row judul -->
        <div class="row text-center">
            <div class="col">
                <h2>Estimasi Biaya Perbaikan</h2>
            </div>
        </div>
        <!-- row nomor, nama dst -->
        <div class="row ">
            <div class="col-md-8">
                <h6>Biaya Jasa Perbaikan</h6>
                PT SBT
            </div>
            <div class="col">
                <h6>Nama Pemilik</h6>
                <h6>Nomor Polisi</h6>
                <h6>Vendor</h6>
            </div>
            <div class="col">
                <h6>: AA</h6>
                <h6>: AA</h6>
                <h6>: AA</h6>
            </div>
        </div>
        <!-- tabel -->
        <p>
        <div class="row">
            <div class="col">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keluhan</th>
                            <th>Keterangan Jasa</th>
                            <th>Harga Jasa</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>no</td>
                            <td><?= $estimasi['keluhan']; ?></td>
                            <td><?= $detail['jenis_servis']; ?></td>
                            <td><?= $detail['nama_part']; ?></td>
                            <td><?= $estimasi['estimasi_biaya']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Part</th>
                            <th>Keterangan Jasa</th>
                            <th>Harga Jasa</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>no</td>
                            <td><?= $estimasi['keluhan']; ?></td>
                            <td><?= $detail['jenis_servis']; ?></td>
                            <td><?= $detail['nama_part']; ?></td>
                            <td><?= $estimasi['estimasi_biaya']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </p>
        <div class="row mb-5 text-center">
            <div class="col">
                Nama Pemilik
            </div>
            <div class="col">
                Nama Pegawai
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                (Nama Pemilik)
            </div>
            <div class="col">
                (Nama Pegawai)
            </div>
        </div>
    </div>
    <!-- Script JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>