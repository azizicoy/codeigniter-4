<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Input Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pemilik</li>
        <li class="breadcrumb-item active">Form Input Pemilik</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <h5 class="card-title">
                        Input Data Pelanggan
                    </h5>
                </div>
                <div class="card-body">
                    <!-- DETAIL KODE -->
                    <div class="form-group row mb-2">
                        <label for="kode_pegawai" class="col-md-3 col-form-label"><strong>Kode Pegawai</strong></label>
                        <div class="col">
                            <input type="text" id="kode_pegawai" name="kode_pegawai" class="form-control"
                                value="<?= $pegawai['kode_pegawai']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- DETAIL Nama -->
                    <div class="form-group row mb-2">
                        <label for="nama_pegawai" class="col-md-3 col-form-label"><strong>Nama Pegawai</strong></label>
                        <div class="col">
                            <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control"
                                value="<?= $pegawai['nama_pegawai']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- DETAIL VENDOR -->
                    <div class="form-group row mb-2">
                        <label for="nama_vendor" class="col-md-3 col-form-label"><strong>Vendor</strong></label>
                        <div class="col">
                            <input type="text" id="nama_vendor" name="nama_vendor" class="form-control"
                                value="<?= $pegawai['nama_vendor']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- DETAIL E-Mail -->
                    <div class="form-group row mb-2">
                        <label for="e_mail_pegawai" class="col-md-3 col-form-label"><strong>E-Mail</strong></label>
                        <div class="col">
                            <input type="email" id="e_mail_pegawai" name="e_mail_pegawai" class="form-control"
                                value="<?= $pegawai['e_mail_pegawai']; ?>" disabled>
                        </div>
                    </div>
                    <!-- DETAIL No. Telp -->
                    <div class="form-group row mb-2">
                        <label for="no_telp" class="col-md-3 col-form-label"><strong>Nomor Telepon</strong></label>
                        <div class="col">
                            <input type="tel" id="no_telp_pegawai" name="no_telp_pegawai" class="form-control"
                                value="<?= $pegawai['no_telp_pegawai']; ?>" disabled>
                        </div>
                    </div>
                    <!-- DETAIL Alamat -->
                    <div class="form-group row mb-3">
                        <label for="alamat" class="col-md-3 col-form-label"><strong>Alamat</strong></label>
                        <div class="col">
                            <textarea class="form-control" id="alamat_pegawai" name="alamat_pegawai" cols="10" rows="10"
                                disabled><?= $pegawai['alamat_pegawai']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="/pegawai/edit/<?= $pegawai['id_pegawai']; ?>" class="btn btn-success">Edit</a>
                            <form action="/program/pegawai/delete/<?= $pegawai['id_pegawai']; ?>" method="post"
                                class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Yaking Ingin Menghapus data?')">Hapus</button>
                            </form>
                        </div>
                        <div class="col text-end">
                            <a href="/pegawai">Kembali Ke Halaman Utama</a>
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