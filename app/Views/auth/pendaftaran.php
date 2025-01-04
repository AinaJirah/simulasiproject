<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIPIA | Pendaftaran</title>
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
            max-width: 900px;
            width: 100%;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .auth-content .text-center img {
            margin-bottom: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-danger {
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="text-center mb-3">
                <img src="assets/lp/img/logo.png" alt="SIPADES Logo" width="80">
                <h4 class="mt-2">Pendaftaran</h4>
            </div>
            <h6 class="text-center text-muted mb-4">Sistem Informasi Pendaftaran dan Informasi Akademik</h6>
            <form action="/register" method="post" enctype="multipart/form-data">
                <div class="row g-3">
                    <!-- Baris 1 -->
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="col-md-6">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" required>
                    </div>

                    <!-- Baris 2 -->
                    <div class="col-md-6">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                    </div>

                    <!-- Baris 3 -->
                    <div class="col-md-6">
                        <label for="no_telepon" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" name="no_telepon" id="no_telepon" required>
                    </div>
                    <div class="col-md-6">
                        <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                        <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" required>
                    </div>

                    <!-- Baris 4 -->
                    <div class="col-md-6">
                        <label for="nama_ayah" class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" required>
                    </div>
                    <div class="col-md-6">
                        <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                        <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" required>
                    </div>

                    <!-- Baris 5 -->
                    <div class="col-md-6">
                        <label for="nama_ibu" class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" required>
                    </div>
                    <div class="col-md-6">
                        <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" required>
                    </div>

                    <!-- Baris 6 -->
                    <div class="col-md-6">
                        <label for="foto" class="form-label">File Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto" accept="image/*" required>
                    </div>
                    <div class="col-md-6">
                        <label for="ijazah" class="form-label">File Ijazah</label>
                        <input type="file" class="form-control" name="ijazah" id="ijazah" accept=".pdf,.jpg,.png" required>
                    </div>

                    <!-- Baris 7 -->
                    <div class="col-md-6">
                        <label for="tanggal_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
                        <input type="date" class="form-control" name="tanggal_pendaftaran" id="tanggal_pendaftaran" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-4">Daftar</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
