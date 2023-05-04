<?= $this->extend('layout/program_template'); ?>

<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pegawai</li>
    </ol>
    <!-- CARD HOME -->
    <div class="row">
        <div class="col">
            <?php if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= session()->getFlashdata('pesan'); ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="align-center">Daftar Pegawai</h5>
                    <a href="/program/pegawai/input" class="btn btn-primary"><i class="bi bi-file-plus"></i>Input</a>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-striped" style="width:100%">
                        <thead class="bg-info">
                            <tr>
                                <th>No</th>
                                <th>Kode Pegawai</th>
                                <th>Nama Pegawai</th>
                                <th>Alamat</th>
                                <th>E-Mail</th>
                                <th>Nama Vendor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach($pegawai as $p): ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $p['kode_pegawai']; ?></td>
                                <td><?= $p['nama_pegawai']; ?></td>
                                <td><?= $p['alamat_pegawai']; ?></td>
                                <td><?= $p['e_mail_pegawai']; ?></td>
                                <td><?= $p['nama_vendor']; ?></td>
                                <td><a href="/pegawai/<?= $p['id_pegawai']; ?>" class="btn btn-success">Detail</a>
                                </td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Pegawai</th>
                                <th>Nama Pegawai</th>
                                <th>Alamat</th>
                                <th>E-Mail</th>
                                <th>Nama Vendor</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/datatables-simple-demo.js"></script>
<?= $this->endSection(); ?>