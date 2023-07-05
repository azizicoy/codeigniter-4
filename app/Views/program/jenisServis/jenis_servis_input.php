<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Input Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="/servis">Servis</a></li>
        <li class="breadcrumb-item active">Form Input Servis</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <h5 class="text-center">
                        Input Data Servis
                    </h5>
                </div>
                <form class="card-body" action="/program/servis/save" method="POST">
                    <?= csrf_field(); ?>
                    <!-- Input Jenis Servis -->
                    <div class="form-group row mb-2">
                        <label for="nama_servis" class="col-md-3 col-form-label">Jenis Servis</label>
                        <div class="col">
                            <input type="text"
                                class="form-control <?= isset($validation['jenis_servis']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('jenis_servis');?>" id="jenis_servis" name="jenis_servis"
                                autocomplete="off" autofocus>
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['jenis_servis'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input Harga Jasa Servis -->
                    <div class="form-group row mb-2">
                        <label for="harga_jasa_servis" class="col-md-3 col-form-label">Harga Jasa Servis</label>
                        <div class="col">
                            <input type="number" id="harga_jasa_servis" name="harga_jasa_servis"
                                class="form-control <?= isset($validation['harga_jasa_servis']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('harga_jasa_servis');?>" autocomplete="off">
                            <div id="harga_jasa_servis" class="invalid-feedback">
                                <?= $validation['harga_jasa_servis'] ?? ''; ?>
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
<!-- TUTUP ISI KONTEN -->
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