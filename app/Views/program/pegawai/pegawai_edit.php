<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Edit Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pegawai</li>
        <li class="breadcrumb-item active">Form Edit Pegawai</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <h5 class="text-center">
                        Edit Data Pegawai
                    </h5>
                </div>
                <form class="card-body" action="/program/pegawai/update/<?= $pegawai['id_pegawai']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_pegawai" value="<?= old('id_pegawai', $pegawai['id_pegawai']); ?>">
                    <!-- Input Nama -->
                    <div class="form-group row mb-2">
                        <label for="kode_pegawai" class="col-md-3 col-form-label">Kode Pegawai</label>
                        <div class="col">
                            <input type="text"
                                class="form-control <?= isset($validation['kode_pegawai']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('kode_pegawai', $pegawai['kode_pegawai']); ?>" id="kode_pegawai"
                                name="kode_pegawai" placeholder="ATU1234567" autocomplete="off" autofocus>
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['kode_pegawai'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input Nama -->
                    <div class="form-group row mb-2">
                        <label for="nama_pegawai" class="col-md-3 col-form-label">Nama Pegawai</label>
                        <div class="col">
                            <input type="text"
                                class="form-control <?= isset($validation['nama_pegawai']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('nama_pegawai', $pegawai['nama_pegawai']); ?>" id="nama_pegawai"
                                name="nama_pegawai" placeholder="Jaka Sembung" autocomplete="off" autofocus>
                            <div id="nama_pegawai" class="invalid-feedback">
                                <?= $validation['nama_pegawai'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input E-Mail -->
                    <div class="form-group row mb-2">
                        <label for="e_mail_pegawai" class="col-md-3 col-form-label">E-Mail</label>
                        <div class="col">
                            <input type="email" id="e_mail_pegawai" name="e_mail_pegawai"
                                class="form-control <?= isset($validation['e_mail_pegawai']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('e_mail_pegawai', $pegawai['e_mail_pegawai']); ?>" autocomplete="off"
                                placeholder="emai@gmail.com">
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['e_mail_pegawai'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input No. Telp -->
                    <div class="form-group row mb-2">
                        <label for="no_telp_pegawai" class="col-md-3 col-form-label">Nomor Telepon</label>
                        <div class="col">
                            <input type="tel" id="no_telp_pegawai" name="no_telp_pegawai"
                                class="form-control <?= isset($validation['no_telp_pegawai']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('no_telp_pegawai', $pegawai['no_telp_pegawai']); ?>" autocomplete="off"
                                placeholder="089966371231">
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['no_telp_pegawai'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input VENDOR -->
                    <div class="form-group row mb-2">
                        <label for="nama_vendor" class="col-md-3 col-form-label">Nama Vendor</label>
                        <div class="col">
                            <select class="form-select <?= isset($validation['nama_vendor']) ? 'is-invalid' : ''; ?>"
                                aria-label="Default select example" id="nama_vendor" name="nama_vendor">
                                <option selected disabled>Pilih Asal Vendor</option>
                                <option value="ATU">ATU</option>
                                <option value="GLASURIT">GLASURIT</option>
                                <option value="PPG A">PPG A</option>
                                <option value="PPG B">PPG B</option>
                                <option value="PW">PW</option>
                            </select>
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['nama_vendor'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input Alamat -->
                    <div class="form-group row mb-2">
                        <label for="alamat_pegawai" class="col-md-3 col-form-label">Alamat</label>
                        <div class="col">
                            <textarea
                                class="form-control <?= isset($validation['alamat_pegawai']) ? 'is-invalid' : ''; ?>"
                                id="alamat_pegawai" name="alamat_pegawai" cols="10" rows="10" autocomplete="off"
                                placeholder="Jl. Mega Mendung 1"><?= old('alamat_pegawai', $pegawai['alamat_pegawai']); ?></textarea>
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['alamat_pegawai'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto" style="width: 100px;"><button type="submit"
                            class="btn btn-primary">Simpan</button></div>

                </form>
            </div>
        </div>
    </div>
</div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Muhammad Irfan Azizi <?= date('Y'); ?></div>
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