<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIPIA | Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="assets/lp/img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background: #007bff;
        }

        .auth-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .auth-content {
            max-width: 500px;
            width: 100%;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .auth-content .text-center img {
            margin-bottom: 5px; /* Jarak antara logo dan judul */
        }

        .card-body {
            padding: 20px 0;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-label {
            font-weight: bold;
        }

        .text-danger {
            font-size: 0.875rem;
        }
    </style>
</head>

<<<<<<< HEAD
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <h4 class="mb-3 f-w-400">Register</h4>
                        <h5 class="mb-3 f-w-400">Pendaftaran</h5>
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
                                <label class="floating-label" for="email">email</label>
                                <input type="text" class="form-control" name="email" id="email"
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
=======
<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="text-center mb-3">
                <img src="assets/lp/img/logo.png" alt="SIPADES Logo" width="100">
                <h4 class="mt-2">Register</h4> <!-- Gunakan margin kecil di sini -->
>>>>>>> f0d6dd9914d8164dc7d34534c0c986d19ec99cb0
            </div>
            <h6 class="text-center text-muted mb-4">Sistem Informasi Pendaftaran dan Informasi Akademik</h6>
            <?= session()->getFlashdata('pesan'); ?>
            <form action="/register" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Email</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= old('nama'); ?>" required>
                    <?php if (session()->get('validation')): ?>
                        <div class="text-danger">
                            <?= session()->get('validation')->getError('nama') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- <div class="mb-3">
                    <label for="no" class="form-label">Nama Lengkap</label>
                    <input type="number" class="form-control" name="no_hp" id="no" value="<?= old('no_hp'); ?>" required>
                    <?php if (session()->get('validation')): ?>
                        <div class="text-danger">
                            <?= session()->get('validation')->getError('no_hp') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= old('alamat'); ?>" required>
                    <?php if (session()->get('validation')): ?>
                        <div class="text-danger">
                            <?= session()->get('validation')->getError('alamat') ?>
                        </div>
                    <?php endif; ?>
                </div> -->
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
                <div class="mb-3">
                    <label for="konfpass" class="form-label">Ulangi Password</label>
                    <input type="password" class="form-control" name="password1" id="konfpass" required>
                    <?php if (session()->get('validation')): ?>
                        <div class="text-danger">
                            <?= session()->get('validation')->getError('password1') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <button class="btn btn-block btn-primary mb-4">Register</button>
                <p class="mb-0 text-muted">Sudah punya akun? <a href="/login" class="f-w-400">Login</a></p>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
