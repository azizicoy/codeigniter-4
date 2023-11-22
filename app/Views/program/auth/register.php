<?= $this->extend('layout/login'); ?>
<?= $this->section('login'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                </div>
                <form class="card-body" method="post" action="/register/validation">
                    <?php csrf_field(); ?>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control <?= isset($validation['username']) ? 'is-invalid' : ''; ?>"
                                    id="username" name="username" type="text" placeholder="Masukkan Username"
                                    autocomplete="off" />
                                <label for="username">Username</label>
                                <!-- error -->
                                <div class="invalid-feedback">
                                    <?= $validation['username'] ?? ''; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input class="form-control <?= isset($validation['e_mail']) ? 'is-invalid' : ''; ?>"
                                    id="e_mail" name="e_mail" type="email" placeholder="Masukkan E-Mail"
                                    autocomplete="off" />
                                <label for="e_mail">E-mail</label>
                                <!-- error -->
                                <div class="invalid-feedback">
                                    <?= isset($validation['e_mail']) ? $validation['e_mail'] : ''; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control <?= isset($validation['password']) ? 'is-invalid' : ''; ?>"
                                    id="password1" name="password1" type="password" placeholder="Create a password" />
                                <label for="password1">Password</label>
                                <!-- error -->
                                <div class="invalid-feedback">
                                    <?= isset($validation['password1']) ? $validation['password2'] : ''; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="password2" name="password2" type="password"
                                    placeholder="Confirm password" />
                                <label for="password2">Confirm Password</label>
                                <!-- error -->
                                <div class="invalid-feedback">
                                    <?= isset($validation['password2']) ? $validation['password2'] : ''; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 mb-0">
                        <div class="d-grid"><button type="submit" class="btn btn-primary">Create
                                Account</button></div>
                    </div>
                </form>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="/">Sudah Punya Akun? Kembali Ke Login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('login'); ?>