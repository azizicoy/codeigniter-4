<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Detail Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Jenis Servis</li>
        <li class="breadcrumb-item active">Form Detail Jenis Servis</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <h5 class="card-title">
                        Detail Data Jenis Servis
                    </h5>
                </div>
                <div class="card-body">
                    <!-- DETAIL ID -->
                    <div class="form-group row mb-2">
                        <label for="id_jenis_servis" class="col-md-3 col-form-label"><strong>Id Jenis
                                Servis</strong></label>
                        <div class="col">
                            <input type="text" id="id_jenis_servis" name="id_jenis_servis" class="form-control"
                                value="<?= $servis['id_jenis_servis']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Input Nama -->
                    <div class="form-group row mb-2">
                        <label for="jenis_servis" class="col-md-3 col-form-label"><strong>Nama Jenis
                                Servis</strong></label>
                        <div class="col">
                            <input type="text" id="jenis_servis" name="jenis_servis" class="form-control"
                                value="<?= $servis['jenis_servis']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Input E-Mail -->
                    <div class="form-group row mb-2">
                        <label for="harga_jasa_servis" class="col-md-3 col-form-label"><strong>Harga Jasa
                                Servis</strong></label>
                        <div class="col">
                            <input type="email" id="harga_jasa_servis" name="harga_jasa_servis" class="form-control"
                                value="<?= $servis['harga_jasa_servis']; ?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="/servis/edit/<?= $servis['id_jenis_servis']; ?>" class="btn btn-success"><i
                                    class="bi bi-pencil"></i> Edit</a>
                            <form action="/program/servis/<?= $servis['id_jenis_servis']; ?>" method="post"
                                class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Yaking Ingin Menghapus data?')"><i
                                        class="bi bi-trash"></i> Hapus</button>
                            </form>
                        </div>
                        <div class="col text-end">
                            <a href="/servis">Kembali Ke Halaman Utama</a>
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