<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Data Pendaftaran</title>
  <link href="assets/lp/img/logo.png" rel="icon" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/lp/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }

    .card {
      border-radius: 10px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: #007bff;
      color: white;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      text-align: center;
      font-size: 1.5rem;
      font-weight: 600;
    }

    .btn-secondary {
      font-weight: 600;
    }

    .data-item {
      font-size: 1rem;
      line-height: 1.5;
      margin-bottom: 10px;
    }

    .data-item strong {
      color: #007bff;
    }
  </style>
</head>

<body>
  <main class="main">
    <section id="readonly-data" class="hero section">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                Data Pendaftaran
              </div>
              <div class="card-body">
                <p class="data-item"><strong>Nama:</strong> <?= $pendaftaran['nama'] ?></p>
                <p class="data-item"><strong>Alamat:</strong> <?= $pendaftaran['alamat'] ?></p>
                <p class="data-item"><strong>Tempat Lahir:</strong> <?= $pendaftaran['tempat_lahir'] ?></p>
                <p class="data-item"><strong>Tanggal Lahir:</strong> <?= $pendaftaran['tanggal_lahir'] ?></p>
                <p class="data-item"><strong>No. Telpon:</strong> <?= $pendaftaran['no_telpon'] ?></p>
                <p class="data-item"><strong>Jurusan:</strong> <?= $jurusan['nama_jurusan'] ?></p>
                <p class="data-item"><strong>Status Verifikasi:</strong>
                  <span class="<?= $pendaftaran['status_verefikasi'] === 'Verified' ? 'text-success' : ($pendaftaran['status_verefikasi'] === 'Pending' ? 'text-warning' : 'text-danger') ?>">
                    <?= $pendaftaran['status_verefikasi'] ?>
                  </span>
                </p>
                <a href="/logout" class="btn btn-secondary w-100 mt-3">Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="assets/lp/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
