<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIPIA | Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="assets/lp/img/logo.png" type="image/png">
    <link rel="stylesheet" href="/assets/dist/assets/css/style.css">
</head>

<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <h4 class="mb-3 f-w-400">Register</h4>
                        <h5 class="mb-3 f-w-400">Pendaftaran Perkuliahan</h5>
                        <?= session()->getFlashdata('pesan'); ?>
                        <form action="/register" method="post">
                            <div class="form-group mb-3">
                                <label class="floating-label" for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    value="<?= old('nama'); ?>" required>
                                <?php if (session()->get('validation')): ?>
                                    <div class="text-danger">
                                        <?= session()->get('validation')->getError('nama') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mb-3">
                                <label class="floating-label" for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="<?= old('email'); ?>" required>
                                <?php if (session()->get('validation')): ?>
                                    <div class="text-danger">
                                        <?= session()->get('validation')->getError('email') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mb-3">
                                <label class="floating-label" for="user">Username</label>
                                <input type="text" class="form-control" name="username" id="user"
                                    value="<?= old('username'); ?>" required>
                                <?php if (session()->get('validation')): ?>
                                    <div class="text-danger">
                                        <?= session()->get('validation')->getError('username') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="pass">Password</label>
                                <input type="password" class="form-control" name="password" id="pass" required>
                                <?php if (session()->get('validation')): ?>
                                    <div class="text-danger">
                                        <?= session()->get('validation')->getError('password') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="konfpass">Ulangi Password</label>
                                <input type="password" class="form-control" name="password1" id="konfpass" required>
                                <?php if (session()->get('validation')): ?>
                                    <div class="text-danger">
                                        <?= session()->get('validation')->getError('password1') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <button class="btn btn-block btn-primary mb-4">Register</button>
                            <p class="mb-0 text-muted">Sudah punya akun? <a href="/loginpendaftaran" class="f-w-400">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/dist/assets/js/vendor-all.min.js"></script>
<script src="/assets/dist/assets/js/plugins/bootstrap.min.js"></script>
<script src="/assets/dist/assets/js/pcoded.min.js"></script>
</body>

</html>