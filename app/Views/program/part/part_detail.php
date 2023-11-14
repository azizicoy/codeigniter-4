<?= $this->extend('layout/program_template'); ?>
<!-- KOnten ISi -->
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Form Detail Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><a href="/part">Spare Part</a></li>
        <li class="breadcrumb-item active">Form Detail Spare Part</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4 shadow">
                <div class="card-header">
                    <h5 class="card-title">
                        Detail Data Spare Part
                    </h5>
                </div>
                <div class="card-body">
                    <!-- DETAIL ID -->
                    <div class="form-group row mb-2">
                        <label for="id_part" class="col-md-3 col-form-label"><strong>Id Spare Part</strong></label>
                        <div class="col">
                            <input type="text" id="id_part" name="id_part" class="form-control"
                                value="<?= $part['id_part']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Input Nama Spare Part -->
                    <div class="form-group row mb-2">
                        <label for="nama_part" class="col-md-3 col-form-label"><strong>Nama Spare Part</strong></label>
                        <div class="col">
                            <input type="text" id="nama_part" name="nama_part" class="form-control"
                                value="<?= $part['nama_part']; ?>" disabled autofocus>
                        </div>
                    </div>
                    <!-- Input Satuan -->
                    <div class="form-group row mb-2">
                        <label for="satuan" class="col-md-3 col-form-label"><strong>Satuan</strong></label>
                        <div class="col">
                            <input type="text" id="satuan" name="satuan" class="form-control"
                                value="<?= $part['satuan']; ?>" disabled>
                        </div>
                    </div>
                    <!-- Input No. Telp -->
                    <div class="form-group row mb-2">
                        <label for="harga" class="col-md-3 col-form-label"><strong>Harga</strong></label>
                        <div class="col">
                            <input type="text" id="harga" name="harga" class="form-control"
                                value="<?= $part['harga']; ?>" disabled>
                        </div>
                    </div>
                    <!-- Input Jumlah Part -->
                    <div class="form-group row mb-3">
                        <label for="jumlah_part" class="col-md-3 col-form-label"><strong>Jumlah Part</strong></label>
                        <div class="col">
                            <input type="text" id="jumlah_part" name="jumlah_part" class="form-control"
                                value="<?= $part['jumlah_part']; ?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="/part/edit/<?= $part['id_part']; ?>" class="btn btn-success"><i
                                    class="bi bi-pencil"></i> Edit</a>
                            <form action="/program/part/<?= $part['id_part']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Yaking Ingin Menghapus data?')"><i
                                        class="bi bi-trash"></i> Hapus</button>
                            </form>
                        </div>
                        <div class="col text-end">
                            <a href="/part">Kembali Ke Halaman Utama</a>
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