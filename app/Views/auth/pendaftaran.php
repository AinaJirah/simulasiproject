<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>SIPIA - Pendaftaran</title>
  <link href="assets/lp/img/logo.png" rel="icon" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/lp/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/lp/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/lp/css/main.css" rel="stylesheet" />
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

    .btn-primary {
      background-color: #007bff;
      border: none;
      font-weight: 600;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <div class="card">
          <div class="card-header">
            Formulir Pendaftaran
          </div>
          <div class="card-body">
            <form action="/pendaftaran" method="post" enctype="multipart/form-data">
              <?= csrf_field() ?>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input type="text"
                    class="form-control <?= isset($validation) && $validation->hasError('nama') ? 'is-invalid' : '' ?>"
                    id="nama" name="nama" value="<?= old('nama') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('nama') : '' ?>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="no_telpon" class="form-label">No. Telpon</label>
                  <input type="number"
                    class="form-control <?= isset($validation) && $validation->hasError('no_telpon') ? 'is-invalid' : '' ?>"
                    id="no_telpon" name="no_telpon" value="<?= old('no_telpon') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('no_telpon') : '' ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                  <input type="text"
                    class="form-control <?= isset($validation) && $validation->hasError('tempat_lahir') ? 'is-invalid' : '' ?>"
                    id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('tempat_lahir') : '' ?>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                  <input type="date"
                    class="form-control <?= isset($validation) && $validation->hasError('tanggal_lahir') ? 'is-invalid' : '' ?>"
                    id="tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('tanggal_lahir') : '' ?>
                  </div>
                </div>

              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea
                  class="form-control <?= isset($validation) && $validation->hasError('alamat') ? 'is-invalid' : '' ?>"
                  id="alamat" name="alamat" rows="3" required><?= old('alamat') ?></textarea>
                <div class="invalid-feedback">
                  <?= isset($validation) ? $validation->getError('alamat') : '' ?>
                </div>
              </div>
              <div class="mb-3">
                <label for="id_jurusan" class="form-label">Jurusan</label>
                <select
                  class="form-select <?= isset($validation) && $validation->hasError('id_jurusan') ? 'is-invalid' : '' ?>"
                  id="id_jurusan" name="id_jurusan" required>
                  <option value="">Pilih Jurusan Yang Diinginkan</option>
                  <?php foreach ($jurusan as $j): ?>
                    <option value="<?= $j['id_jurusan'] ?>" <?= old('id_jurusan') == $j['id_jurusan'] ? 'selected' : '' ?>>
                      <?= $j['nama_jurusan'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <?= isset($validation) ? $validation->getError('id_jurusan') : '' ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="nama_ayah" class="form-label">Nama Ayah</label>
                  <input type="text"
                    class="form-control <?= isset($validation) && $validation->hasError('nama_ayah') ? 'is-invalid' : '' ?>"
                    id="nama_ayah" name="nama_ayah" value="<?= old('nama_ayah') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('nama_ayah') : '' ?>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                  <input type="text"
                    class="form-control <?= isset($validation) && $validation->hasError('pekerjaan_ayah') ? 'is-invalid' : '' ?>"
                    id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?= old('pekerjaan_ayah') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('pekerjaan_ayah') : '' ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="nama_ibu" class="form-label">Nama Ibu</label>
                  <input type="text"
                    class="form-control <?= isset($validation) && $validation->hasError('nama_ibu') ? 'is-invalid' : '' ?>"
                    id="nama_ibu" name="nama_ibu" value="<?= old('nama_ibu') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('nama_ibu') : '' ?>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                  <input type="text"
                    class="form-control <?= isset($validation) && $validation->hasError('pekerjaan_ibu') ? 'is-invalid' : '' ?>"
                    id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?= old('pekerjaan_ibu') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('pekerjaan_ibu') : '' ?>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="file_foto" class="form-label">Foto </label>
                <small class="text-muted d-block mb-1">Masukan Foto Anda, Dengan jenis file yang diperbolehkan: JPG, PNG. Maksimal ukuran:
                  2MB.</small>
                <input type="file"
                  class="form-control <?= isset($validation) && $validation->hasError('file_foto') ? 'is-invalid' : '' ?>"
                  id="file_foto" name="file_foto" />
                <div class="invalid-feedback">
                  <?= isset($validation) ? $validation->getError('file_foto') : '' ?>
                </div>
              </div>

              <div class="mb-3">
                <label for="file_ijazah" class="form-label">Ijazah</label>
                <small class="text-muted d-block mb-1">Jenis file yang diperbolehkan: PDF. Maksimal ukuran: 2MB.</small>
                <input type="file"
                  class="form-control <?= isset($validation) && $validation->hasError('file_ijazah') ? 'is-invalid' : '' ?>"
                  id="file_ijazah" name="file_ijazah" />
                <div class="invalid-feedback">
                  <?= isset($validation) ? $validation->getError('file_ijazah') : '' ?>
                </div>
              </div>

              <div class="d-flex justify-content-between">
                <a href="/logout" class="btn btn-secondary w-30 me-2">Kembali</a>
                <button type="submit" class="btn btn-primary w-30 ">Daftar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/lp/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>