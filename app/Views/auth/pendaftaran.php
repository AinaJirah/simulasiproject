<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>SIPIA</title>
  <link href="assets/lp/img/logo.png" rel="icon" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />

  <link rel="stylesheet" href="assets/lp/leaflet/leaflet.css" />

  <!-- Vendor CSS Files -->
  <link href="assets/lp/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/lp/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/lp/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/lp/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/lp/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="assets/lp/css/main.css" rel="stylesheet" />
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <div class="logo d-flex align-items-center me-auto">
        <img src="assets/lp/img/ini.png" alt="" />
        <h1 class="sitename">Pendaftaran</h1>
      </div>

      <nav id="navmenu" class="navmenu">
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="btn-getstarted" href="/logout">Kembali</a>
    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card-body">
              <form action="/pendaftaran" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input type="text"
                    class="form-control <?= isset($validation) && $validation->hasError('nama') ? 'is-invalid' : '' ?>"
                    id="nama" name="nama" value="<?= old('nama') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('nama') : '' ?>
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
                  <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                  <input type="text"
                    class="form-control <?= isset($validation) && $validation->hasError('tempat_lahir') ? 'is-invalid' : '' ?>"
                    id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('tempat_lahir') : '' ?>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                  <input type="date"
                    class="form-control <?= isset($validation) && $validation->hasError('tanggal_lahir') ? 'is-invalid' : '' ?>"
                    id="tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('tanggal_lahir') : '' ?>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="no_telpon" class="form-label">No. Telpon</label>
                  <input type="number"
                    class="form-control <?= isset($validation) && $validation->hasError('no_telpon') ? 'is-invalid' : '' ?>"
                    id="no_telpon" name="no_telpon" value="<?= old('no_telpon') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('no_telpon') : '' ?>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="id_jurusan" class="form-label">Jurusan</label>
                  <select
                    class="form-select <?= isset($validation) && $validation->hasError('id_jurusan') ? 'is-invalid' : '' ?>"
                    id="id_jurusan" name="id_jurusan" required>
                    <option value="">Pilih Jurusan</option>
                    <?php foreach ($jurusan as $j): ?>
                      <option value="<?= $j['id_jurusan'] ?>" <?= old('id_jurusan') == $j['id_jurusan'] ? 'selected' : '' ?>>
                        <?= $j['nama_jurusan'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('id_jurusan') : '' ?>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="nama_ayah" class="form-label">Nama Ayah</label>
                  <input type="text"
                    class="form-control <?= isset($validation) && $validation->hasError('nama_ayah') ? 'is-invalid' : '' ?>"
                    id="nama_ayah" name="nama_ayah" value="<?= old('nama_ayah') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('nama_ayah') : '' ?>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                  <input type="text"
                    class="form-control <?= isset($validation) && $validation->hasError('pekerjaan_ayah') ? 'is-invalid' : '' ?>"
                    id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?= old('pekerjaan_ayah') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('pekerjaan_ayah') : '' ?>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="nama_ibu" class="form-label">Nama Ibu</label>
                  <input type="text"
                    class="form-control <?= isset($validation) && $validation->hasError('nama_ibu') ? 'is-invalid' : '' ?>"
                    id="nama_ibu" name="nama_ibu" value="<?= old('nama_ibu') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('nama_ibu') : '' ?>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                  <input type="text"
                    class="form-control <?= isset($validation) && $validation->hasError('pekerjaan_ibu') ? 'is-invalid' : '' ?>"
                    id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?= old('pekerjaan_ibu') ?>" required />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('pekerjaan_ibu') : '' ?>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="file_foto" class="form-label">Foto</label>
                  <input type="file"
                    class="form-control <?= isset($validation) && $validation->hasError('file_foto') ? 'is-invalid' : '' ?>"
                    id="file_foto" name="file_foto" />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('file_foto') : '' ?>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="file_ijazah" class="form-label">Ijazah</label>
                  <input type="file"
                    class="form-control <?= isset($validation) && $validation->hasError('file_ijazah') ? 'is-invalid' : '' ?>"
                    id="file_ijazah" name="file_ijazah" />
                  <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('file_ijazah') : '' ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Daftar</button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- /Hero Section -->
  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/lp/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/lp/vendor/php-email-form/validate.js"></script>
  <script src="assets/lp/vendor/aos/aos.js"></script>
  <script src="assets/lp/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/lp/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/lp/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/lp/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/lp/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/lp/leaflet/leaflet.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var map = L.map("map", {
        center: [-3.7629641928244966, 114.77699283620755],
        zoom: 20,
        zoomControl: false,
      });

      // Tambahkan layer peta dari Mapbox untuk tampilan yang lebih baik
      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "© OpenStreetMap contributors",
      }).addTo(map);

      // Tambahkan kontrol zoom kustom
      L.control
        .zoom({
          position: "topright",
        })
        .addTo(map);

      // Tambahkan marker kustom dengan ikon yang lebih menarik
      var customIcon = L.icon({
        iconUrl: "https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowUrl: "https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png",
        shadowSize: [41, 41],
      });

      var marker = L.marker([-3.7629641928244966, 114.77699283620755], {
        icon: customIcon,
      })
        .addTo(map)
        .bindPopup(
          '<center><b>Kantor Desa Pemuda</b><br>"Lokasi Berdasarkan Google Maps"</center>'
        )
        .openPopup();

      // Tambahkan tautan ke Google Maps saat marker diklik
      marker.on("click", function () {
        window.open("https://maps.app.goo.gl/HtY4R4fPkX94aYc86", "_blank");
      });
    });
  </script>
  <!-- Main JS File -->
  <script src="assets/lp/js/main.js"></script>
</body>

</html>