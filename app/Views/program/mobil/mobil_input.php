<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Input Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="/mobil">Mobil</a></li>
        <li class="breadcrumb-item active">Form Input Mobil</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <h5 class="text-center">
                        Input Data Mobil
                    </h5>
                </div>
                <?= helper('form'); ?>
                <form class="card-body" action="/program/mobil/save" method="POST">
                    <?= csrf_field(); ?>
                    <!-- Input Mobil -->
                    <div class="form-group row mb-2">
                        <label for="nopol" class="col-md-3 col-form-label"><strong>Nomor Polisi</strong></label>
                        <div class="col">
                            <input type="text"
                                class="form-control <?= isset($validation['nopol']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('nopol');?>" id="nopol" name="nopol" autocomplete="off" autofocus>
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['nopol'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Nama Pemilik -->
                    <div class="form-group row mb-2">
                        <label for="nama_pemilik" class="col-md-3 col-form-label"><strong>Nama Pemilik</strong></label>
                        <div class="col">
                            <select class="form-select" id="id_pemilik" name="id_pemilik"
                                aria-label="Default select example">
                                <option selected>pilih salah satu</option>
                                <?php foreach ($pemilik as $p): ?>
                                <option value="<?= $p['id_pemilik']; ?>"><?= $p['nama_pemilik']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['nama_pemilik'] ?? ''; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Input jenis-->
                    <div class="form-group row mb-2">
                        <label for="jenis_kendaraan" class="col-md-3 col-form-label"><strong>Jenis
                                Kendaraan</strong></label>
                        <div class="col">
                            <select
                                class="form-select <?= isset($validation['jenis_kendaraan']) ? 'is-invalid' : ''; ?>"
                                id="jenis_kendaraan" name="jenis_kendaraan" aria-label="Default select example">
                                <option selected>Pilih Jenis Kendaraan</option>
                                <option value="APV">APV</option>
                                <option value="Baleno">Baleno</option>
                                <option value="Carry">Carry</option>
                                <option value="Ertiga">Ertiga</option>
                                <option value="Grand Vitara">Grand Vitara</option>
                                <option value="Ignis">Ignis</option>
                                <option value="Karimun">Karimun</option>
                                <option value="Splash">Splash</option>
                                <option value="Swift">Swift</option>
                                <option value="SX4">SX4</option>
                            </select>
                            <div id="jenis_kendaraan" class="invalid-feedback">
                                <?= $validation['jenis_kendaraan'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- no chasis -->
                    <div class="form-group row mb-2">
                        <label for="no_chasis" class="col-md-3 col-form-label"><strong>Nomor Chasis</strong></label>
                        <div class="col">
                            <input type="text" id="no_chasis" name="no_chasis"
                                class="form-control <?= isset($validation['no_chasis']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('no_chasis');?>" autocomplete="off">
                            <div id="no_chasis" class="invalid-feedback">
                                <?= $validation['no_chasis'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- no chasis -->
                    <div class="form-group row mb-2">
                        <label for="no_mesin" class="col-md-3 col-form-label"><strong>Nomor Mesin</strong></label>
                        <div class="col">
                            <input type="text" id="no_mesin" name="no_mesin"
                                class="form-control <?= isset($validation['no_mesin']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('no_mesin');?>" autocomplete="off">
                            <div id="no_mesin" class="invalid-feedback">
                                <?= $validation['no_mesin'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- warna -->
                    <div class="form-group row mb-2">
                        <label for="warna" class="col-md-3 col-form-label"><strong>Warna</strong> </label>
                        <div class="col">
                            <input type="text" id="warna" name="warna"
                                class="form-control <?= isset($validation['warna']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('warna');?>" autocomplete="off">
                            <div id="warna" class="invalid-feedback">
                                <?= $validation['warna'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- model -->
                    <div class="form-group row mb-2">
                        <label for="model" class="col-md-3 col-form-label"><strong>Model</strong></label>
                        <div class="col">
                            <input type="text" id="model" name="model"
                                class="form-control <?= isset($validation['model']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('model');?>" autocomplete="off">
                            <div id="model" class="invalid-feedback">
                                <?= $validation['model'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- merk -->
                    <div class="form-group row mb-2">
                        <label for="merk" class="col-md-3 col-form-label"><strong>Merk</strong></label>
                        <div class="col">
                            <input type="text" id="merk" name="merk"
                                class="form-control <?= isset($validation['merk']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('merk');?>" autocomplete="off">
                            <div id="merk" class="invalid-feedback">
                                <?= $validation['merk'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto" style="width: 100px;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
<script>
// $(document).ready(function() {
//     // event listener untuk input field pemilik
//     $('#nama_pemilik').on('change', function() {
//         // ambil id dari data attribute 'data-id'
//         var pemilik_id = $('#list_pemilik option[value="' + $(this).val() + '"]').data('id');
//         // isikan id ke input field hidden
//         $('#pemilik_id').val(pemilik_id);
//     });
// });


// $(function() {
// $("#nama_pemilik").autocomplete({
// source: "<?= base_url('program/mobil/search_pemilik'); ?>"
// });
// });
// $("#nama_pemilik").autocomplete({
// source: "<?= base_url('program/mobil/search_pemilik'); ?>",
// minLength: 1,
// select: function(event, ui) {
// $('#nama_pemilik').val(ui.item.label); // set nama pemilik pada input teks
// $('#id_pemilik').val(ui.item.value); // set id pemilik pada input hidden
// return false;
// }
// });
</script>
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/datatables-simple-demo.js"></script>
<?= $this->endSection(); ?>