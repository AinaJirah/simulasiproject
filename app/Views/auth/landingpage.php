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
        <h1 class="sitename">SIPIA</h1>
      </div>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">Tentang Sistem</a></li>
          <li><a href="/loginpendaftaran">Pendaftaran</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="btn-getstarted" href="/login">Login</a>
    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>
<<<<<<< HEAD
              Selamat Datang di Sistem Informasi Akademik
            </h1>
            <p>
              <i>
                Platform yang memudahkan pengelolaan akademik secara online.
=======
              Sistem Informasi Pendaftaran dan Informasi Akademik
            </h1>
            <p>
              <i>
                "Login sekarang untuk melakukan pendaftaran."
>>>>>>> f0d6dd9914d8164dc7d34534c0c986d19ec99cb0
              </i>
            </p>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/lp/img/why-us.png" class="img-fluid animated" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Sistem</h2>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <div class="row gy-4" style="text-align: justify">
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>Sistem Informasi Akademik dirancang untuk membantu mahasiswa dan staf akademik dalam mengelola data
              perkuliahan, jadwal, dan nilai secara efisien.</p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Pendaftaran mahasiswa baru secara online.</li>
              <li><i class="bi bi-check-circle"></i> Pengelolaan jadwal kuliah yang terintegrasi.</li>
              <li><i class="bi bi-check-circle"></i> Akses transkrip nilai kapan saja.</li>
            </ul>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>
              Selain itu, sistem ini dilengkapi dengan fitur-fitur modern seperti notifikasi jadwal kuliah dan laporan
              akademik yang dapat membantu mahasiswa mengelola kegiatan akademik dengan lebih efektif. 
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- /About Section -->
  </main>

  <!-- <footer id="footer" class="footer">
      <div class="container copyright text-center mt-4">
        <p>
          © <span>Copyright</span> <strong class="px-1 sitename">Arsha</strong>
          <span>All Rights Reserved</span>
        </p>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </footer> -->

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