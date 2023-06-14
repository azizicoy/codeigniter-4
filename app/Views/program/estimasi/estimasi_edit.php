<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Input Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="/estimasi">Estimasi</a></li>
        <li class="breadcrumb-item active">Form Edit Estimasi</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <h5 class="text-center">
                        Input Data Estimasi
                    </h5>
                </div>
                <?= helper('form'); ?>
                <form class="card-body" action="/program/estimasi/update/<?= $estimasi['id_estimasi']; ?>"
                    method="POST">
                    <?= csrf_field(); ?>
                    <!-- Input Nama Pemilik -->
                    <div class="form-group row mb-2">
                        <label for="id_pemilik" class="col-md-3 col-form-label">Nama Pemilik</label>
                        <div class="col">
                            <select class="form-select" id="id_pemilik" name="id_pemilik">
                                <option selected>Nama Pemilik</option>
                                <?php foreach($pemilik as $p): ?>
                                <option value="<?= $p['id_pemilik']; ?>"><?= $p['nama_pemilik']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['id_pemilik'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input Kendaraan -->
                    <div class="form-group row mb-2">
                        <label for="id_mobil" class="col-md-3 col-form-label">Nomor Polisi</label>
                        <div class="col">
                            <select class="form-select" id="id_mobil" name="id_mobil">
                                <option selected>Nomor Polisi</option>
                                <?php foreach($mobil as $m): ?>
                                <option value="<?= $m['id_mobil']; ?>"><?= $m['nopol']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['id_mobil'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input Pegawai -->
                    <div class="form-group row mb-2">
                        <label for="id_pegawai" class="col-md-3 col-form-label">Nama Pegawai</label>
                        <div class="col">
                            <select class="form-select" id="id_pegawai" name="id_pegawai">
                                <option selected>Nama Pegawai</option>
                                <?php foreach($pegawai as $p): ?>
                                <option value="<?= $p['id_pegawai']; ?>"><?= $p['nama_pegawai']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['id_pegawai'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input Kode Estimasi -->
                    <div class="form-group row mb-2">
                        <label for="kode_estimasi" class="col-md-3 col-form-label">Kode Estimasi</label>
                        <div class="col">
                            <input type="text"
                                class="form-control <?= isset($validation['kode_estimasi']) ? 'is-invalid' : ''; ?>"
                                id="kode_estimasi" name="kode_estimasi"
                                value="<?= old('kode_estimasi', $estimasi['kode_estimasi']); ?>">
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['kode_estimasi'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input Tanggal -->
                    <div class="form-group row mb-2">
                        <label for="tgl_estimasi" class="col-md-3 col-form-label">Tanggal Masuk</label>
                        <div class="col">
                            <input type="datetime-local"
                                class="form-control <?= isset($validation['tgl_estimasi']) ? 'is-invalid' : ''; ?>"
                                value="<?= old('tgl_estimasi', $estimasi['tgl_estimasi']); ?>" id="tgl_estimasi"
                                name="tgl_estimasi">
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['tgl_estimasi'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input Keluhan -->
                    <div class="form-group row mb-2">
                        <label for="keluhan" class="col-md-3 col-form-label">Keluhan</label>
                        <div class="col">
                            <textarea class="form-control <?= isset($validation['keluhan']) ? 'is-invalid' : ''; ?>"
                                id="keluhan" name="keluhan"
                                rows="3"><?= old('keluhan', $estimasi['keluhan']); ?></textarea>
                            <!-- error -->
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation['keluhan'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Input Jenis Perbaikan-->
                    <div class="form-group row mb-2">
                        <label for="jenis_servis" class="col-md-3 col-form-label">Detail Jenis Servis</label>
                        <div class="col" id="perbaikan">
                            <select class="form-select" id="jenis_servis" name="jenis_servis">
                                <option selected>Pilih Jenis Servis</option>
                                <?php foreach($servis as $s):?>
                                <option value="<?= $s['id_jenis_servis']; ?>"
                                    data-harga="<?= $s['harga_jasa_servis']; ?>"><?= $s['jenis_servis']; ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            <div id="invalid" class="invalid-feedback">
                                <?= $validation['jenis_servis'] ?? ''; ?>
                            </div>
                        </div>
                    </div>
                    <!-- total Harga -->
                    <div class="form-group row mb-2">
                        <label for="total_harga_servis" class="col-md-3 col-form-label">Total Harga</label>
                        <div class="col">
                            <input type="text" class="form-control" id="total_harga_servis" name="total_harga_servis"
                                readonly>
                        </div>
                    </div>
                    <!-- Input Spare Part-->
                    <div class="form-group row mb-2">
                        <label for="spare_part" class="col-md-3 col-form-label">Detail Spare part</label>
                        <div class="col" id="perbaikan">
                            <select class="form-select" id="nama_part" name="nama_part">
                                <option selected>pilih spare part</option>
                                <?php foreach($parts as $p):?>
                                <option value="<?= $p['id_part']; ?>" data-jumlah="<?= $p['harga']; ?>">
                                    <?= $p['nama_part']; ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            <div id="invalid" class="invalid-feedback">
                                <?= $validation['nama_part'] ?? ''; ?>
                            </div>
                        </div>
                        <!-- jumlah -->
                        <label for="jumlah_part" class="col-md-3 col-form-label">Jumlah Part</label>
                        <div class="col">
                            <div class="input-group">
                                <input type="number" class="form-control" id="jumlah_part" name="jumlah_part" min="1">
                            </div>
                        </div>
                    </div>
                    <!-- total Harga -->
                    <div class="form-group row mb-2">
                        <label for="total_harga" class="col-md-3 col-form-label">Total Harga</label>
                        <div class="col">
                            <input type="text" class="form-control" id="total_harga" name="total_harga" readonly>
                        </div>
                    </div>
                    <div class="row mx-auto" style="width: 100px;"><button type="submit"
                            class="btn btn-primary">Submit</button>
                    </div>
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
<script>
$(document).ready(function() {
    // set initial total harga to 0
    var totalHargaServis = 0;
    $('#total_harga_servis').val(totalHargaServis);

    // calculate total harga based on jenis servis selection
    $('#jenis_servis').change(function() {
        var selectedJenisServis = $('#jenis_servis').val();

        // check if selectedJenisServis is not null or undefined
        if (selectedJenisServis) {
            // sum up the harga of the selected jenis servis
            var newTotalHargaServis = 0;
            var hargaServis = $('#jenis_servis option[value="' + selectedJenisServis + '"]').data(
                'harga');
            newTotalHargaServis += hargaServis;

            // update total harga input
            totalHargaServis = newTotalHargaServis;
            $('#total_harga_servis').val(totalHargaServis);
        } else {
            // if no jenis servis is selected, set total harga to 0
            totalHargaServis = 0;
            $('#total_harga_servis').val(totalHargaServis);
        }
    });
});


// =======================================spare part=========================================
$(document).ready(function() {
    // set initial total harga to 0
    var totalHarga = 0;
    $('#total_harga').val(totalHarga);

    // calculate total harga based on selected part and jumlah
    $('#nama_part, #jumlah_part').change(function() {
        var selectedPart = $('#nama_part').val();
        var jumlahPart = $('#jumlah_part').val();

        if (selectedPart) {
            // sum up the harga of the selected part and multiply by jumlah
            var newTotalHarga = 0;
            var harga = $('#nama_part option[value="' + selectedPart + '"]').data(
                'jumlah');
            newTotalHarga += harga * jumlahPart;

            // update total harga input
            totalHarga = newTotalHarga;
            $('#total_harga').val(totalHarga);
        } else {
            // if no part is selected, set total harga to 0
            totalHarga = 0;
            $('#total_harga').val(totalHarga);
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="/assets/js/jquery-3.6.4.min.js"></script>
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/datatables-simple-demo.js"></script>
<?= $this->endSection(); ?>