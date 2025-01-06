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
                    <h4 class="mb-3">Lupa Password</h4>
                    <?= session()->getFlashdata('pesan'); ?>
                    <form action="/reset" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary mb-4">Kirim Link Reset</button>
                        <p class="mb-0 text-muted">Sudah Ingat Password? <a href="/login" class="f-w-400">Login</a></p>
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
