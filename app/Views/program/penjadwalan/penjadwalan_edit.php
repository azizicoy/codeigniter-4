<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Edit Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="/penjadwalan">Penjadwalan</a></li>
        <li class="breadcrumb-item active">Form Edit Penjadwalan</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <h5 class="text-center">
                        Edit Data Penjadwalan
                    </h5>
                </div>
                <?= helper('form'); ?>
                <form class="card-body" action="/program/penjadwalan/update/<?= $penjadwalan['id_penjadwalan']; ?>"
                    method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_penjadwalan"
                        value="<?= old('id_penjadwalan', $penjadwalan['id_penjadwalan']); ?>">

                    <!-- Input Kode Estimasi -->
                    <div class="form-group row mb-2">
                        <label for="id_estimasi" class="col-md-3 col-form-label">Kode Estimasi</label>
                        <div class="col">
                            <select class="form-select <?= isset($validation['id_estimasi']) ? 'is-invalid' : ''; ?>"
                                id="id_estimasi" name="id_estimasi" aria-label="Default select example">
                                <option selected disabled>Pilih
                                    salah satu</option>
                                <?php foreach ($estimasi as $e): ?>
                                <option value="<?= $e['id_estimasi']; ?>"
                                    <?= old('id_estimasi', $penjadwalan['id_estimasi']) == $e['id_estimasi'] ? 'selected' : ''; ?>>
                                    <?= $e['kode_estimasi']; ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['id_estimasi'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Input Kode Penjadwalan -->
                    <div class="form-group row mb-2">
                        <label for="kode_penjadwalan" class="col-md-3 col-form-label">Kode Penjadwalan</label>
                        <div class="col">
                            <input type="text"
                                class="form-control <?= isset($validation['kode_penjadwalan']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('kode_penjadwalan', $penjadwalan['kode_penjadwalan']); ?>"
                                id="kode_penjadwalan" name="kode_penjadwalan" autocomplete="off" autofocus>
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['kode_penjadwalan'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <!-- =========================Input Tanggal Dimulai============================================ -->
                    <div class="form-group row mb-2">
                        <label for="tgl_dimulai" class="col-md-3 col-form-label">Tanggal Dimulai</label>
                        <div class="col">
                            <input type="datetime-local"
                                class="form-control <?= isset($validation['tgl_dimulai']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('tgl_dimulai', $penjadwalan['tgl_dimulai']);?>" id="tgl_dimulai"
                                name="tgl_dimulai">
                            <!-- error -->
                            <div id="invalid" class="invalid-feedback">
                                <?= $validation['tgl_dimulai'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <!-- =========================Input Tanggal Penyerahan============================================ -->
                    <div class="form-group row mb-2">
                        <label for="tgl_penyerahan" class="col-md-3 col-form-label">Tanggal Penyerahan</label>
                        <div class="col">
                            <input type="datetime-local"
                                class="form-control <?= isset($validation['tgl_penyerahan']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('tgl_penyerahan', $penjadwalan['tgl_penyerahan']);?>" id="tgl_penyerahan"
                                name="tgl_penyerahan">
                            <!-- error -->
                            <div id="invalid" class="invalid-feedback">
                                <?= $validation['tgl_penyerahan'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto" style="width: 100px;"><button type="submit"
                            class="btn btn-primary">Submit</button></div>

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