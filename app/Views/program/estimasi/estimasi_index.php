<?= $this->extend('layout/program_template'); ?>

<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $utama; ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard
            </a>
        </li>
        <li class="breadcrumb-item active">Estimasi</li>
    </ol>
    <!-- CARD HOME -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="align-center">Estimasi Perbaikan</h5>
                    <a href="/program/estimasi/input" class="btn btn-primary"><i class="bi bi-file-plus"></i> Input</a>
                </div>
                <div class="card-body">
                    <?php if(session()->getFlashdata('pesan')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                    <?php endif; ?>
                    <table id="dataTable" class="table table-striped" style="width:100%">
                        <thead class="bg-info">
                            <tr>
                                <th>No</th>
                                <th>Kode Estimasi</th>
                                <th>Nomor Polisi</th>
                                <th>Tanggal Estimasi</th>
                                <th>Keluhan</th>
                                <th>Estimasi Biaya</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($estimasi as $e): ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $e['kode_estimasi']; ?></td>
                                <td><?= $e['nopol']; ?></td>
                                <td><?= $e['tgl_estimasi']; ?></td>
                                <td><?= $e['keluhan']; ?></td>
                                <td><?= 'Rp. '. number_format($e['estimasi_biaya'], 0, ',', '.'); ?></td>
                                <td class="text-center"><a href="/estimasi/<?= $e['id_estimasi']; ?>"
                                        class="btn btn-success"><i class="bi bi-info-circle"></i> Detail</a>
                                    <a href="/estimasi/print/<?= $e['id_estimasi']; ?>" class="btn btn-warning"><i
                                            class="bi bi-printer"></i> Print</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>No</td>
                                <td>Kode Estimasi</td>
                                <td>Nomor Polisi</td>
                                <td>Tanggal Estimasi</td>
                                <td>Keluhan</td>
                                <td>Estimasi Biaya</td>
                                <td>Aksi</td>
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
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        "columnDefs": [{
            "targets": 0,
            "orderable": false,
            "searchable": false,
        }],
        "order": [
            [1, "asc"]
        ], // Mengurutkan berdasarkan kolom kedua (nama_pemilik) secara ascending
        "drawCallback": function(settings) {
            var api = this.api();
            var rows = api.rows({
                page: 'current'
            }).nodes();
            var start = api.page.info().start;

            // Atur nomor urutan
            api.column(0, {
                page: 'current'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = start + i + 1;
            });
        }
    });
});
</script>
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/datatables-simple-demo.js"></script>
<?= $this->endSection(); ?>