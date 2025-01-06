<!DOCTYPE html>
<html lang="en">

<head>

    <title>SIPIA | Login Pendaftaran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="assets/lp/img/logo.png" type="image/png">
    <link rel="stylesheet" href="/assets/dist/assets/css/style.css">
</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="row align-items-center text-center">
                    <div class="col-md-12">
                        <div class="card-body ">
                            <h4 class="mb-3 f-w-400"><b>Login</b></h4>
                            <h5 class="mb-3 f-w-400">Pendaftaran Perkuliahan</h5>
                            <?= session()->getFlashdata('pesan'); ?>
                            <form action="/loginpendaftaran" method="post">
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
                                <button type="submit" class="btn btn-block btn-primary mb-4 rounded">Login</button>
                                <p class="mb-0 text-muted">Belum punya akun pendaftaran? <a href="/register"
                                        class="f-w-400">Register</a></p>
                                        <p class="mb-0 text-muted"><a href="/" class="btn-link">Kembali</a></p>
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