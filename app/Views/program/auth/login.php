<?= $this->extend('layout/login'); ?>
<?= $this->section('login'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>
                <form class="card-body" action="/auth/authenticate" method="POST">
                    <?= session()->getFlashdata('error'); ?>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="username_or_email" name="username_or_email" type="text"
                            autocomplete="none" />
                        <label for="username_or_email">Username or E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" name="password" type="password" />
                        <label for="password">Password</label>
                    </div>
                    <div class="row mx-auto"><button type="submit" class="btn btn-primary">Submit</button></div>
                </form>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="">Registrasi Akun</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>