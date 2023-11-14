<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Detail Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Penjadwalan</li>
        <li class="breadcrumb-item active">Form Detail Penjadwalan</li>
    </ol>
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <h5 class="card-title">
                        Detail Data Penjadwalan
                    </h5>
                </div>
                <div class="card-body">
                    <!-- DETAIL ID -->
                    <div class="form-group row mb-2">
                        <label for="id_penjadwalan" class="col-md-3 col-form-label"><strong>Id
                                Penjadwalan</strong></label>
                        <div class="col">
                            <input type="text" id="id_penjadwalan" name="id_penjadwalan" class="form-control"
                                value="<?= $penjadwalan['id_penjadwalan']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Detail Nama -->
                    <div class="form-group row mb-2">
                        <label for="id_estimasi" class="col-md-3 col-form-label"><strong>Id Estimasi</strong></label>
                        <div class="col">
                            <input type="text" id="id_estimasi" name="id_estimasi" class="form-control"
                                value="<?= $penjadwalan['kode_estimasi']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Detail Kode Penjadwalan -->
                    <div class="form-group row mb-2">
                        <label for="kode_penjadwalan" class="col-md-3 col-form-label"><strong>Kode
                                Penjadwalan</strong></label>
                        <div class="col">
                            <input type="text" id="kode_penjadwalan" name="kode_penjadwalan" class="form-control"
                                value="<?= $penjadwalan['kode_penjadwalan']; ?>" disabled>
                        </div>
                    </div>
                    <!-- Detail Tanggal Dimulai -->
                    <div class="form-group row mb-2">
                        <label for="tgl_dimulai" class="col-md-3 col-form-label"><strong>Tanggal
                                Dimulai</strong></label>
                        <div class="col">
                            <input type="text" id="tgl_dimulai" name="tgl_dimulai" class="form-control"
                                value="<?= $penjadwalan['tgl_dimulai']; ?>" disabled>
                        </div>
                    </div>
                    <!-- Detail Tanggal Penyerahan -->
                    <div class="form-group row mb-2">
                        <label for="tgl_penyerahan" class="col-md-3 col-form-label"><strong>Tanggal
                                Penyerahan</strong></label>
                        <div class="col">
                            <input type="text" id="tgl_penyerahan" name="tgl_penyerahan" class="form-control"
                                value="<?= $penjadwalan['tgl_penyerahan']; ?>" disabled>
                        </div>
                    </div>
                    <!-- Detail Status -->
                    <div class="form-group row mb-3">
                        <label for="status" class="col-md-3 col-form-label"><strong>Status</strong></label>
                        <div class="col">
                            <input type="text" id="status" name="status" class="form-control"
                                value="<?= $penjadwalan['status']; ?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="/penjadwalan/edit/<?= $penjadwalan['id_penjadwalan']; ?>"
                                class="btn btn-success"><i class="bi bi-pencil"></i> Edit</a>
                            <form action="/program/penjadwalan/<?= $penjadwalan['id_penjadwalan']; ?>" method="post"
                                class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Yaking Ingin Menghapus data?')"><i
                                        class="bi bi-trash"></i> Hapus</button>
                            </form>
                        </div>
                        <div class="col text-end">
                            <a href="/penjadwalan">Kembali Ke Halaman Utama</a>
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