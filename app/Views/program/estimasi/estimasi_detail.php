<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Detail Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Estimasi</li>
        <li class="breadcrumb-item active">Form Detail Estimasi</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <div class="row">
                        <h5 class="col-md-10 text-center">
                            Detail Data Estimasi
                        </h5>
                        <a href="/pdf/print" class="col btn btn-warning">Cetak</a>
                    </div>
                </div>
                <!-- Form Detail -->
                <div class="card-body">
                    <!-- Detail Nama Pemilik -->
                    <div class="form-group row mb-2">
                        <label for="id_pemilik" class="col-md-3 col-form-label">Nama Pemilik</label>
                        <div class="col">
                            <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control"
                                value="<?= $estimasi['nama_pemilik']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Detail Kendaraan -->
                    <div class="form-group row mb-2">
                        <label for="nopol" class="col-md-3 col-form-label">Nomor Polisi</label>
                        <div class="col">
                            <input type="text" id="nopol" name="nopol" class="form-control"
                                value="<?= $estimasi['nopol']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Detail Pegawai -->
                    <div class="form-group row mb-2">
                        <label for="nama_pegawai" class="col-md-3 col-form-label">Nama Pegawai</label>
                        <div class="col">
                            <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control"
                                value="<?= $estimasi['nama_pegawai']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Detail Kode Estimasi -->
                    <div class="form-group row mb-2">
                        <label for="kode_estimasi" class="col-md-3 col-form-label">Kode Estimasi</label>
                        <div class="col">
                            <input type="text" id="kode_estimasi" name="kode_estimasi" class="form-control"
                                value="<?= $estimasi['kode_estimasi']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Detail Tanggal -->
                    <div class="form-group row mb-2">
                        <label for="kode_estimasi" class="col-md-3 col-form-label">Tanggal</label>
                        <div class="col">
                            <input type="datetime-local" id="tgl_estimasi" name="tgl_estimasi" class="form-control"
                                value="<?= $estimasi['tgl_estimasi']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Detail Keluhan -->
                    <div class="form-group row mb-2">
                        <label for="keluhan" class="col-md-3 col-form-label">Keluhan</label>
                        <div class="col">
                            <input type="text" id="keluhan" name="keluhan" class="form-control"
                                value="<?= $estimasi['keluhan']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Detail Jenis Perbaikan-->
                    <div class="form-group row mb-2">
                        <label for="jenis_servis" class="col-md-3 col-form-label">Jenis Perbaikan</label>
                        <div class="col">
                            <input type="text" id="jenis_servis" name="jenis_servis" class="form-control"
                                value="<?= $detail['jenis_servis']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- total Harga Jenis Servis -->
                    <div class="form-group row mb-2">
                        <label for="harga_jasa_servis" class="col-md-3 col-form-label">Harga Perbaikan</label>
                        <div class="col">
                            <input type="number" id="harga_jasa_servis" name="harga_jasa_servis" class="form-control"
                                value="<?= $detail['harga_jasa_servis']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Input Spare Part-->
                    <div class="form-group row mb-2">
                        <label for="nama_part" class="col-md-3 col-form-label">Nama Spare Part</label>
                        <div class="col">
                            <input type="text" id="nama_part" name="nama_part" class="form-control"
                                value="<?= $detail['nama_part']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- total Harga Part-->
                    <div class="form-group row mb-2">
                        <label for="harga" class="col-md-3 col-form-label">Harga Spare Part</label>
                        <div class="col">
                            <input type="number" id="harga" name="harga" class="form-control"
                                value="<?= $detail['harga']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Subtotal-->
                    <div class="form-group row mb-2">
                        <label for="subtotal" class="col-md-3 col-form-label">Subtotal</label>
                        <div class="col">
                            <input type="number" id="subtotal" name="subtotal" class="form-control"
                                value="<?= $detail['subtotal']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Delete, Edit dan Kembali -->
                    <div class="row">
                        <div class="col">
                            <a href="/estimasi/edit/<?= $estimasi['id_estimasi']; ?>" class="btn btn-success"><i
                                    class="bi bi-pencil"></i> Edit</a>
                            <form action="/program/estimasi/detail/<?= $estimasi['id_estimasi']; ?>" method="post"
                                class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Yaking Ingin Menghapus data?')">Hapus</button>
                            </form>
                            <a href="/pdf/print/<?= $estimasi['id_estimasi']; ?>" class="btn btn-warning">Export PDF</a>
                        </div>
                        <div class="col text-end">
                            <a href="/estimasi">Kembali Ke Halaman Utama</a>
                        </div>
                    </div>
                </div>
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