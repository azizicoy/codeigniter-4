<?= $this->extend('layout/program_template'); ?>

<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard
            </a>
        </li>
        <li class="breadcrumb-item active">Part</li>
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
                    <h5 class="align-center">Pemilik Kendaraan</h5>
                    <a href="/pemilik/pemilik_input" class="btn btn-primary">Input Data</a>
                </div>
                <div class="card-body shadow">
                    <table id="dataTable" class="table table-striped bg-light" style="width: 100%;">
                        <thead class="table bg-info">
                            <tr>
                                <th scope="col">No</th>
                                <th>Nama Part</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($part as $p): ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $p['nama_part']; ?></td>
                                <td><?= $p['harga']; ?></td>
                                <td><?= $p['jumlah_part']; ?></td>
                                <td class="text-center"><a href="/part/<?= $p['id_part']; ?>" class="btn btn-success"><i
                                            class="bi bi-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">No</th>
                                <th>Nama Part</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
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
    $('#dataTable').DataTable({
        "order": [
            [0, "asc"]
        ]
    });
});
</script>
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/datatables-simple-demo.js"></script>
<?= $this->endSection(); ?>