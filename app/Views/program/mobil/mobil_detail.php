<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Input Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Mobil</li>
        <li class="breadcrumb-item active">Form Detail Mobil</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <h5 class="card-title">
                        Detail Mobil
                    </h5>
                </div>
                <div class="card-body">
                    <!-- DETAIL NOPOL -->
                    <div class="form-group row mb-2">
                        <label for="nopol" class="col-md-3 col-form-label"><strong>Nomor Polisi</strong></label>
                        <div class="col">
                            <input type="text" id="nopol" name="nopol" class="form-control"
                                value="<?= $mobil['nopol']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- DETAIL NAMA PEMILIK -->
                    <div class="form-group row mb-2">
                        <label for="nama_pemilik" class="col-md-3 col-form-label"><strong>Nama Pemilik</strong></label>
                        <div class="col">
                            <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control"
                                value="<?= $mobil['nama_pemilik']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- DETAIL ID PEMILIK -->
                    <div class="form-group row mb-2">
                        <label for="id_pemilik" class="col-md-3 col-form-label"><strong>Id Pemilik</strong></label>
                        <div class="col">
                            <input type="text" id="id_pemilik" name="id_pemilik" class="form-control"
                                value="<?= $mobil['id_pemilik']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- DETAIL Nomor Chasis -->
                    <div class="form-group row mb-2">
                        <label for="no_chasis" class="col-md-3 col-form-label"><strong>Nomor
                                Chasis</strong></label>
                        <div class="col">
                            <input type="text" id="no_chasis" name="no_chasis" class="form-control"
                                value="<?= $mobil['no_chasis']; ?>" disabled>
                        </div>
                    </div>
                    <!-- DETAIL No. Mesin -->
                    <div class="form-group row mb-2">
                        <label for="no_telp" class="col-md-3 col-form-label"><strong>Nomor Mesin</strong></label>
                        <div class="col">
                            <input type="text" id="no_mesin" name="no_mesin" class="form-control"
                                value="<?= $mobil['no_mesin']; ?>" disabled>
                        </div>
                    </div>
                    <!-- DETAIL Jenis Kendaraan -->
                    <div class="form-group row mb-3">
                        <label for="jenis Kendaraan" class="col-md-3 col-form-label"><strong>Jenis
                                Kendaraan</strong></label>
                        <div class="col">
                            <input type="text" id="jenis_kendaraan" name="jenis_kendaraan" class="form-control"
                                value="<?= $mobil['jenis_kendaraan']; ?>" disabled>
                        </div>
                    </div>
                    <!-- DETAIL Warna -->
                    <div class="form-group row mb-3">
                        <label for="warna" class="col-md-3 col-form-label"><strong>Warna</strong></label>
                        <div class="col">
                            <input type="text" id="warna" name="warna" class="form-control"
                                value="<?= $mobil['warna']; ?>" disabled>
                        </div>
                    </div>
                    <!-- DETAIL Model -->
                    <div class="form-group row mb-3">
                        <label for="model" class="col-md-3 col-form-label"><strong>Model</strong></label>
                        <div class="col">
                            <input type="text" id="model" name="model" class="form-control"
                                value="<?= $mobil['model']; ?>" disabled>
                        </div>
                    </div>
                    <!-- DETAIL Merk -->
                    <div class="form-group row mb-3">
                        <label for="merk" class="col-md-3 col-form-label"><strong>Merk</strong></label>
                        <div class="col">
                            <input type="text" id="merk" name="merk" class="form-control" value="<?= $mobil['merk']; ?>"
                                disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="/mobil/edit/<?= $mobil['id_mobil']; ?>" class="btn btn-success"><i
                                    class="bi bi-pencil"></i> Edit</a>
                            <form action="/program/pegawai/detail/<?= $mobil['id_mobil']; ?>" method="post"
                                class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Yaking Ingin Menghapus data?')">Hapus</button>
                            </form>
                        </div>
                        <div class="col text-end">
                            <a href="/mobil">Kembali Ke Halaman Utama</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2022</div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- TUTUP LAYOUT -->
<!-- SCRIPT JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="/assets/js/jquery-3.6.4.min.js"></script>
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/datatables-simple-demo.js"></script>
<?= $this->endSection(); ?>