<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIPIA | Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="assets/lp/img/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/dist/assets/css/style.css">
</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="row align-items-center text-center">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h4 class="mb-3 f-w-400"><b>Lupa Password</b></h4>
                            <h5 class="mb-3 f-w-400">Masukkan Email Anda</h5>
                            <?= session()->getFlashdata('pesan'); ?>
                            <form action="/reset" method="post">
                                <div class="form-group mb-4">
                                    <label class="floating-label" for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                    <?php if (session()->get('validation')): ?>
                                        <div class="text-danger">
                                            <?= session()->get('validation')->getError('email') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary mb-4 rounded">Kirim Link Reset</button>
                                <p class="mb-0 text-muted">Sudah ingat Password? <a href="/login" class="f-w-400">Login</a></p>
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
