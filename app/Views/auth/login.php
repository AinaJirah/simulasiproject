<!DOCTYPE html>
<html lang="en">

<head>
<<<<<<< HEAD

    <title>SIPIA | Login Pendaftaran</title>
=======
    <title>SIPIA | Login</title>
>>>>>>> f0d6dd9914d8164dc7d34534c0c986d19ec99cb0
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="assets/lp/img/logo.png" type="image/png">

    <!-- Tambahkan Bootstrap untuk desain responsif -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/dist/assets/css/style.css">
</head>

<<<<<<< HEAD
<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="row align-items-center text-center">
                    <div class="col-md-12">
                        <div class="card-body ">
                            <h4 class="mb-3 f-w-400"><b>Login</b></h4>
                            <h5 class="mb-3 f-w-400">Sistem Informasi Akademik</h5>
                            <?= session()->getFlashdata('pesan'); ?>
                            <form action="/login" method="post">
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
                            </form>
                        </div>
                    </div>
                </div>
=======
<body style="background-color: #007bff;">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <div class="text-center">
                <img src="assets/lp/img/logo.png" alt="Logo SIPADES" style="width: 80px; height: auto;" class="mb-3">
                <h4 class="mb-3 fw-bold">Login</h4>
                <h6 class="mb-4 text-muted">Sistem Informasi Pendaftaran dan Informasi Akademik</h6>
>>>>>>> f0d6dd9914d8164dc7d34534c0c986d19ec99cb0
            </div>
            <?= session()->getFlashdata('pesan'); ?>
            <form action="/login" method="post">
                <div class="mb-3">
                    <label for="user" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="user" value="<?= old('username'); ?>" required>
                    <?php if (session()->get('validation')): ?>
                        <div class="text-danger">
                            <?= session()->get('validation')->getError('username') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="pass" required>
                    <?php if (session()->get('validation')): ?>
                        <div class="text-danger">
                            <?= session()->get('validation')->getError('password') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <a href="/pendaftaran" class="btn btn-primary w-100 mb-3 rounded">Login</a>
                <p class="mb-0 text-center text-muted">
                    Belum punya akun? <a href="/register" class="fw-bold">Register</a>
                </p>
            </form>
        </div>
    </div>

    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
