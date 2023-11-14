<?= $this->extend('layout/program_template'); ?>

<?= $this->section('konten'); ?>

<!-- isi konten -->
<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $utama; ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">
            <a href="/">Dashboard
            </a>
        </li>
        <li class="breadcrumb-item active">Penjadwalan</li>
    </ol>
    <!-- CARD HOME -->
    <?php if(session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= session()->getFlashdata('pesan'); ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="align-center">Daftar Penjadwalan</h5>
            <a href="/penjadwalan/penjadwalan_input" class="btn btn-primary"><i class="bi bi-file-plus"></i> Input</a>
        </div>
        <div class="card-body shadow">
            <table id="dataTable" class="table table-striped bg-light" style="width: 100%;">
                <thead class="table bg-info">
                    <tr>
                        <th scope="col">No</th>
                        <th>Kode Estimasi</th>
                        <th>Tanggal Dimulai</th>
                        <th>Tanggal Penyerahan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($jadwal as $j): ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $j['kode_estimasi']; ?></td>
                        <td><?= date('d-m-Y', strtotime($j['tgl_dimulai']));?> </td>
                        <td><?= date('d-m-Y', strtotime($j['tgl_penyerahan'])); ?></td>
                        <td>
                            <!-- Tambahkan form untuk mengubah status -->
                            <form action="/penjadwalan/update-status/<?= $j['id_penjadwalan']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="input-group">
                                    <select class="form-select" name="status">
                                        <option value="Sedang Dikerjakan"
                                            <?= ($j['status'] == 'Sedang Dikerjakan') ? 'selected' : ''; ?>>Sedang
                                            Dikerjakan</option>
                                        <option value="Selesai" <?= ($j['status'] == 'Selesai') ? 'selected' : ''; ?>>
                                            Selesai</option>
                                    </select>
                                    <button class="btn btn-primary" type="submit">Ubah Status</button>
                                </div>
                            </form>

                        </td>
                        <td class="text-center"><a href="/penjadwalan/<?= $j['id_penjadwalan']; ?>"
                                class="btn btn-success"><i class="bi bi-info-circle"></i></i> Detail</a>
                        </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Estimasi</th>
                        <th>Tanggal Dimulai</th>
                        <th>Tanggal Penyerahan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<!-- TUTUP ISI KONTEN -->
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