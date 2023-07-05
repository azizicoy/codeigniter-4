<?= $this->extend('layout/login'); ?>
<?= $this->section('login'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>
                <form class="card-body" action="/login/process" method="POST">
                    <?php if (!empty(session()->getFlashdata('error'))) { ?>
                    <div class="alert alert-danger">
                        <?php echo session()->getFlashdata('error') ?>
                    </div>
                    <?php } ?>
                    <?php if(session()->getFlashdata('pesan')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                    <?php endif; ?>
                    <!-- Input Username -->
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="username" name="username" type="text"
                                    placeholder="Masukkan Username" autocomplete="off" />
                                <label for="inputFirstName">Username</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="password" name="password" type="password"
                                    placeholder="Masukkan Password" autocomplete="none" />
                                <label for="inputFirstName">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-auto"><button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="/register">Registrasi Akun</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>