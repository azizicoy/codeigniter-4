<?= $this->extend('layout/login'); ?>
<?= $this->section('login'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="username" name="username" type="text" autocomplete="none" />
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" name="password" type="password" />
                            <label for="password">Password</label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary" href="index.html">Login</a>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small mb-2"><a href="password.html">Lupa Password?</a></div>
                    <div class="small"><a href="register.html">Registrasi Akun</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>