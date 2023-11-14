<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Detail Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pemilik</li>
        <li class="breadcrumb-item active">Form Detail Pemilik</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <h5 class="card-title">
                        Detail Data Pemilik
                    </h5>
                </div>
                <div class="card-body">
                    <!-- DETAIL ID -->
                    <div class="form-group row mb-2">
                        <label for="id_pemilik" class="col-md-3 col-form-label"><strong>Id Pemilik</strong></label>
                        <div class="col">
                            <input type="text" id="id_pemilik" name="id_pemilik" class="form-control"
                                value="<?= $pemilik['id_pemilik']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Input Nama -->
                    <div class="form-group row mb-2">
                        <label for="nama_pemilik" class="col-md-3 col-form-label"><strong>Nama Pemilik</strong></label>
                        <div class="col">
                            <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control"
                                value="<?= $pemilik['nama_pemilik']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Input E-Mail -->
                    <div class="form-group row mb-2">
                        <label for="e_mail" class="col-md-3 col-form-label"><strong>E-Mail</strong></label>
                        <div class="col">
                            <input type="email" id="e_mail" name="e_mail" class="form-control"
                                value="<?= $pemilik['e_mail']; ?>" disabled>
                        </div>
                    </div>
                    <!-- Input No. Telp -->
                    <div class="form-group row mb-2">
                        <label for="no_telp" class="col-md-3 col-form-label"><strong>Nomor Telepon</strong></label>
                        <div class="col">
                            <input type="tel" id="no_telp" name="no_telp" class="form-control"
                                value="<?= $pemilik['no_telp']; ?>" disabled>
                        </div>
                    </div>
                    <!-- Input Alamat -->
                    <div class="form-group row mb-3">
                        <label for="alamat" class="col-md-3 col-form-label"><strong>Alamat</strong></label>
                        <div class="col">
                            <textarea class="form-control" id="alamat" name="alamat" cols="10" rows="10"
                                disabled><?= $pemilik['alamat']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="/pemilik/edit/<?= $pemilik['id_pemilik']; ?>" class="btn btn-success"><i
                                    class="bi bi-pencil"></i> Edit</a>
                            <form action="/program/pemilik/<?= $pemilik['id_pemilik']; ?>" method="post"
                                class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Yaking Ingin Menghapus data?')"><i
                                        class="bi bi-trash"></i> Hapus</button>
                            </form>
                        </div>
                        <div class="col text-end">
                            <a href="/pemilik">Kembali Ke Halaman Utama</a>
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