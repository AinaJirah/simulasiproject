<!DOCTYPE html>
<html lang="id">

<head>
    <title>SIPIA | Register</title>
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
                <div class="card-body">
                    <h4 class="mb-3">Reset Password</h4>
                    <?= session()->getFlashdata('pesan'); ?>
                    <form action="/reset/ubahPassword" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="token" value="<?= $token; ?>">
                        <div class="form-group mb-3">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password1">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password1" id="password1" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Ubah Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/dist/assets/js/vendor-all.min.js"></script>
    <script src="/assets/dist/assets/js/plugins/bootstrap.min.js"></script>
    <script src="/assets/dist/assets/js/pcoded.min.js"></script>
</body>

</html>
