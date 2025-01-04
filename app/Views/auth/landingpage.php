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
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

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
          <li><a href="#sejarah">Sejarah singkat</a></li>
          <li><a href="#Link">Website Terkait</a></li>
          <li><a href="#contact">Kontak</a></li>
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
              Sistem Informasi Pendaftaran dan Informasi Akademik
            </h1>
            <p>
              <i>
                "Login sekarang untuk melakukan pendaftaran."
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
            <p>
              Sistem ini dirancang untuk memudahkan warga dalam melakukan
              peminjaman aset yang tersedia di kantor Desa Pemuda. Sistem ini
              juga mengintegrasikan proses peminjaman dan pengembalian aset
              dengan pengelolaan inventaris yang efisien dan transparan bagi
              seluruh masyarakat Desa Pemuda.
            </p>
            <ul>
              <li>
                <i class="bi bi-check2-circle"></i>
                <span>Memfasilitasi peminjaman aset secara online dan
                  offline.</span>
              </li>
              <li>
                <i class="bi bi-check2-circle"></i>
                <span>Menyediakan informasi lengkap tentang ketersediaan aset dan
                  syarat peminjaman.</span>
              </li>
              <li>
                <i class="bi bi-check2-circle"></i>
                <span>Mendukung pengelolaan inventaris yang terstruktur dan
                  efisien.</span>
              </li>
            </ul>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>
              Sistem peminjaman aset Desa Pemuda juga bertujuan untuk
              meningkatkan aksesibilitas dan pelayanan kepada masyarakat dalam
              memanfaatkan fasilitas publik yang ada. Dengan adanya sistem
              ini, diharapkan masyarakat dapat lebih mudah dan cepat mengakses
              aset yang mereka butuhkan untuk kegiatan sehari-hari maupun
              kegiatan komunal di Desa Pemuda.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- /About Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section">
      <img src="assets/lp/img/kantordesapemuda.jpg" alt="" />

      <div class="container">
        <div class="row d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl">
            <h3>Informasi Kantor Desa Pemuda</h3>
            <p>
              <br />
              Kantor Desa Pemuda buka pada:
              <br />
              Senin - Kamis: 08.00 - 15.00 WITA <br />
              Jumat: 08.00 - 11.00 WITA
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- /Call To Action Section -->

    <!-- Sejarah Section -->
    <section id="sejarah" class="sejarah section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Sejarah Singkat</h2>
      </div>
      <!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-6 d-flex align-items-center justify-content-center">
          <div class="col text-center pt-lg-0 content">
            <p class="fst-italic">
              Desa Pemuda, yang terletak di Kecamatan Pelaihari, Kabupaten
              Tanah Laut (Tala), Provinsi Kalimantan Selatan, resmi dibentuk
              berdasarkan Peraturan Daerah Kabupaten Tala Nomor 8 Tahun 2011.
              Sebelum menjadi desa mandiri, wilayah ini merupakan bagian dari
              Desa Tebing Siring di Kecamatan Bajuin. Nama "Pemuda"
              mencerminkan peran penting Komite Nasional Pemuda Indonesia
              (KNPI) dalam pembentukannya, khususnya KNPI Kabupaten Tala yang
              dipimpin oleh H Anang Bachransyah pada tahun 1970-an dan awal
              1980-an. Organisasi ini menarik pemuda-pemudi dari berbagai
              suku, sebagian besar berusia 20 hingga 30 tahun dan sudah
              menikah, untuk menetap di Bumi Tuntung Pandang. Mereka yang
              berhasil menetap selama lima tahun diberi hadiah berupa
              legalitas, sertifikat tanah, dan lahan garapan, serta bantuan
              sembako selama tiga tahun pertama. Pembentukan Desa Pemuda
              mencerminkan upaya pembauran dan pembangunan komunitas yang
              kuat, didukung oleh organisasi kepemudaan dan pemerintah. Dengan
              tambahan ini, sejarah Desa Pemuda menjadi lebih lengkap dan
              mencakup informasi tentang asal-usul, pembentukan, serta peran
              KNPI dalam proses tersebut.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- /Sejarah Section -->

    <section id="Link" class="link section">
      <div class="container">
        <div class="section-title text-center" data-aos="fade-up">
          <h2>Kunjungi Profil Kantor Desa Kami</h2>
          <p>
            Kami memiliki sebuah website yang menjelaskan profil lengkap
            Kantor Desa Pemuda.
          </p>
        </div>

        <div class="row justify-content-center mt-5">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card shadow">
              <div class="card-body text-center">
                <h5 class="card-title">Profil Kantor Desa Pemuda</h5>
                <p class="card-text"><i>Klik Link Dibawah Ini.</i></p>
                <a href="https://desapemuda.my.id/" target="_blank" rel="noopener noreferrer" class="btn btn-primary"><i
                    class="bi bi-link-45deg"></i> Kunjungi Website</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- /Link Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section shadow">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>
          Jika Anda mengalami kendala, Anda dapat menghubungi informasi di
          bawah ini.
        </p>
      </div>
      <!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-6 d-flex align-items-center justify-content-center">
          <div>
            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>No. Telpon</h3>
                  <p>+62 852 - 6444 - 4464</p>
                </div>
              </div>
              <!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-instagram flex-shrink-0"></i>
                <div>
                  <h3>Instagram</h3>
                  <p>@pemdes_pemuda</p>
                </div>
              </div>
              <!-- End Info Item -->
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Alamat</h3>
                  <p>
                    6QPG+RQ4, Pemuda, Kec. Pelaihari, Kabupaten Tanah Laut,
                    Kalimantan Selatan 70814
                  </p>
                </div>
              </div>
              <!-- End Info Item -->
              <div id="map" style="height: 400px"></div>
            </div>
          </div>

          <!-- End Contact Form -->
        </div>
      </div>
    </section>
    <!-- /Contact Section -->
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