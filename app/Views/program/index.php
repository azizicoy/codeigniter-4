<?= $this->extend('layout/program_template'); ?>
<?= $this->section('konten'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <!-- CARD HOME -->
    <div class="row d-flex d-flex justify-content-evenly">
        <div class="col-xl-3">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h5 class="text-center">Jumlah Kendaraan</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h4 class="mx-auto"><?= $mobil; ?></h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h5 class="text-center">Data Penjadwalan</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <h4 class="mx-auto"><?= $penjadwalan; ?></h4>
                </div>
            </div>
        </div>
    </div>
    <!-- CHART -->
    <div class="row">
        <div class="col">
            <div class="card shadow-lg bg-body rounded">
                <div class="card-header"> <strong>Chart Penjawalan</strong></div>
                <div class="card-body">
                    <div id="timeline"></div>
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
            <div class="text-muted">Copyright &copy; Muhammad Irfan Azizi <?= date('Y'); ?></div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- TUTUP LAYOUT -->
<!-- SCRIPT JS -->
<!-- Tambahkan script untuk menginisialisasi chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.css" />
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Data penjadwalan
var events = [
    <?php foreach ($events as $event) : ?> {
        id: <?= $event['id']; ?>,
        content: '<?= $event['content']; ?>',
        start: '<?= $event['start']; ?>',
        end: '<?= $event['end']; ?>'
    },
    <?php endforeach; ?>
];

// Konfigurasi timeline
var container = document.getElementById('timeline');
var options = {
    start: new Date(),
    end: new Date(new Date().getTime() + 365 * 24 * 60 * 60 * 1000), // Tambahkan 1 tahun dari tanggal saat ini
};

// Inisialisasi timeline
var timeline = new vis.Timeline(container, events, options);
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="/assets/js/jquery-3.6.4.min.js"></script>
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/datatables-simple-demo.js"></script>
<?= $this->endSection(); ?>