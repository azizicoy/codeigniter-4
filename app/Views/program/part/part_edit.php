<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Edit Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Spare Part</li>
        <li class="breadcrumb-item active">Form Edit Spare Part</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <h5 class="text-center">
                        Edit Data Spare Part
                    </h5>
                </div>
                <?= helper('form'); ?>
                <form class="card-body" action="/program/part/update/<?= $part['id_part']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_part" value="<?= old('id_part', $part['id_part']); ?>">
                    <!-- Input Nama -->
                    <div class="form-group row mb-2">
                        <label for="nama_part" class="col-md-3 col-form-label">Nama Part</label>
                        <div class="col">
                            <input type="text"
                                class="form-control <?= isset($validation['nama_part']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('nama_part', $part['nama_part']); ?>" id="nama_part" name="nama_part"
                                autocomplete="off" autofocus>
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['nama_part'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input Satuan -->
                    <div class="form-group row mb-2">
                        <label for="satuan" class="col-md-3 col-form-label">Satuan</label>
                        <div class="col">
                            <input type="text" id="satuan" name="satuan"
                                class="form-control <?= isset($validation['satuan']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('satuan', $part['satuan']); ?>" autocomplete="off">
                            <div id="satuan" class="invalid-feedback">
                                <?= $validation['satuan'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input Harga -->
                    <div class="form-group row mb-2">
                        <label for="harga" class="col-md-3 col-form-label">Harga</label>
                        <div class="col">
                            <input type="number" id="harga" name="harga"
                                class="form-control <?= isset($validation['harga']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('harga', $part['harga']); ?>" autocomplete="off">
                            <div id="harga" class="invalid-feedback">
                                <?= $validation['harga'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input Jumlah Part -->
                    <div class="form-group row mb-2">
                        <label for="jumlah_part" class="col-md-3 col-form-label">Jumlah Part</label>
                        <div class="col">
                            <input type="number" id="jumlah_part" name="jumlah_part"
                                class="form-control <?= isset($validation['jumlah_part']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('jumlah_part', $part['jumlah_part']); ?>" autocomplete="off">
                            <div id="jumlah_part" class="invalid-feedback">
                                <?= $validation['jumlah_part'] ?? ''; ?>
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
            <div class="text-muted">Copyright &copy; Your Website <?= date('Y'); ?></div>
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