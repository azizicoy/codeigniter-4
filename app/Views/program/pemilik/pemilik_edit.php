<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Edit Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pemilik</li>
        <li class="breadcrumb-item active">Form Edit Pemilik</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <h5 class="text-center">
                        Edit Data Pemilik
                    </h5>
                </div>
                <?= helper('form'); ?>
                <form class="card-body" action="/program/pemilik/update/<?= $pemilik['id_pemilik']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <!-- Ambil Params ID u/ Edit -->
                    <input type="hidden" name="id_pemilik" value="<?= old('id_pemilik', $pemilik['id_pemilik']); ?>">
                    <!-- Input Nama -->
                    <div class="form-group row mb-2">
                        <label for="nama_pemilik" class="col-md-3 col-form-label">Nama Pemilik</label>
                        <div class="col">
                            <input type="text"
                                class="form-control <?= isset($validation['nama_pemilik']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('nama_pemilik', $pemilik['nama_pemilik']); ?>" id="nama_pemilik"
                                name="nama_pemilik" autocomplete="off" autofocus>
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['nama_pemilik'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input E-Mail -->
                    <div class="form-group row mb-2">
                        <label for="e_mail" class="col-md-3 col-form-label">E-Mail</label>
                        <div class="col">
                            <input type="email" id="e_mail" name="e_mail"
                                class="form-control <?= isset($validation['e_mail']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('e_mail', $pemilik['e_mail']); ?>" autocomplete="off">
                            <div id="e_mail" class="invalid-feedback">
                                <?= $validation['e_mail'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input No. Telp -->
                    <div class="form-group row mb-2">
                        <label for="no_telp" class="col-md-3 col-form-label">Nomor Telepon</label>
                        <div class="col">
                            <input type="tel" id="no_telp" name="no_telp"
                                class="form-control <?= isset($validation['no_telp']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('no_telp', $pemilik['no_telp']); ?>" autocomplete="off">
                            <div id="no_telp" class="invalid-feedback">
                                <?= $validation['no_telp'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input Alamat -->
                    <div class="form-group row mb-2">
                        <label for="alamat" class="col-md-3 col-form-label">Alamat</label>
                        <div class="col">
                            <textarea class="form-control <?= isset($validation['alamat']) ? 'is-invalid' : ''; ?>"
                                id="alamat" name="alamat" cols="10" rows="10"
                                autocomplete="off"><?= old('alamat', $pemilik['alamat']); ?></textarea>
                        </div>
                    </div>
                    <div class="row mx-auto" style="width: 100px;"><button type="submit"
                            class="btn btn-primary">Simpan</button></div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- TUTUP ISI KONTEN -->
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