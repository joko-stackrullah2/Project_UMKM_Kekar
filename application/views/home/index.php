<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>UMKM Kekar</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicons -->
  <link href="<?= base_url('assets/'); ?>/img/favicon.png" rel="icon">
  <link href="<?= base_url('assets/'); ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/'); ?>/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bell
  * Template URL: https://bootstrapmade.com/bell-free-bootstrap-4-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <a class="hero-brand" href="#" title="Home"><img alt="Bell Logo" src="<?= base_url('assets/'); ?>/img/logo_2.png"></a>
        </div>
      </div>

      <div class="col-md-12">
        <h1>
          UMKM Kecamatan Kalipare
        </h1>

        <p class="tagline">
        Sistem Informasi UMKM KEKAR (Usaha Mikro, Kecil, dan Menengah Kecamatan Kalipare)
        </p>
        <a class="btn btn-full scrollto" href="<?= base_url('auth/view_registration'); ?>">Daftar Sekarang</a>
      </div>
    </div>

  </section><!-- End Hero -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div id="logo" class="me-auto">
        <a href="#"><img src="<?= base_url('assets/'); ?>/img/logo_2.png" alt="" style="width: 150px;height: 80px;"></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#features">Fitur</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portofolio</a></li>
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="<?= base_url('auth'); ?>">Login</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('auth/view_registration'); ?>">Daftar</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section class="about" id="about">

      <div class="container text-center">
        <h2>
          Apa itu Sistem Informasi UMKM KEKAR ?
        </h2>

        <p>
        Sistem Informasi UMKM KEKAR merupakan sistem informasi yang mencatat data pelaku UMKM dan mengelola perizinan dapat memberikan manfaat besar dalam mempermudah operasional dan pertumbuhan UMKM. 
        </p>

        <div class="row stats-row justify-content-center">
          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $jml_terverifikasi ?>" data-purecounter-duration="1" class="purecounter stats-no"></span>
              Pelaku UMKM Terverifikasi
            </div>
          </div>

          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $jml_tertolak ?>" data-purecounter-duration="1" class="purecounter stats-no"></span>
              Pelaku UMKM Tidak Terverifikasi
            </div>
          </div>

          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $jml_belum_verif ?>" data-purecounter-duration="1" class="purecounter stats-no"></span>
              Pelaku Belum Terverifikasi
            </div>
          </div>

          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $jml_semua ?>" data-purecounter-duration="1" class="purecounter stats-no"></span>
              Semua Pelaku UMKM Terdaftar
            </div>
          </div>

          <!-- <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span data-purecounter-start="0" data-purecounter-end="68" data-purecounter-duration="1" class="purecounter stats-no"></span>
              Hard Workers
            </div>
          </div> -->
        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Welcome Section ======= -->
    <!-- <section class="welcome text-center">
      <h2>Welcome to a perfect theme</h2>
      <p>
        This is the most powerful theme with thousands of options that you have never seen before.
      </p>
      <img alt="Bell - A perfect theme" class="gadgets-img hidden-md-down" src="<?= base_url('assets/'); ?>/img/gadgets.png">
    </section>End Welcome Section -->

    <!-- ======= Features Section ======= -->
    <section class="features" id="features">

      <div class="container">
        <h2 class="text-center">
          Fitur
        </h2>

        <div class="row">
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-briefcase"></i>
                </div>
              </div>

              <div>
                <h3>
                  Pendaftaran Online
                </h3>

                <p>
                Terdapat fitur form pendaftaran online untuk calon pelaku UMKM
                </p>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-card-checklist"></i>
                </div>
              </div>

              <div>
                <h3>
                  Pendataan Pelaku UMKM
                </h3>

                <p>
                Pengumpulan data pribadi, alamat usaha, jenis produk atau jasa yang dihasilkan, dll.
                </p>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-bar-chart"></i>
                </div>
              </div>

              <div>
                <h3>
                  Otomatisasi verifikasi data pendaftar.
                </h3>

                <p>
                  Otomatisasi verifikasi data pendaftar secara online dan berbasis website
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-binoculars"></i>
                </div>
              </div>

              <div>
                <h3>
                Pengelompokan UMKM 
                </h3>

                <p>
                  Pengelompokan pelaku UMKM berdasarkan jenis bidang usaha atau sektor atau kategori usaha. 
                </p>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-brightness-high"></i>
                </div>
              </div>

              <div>
                <h3>
                  Manajemen Perizinan
                </h3>

                <p>
                  Sistem otomatis untuk mengelola perizinan yang diperlukan berdasarkan jenis usaha dan regulasi yang berlaku.
                </p>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-calendar4-week"></i>
                </div>
              </div>

              <div>
                <h3>
                  Dukungan Pelatihan dan Bimbingan
                </h3>
                <p>
                  Modul pelatihan online untuk membantu pelaku UMKM memahami cara menggunakan sistem.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <!-- <div>
                <div class="feature-icon">
                  <i class="bi bi-binoculars"></i>
                </div>
              </div> -->

              <div>
              <a href="#"><img src="<?= base_url('assets/'); ?>/img/REWARD.png" alt="" style="width: 300px;height: 270px;margin-bottom:10px"></a>
                <h3 style="margin-top: 10px;">
                Reward Bagi Pelaku UMKM
                </h3>

                <p >
                  Pemberian Reward kepada pelaku UMKM yang melengkapi semua perizinannya.
                </p>
              </div>
            </div>
          </div>

          <!-- <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-brightness-high"></i>
                </div>
              </div>

              <div>
                <h3>
                  Manajemen Perizinan
                </h3>

                <p>
                  Sistem otomatis untuk mengelola perizinan yang diperlukan berdasarkan jenis usaha dan regulasi yang berlaku.
                </p>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-calendar4-week"></i>
                </div>
              </div>

              <div>
                <h3>
                  Dukungan Pelatihan dan Bimbingan
                </h3>
                <p>
                  Modul pelatihan online untuk membantu pelaku UMKM memahami cara menggunakan sistem.
                </p>
              </div>
            </div>
          </div> -->
        </div>
      </div>

    </section><!-- End Features Section -->

    <!-- ======= Call to Action Section ======= -->
    <!-- <section class="cta">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-sm-12 text-lg-start text-center">
            <h2>
              Call to Action Section
            </h2>

            <p>
              Lorem ipsum dolor sit amet, nec ad nisl mandamus imperdiet, ut corpora cotidieque cum. Et brute iracundia his, est eu idque dictas gubergren
            </p>
          </div>

          <div class="col-lg-3 col-sm-12 text-lg-right text-center">
            <a class="btn btn-ghost" href="#">Buy This Template</a>
          </div>
        </div>
      </div>
    </section> -->
    <!-- End Call to Action Section -->

    <!-- ======= Portfolio Section ======= -->
    <section class="portfolio" id="portfolio">

      <div class="container text-center">
        <h2>
          Portofolio
        </h2>

        <!-- <p>
          Berikut portofolio dari UMKM Kalipare
        </p> -->
      </div>

      <div class="portfolio-grid">
        <div class="row">
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="<?= base_url('assets/'); ?>/img/porf-1.jpg" class="portfolio-lightbox" data-gallery="portfolioGallery"><img alt="" src="<?= base_url('assets/'); ?>/img/porf-1.jpg" style="height: 300px;width :400px">
                <div class="portfolio-over">
                  <div>
                    <h3 class="card-title">
                      Batik
                    </h3>

                    <!-- <p class="card-text">
                      Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                    </p> -->
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="<?= base_url('assets/'); ?>/img/porf-2.jpg" class="portfolio-lightbox" data-gallery="portfolioGallery"><img alt="" src="<?= base_url('assets/'); ?>/img/porf-2.jpg" style="height: 300px;width :400px">
                <div class="portfolio-over">
                  <div>
                    <h3 class="card-title">
                      Ice Cream Moringa
                    </h3>

                    <!-- <p class="card-text">
                      Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                    </p> -->
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="<?= base_url('assets/'); ?>/img/porf-3.jpg" class="portfolio-lightbox" data-gallery="portfolioGallery"><img alt="" src="<?= base_url('assets/'); ?>/img/porf-3.jpg" style="height: 300px;width :400px">
                <div class="portfolio-over">
                  <div>
                    <h3 class="card-title">
                      UMKM Kecamatan Kalipare
                    </h3>

                    <!-- <p class="card-text">
                      Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                    </p> -->
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="<?= base_url('assets/'); ?>/img/porf-4.jpg" class="portfolio-lightbox" data-gallery="portfolioGallery"><img alt="" src="<?= base_url('assets/'); ?>/img/porf-4.jpg" style="height: 300px;width :400px">
                <div class="portfolio-over">
                  <div>
                    <h3 class="card-title">
                      UPPKS Sumber Mulyo
                    </h3>

                    <p class="card-text">
                      Tiwul Aneka Rasa
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="<?= base_url('assets/'); ?>/img/porf-5.jpg" class="portfolio-lightbox" data-gallery="portfolioGallery"><img alt="" src="<?= base_url('assets/'); ?>/img/porf-5.jpg" style="height: 300px;width :400px">
                <div class="portfolio-over">
                  <div>
                    <h3 class="card-title">
                      Ice Cream
                    </h3>

                    <p class="card-text">
                      Susu Kambing
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="<?= base_url('assets/'); ?>/img/porf-6.jpg" class="portfolio-lightbox" data-gallery="portfolioGallery"><img alt="" src="<?= base_url('assets/'); ?>/img/porf-6.jpg" style="height: 300px;width :400px">
                <div class="portfolio-over">
                  <div>
                    <h3 class="card-title">
                      Zahir
                    </h3>

                    <p class="card-text">
                      Madu Murni Segar
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="<?= base_url('assets/'); ?>/img/porf-7.jpg" class="portfolio-lightbox" data-gallery="portfolioGallery"><img alt="" src="<?= base_url('assets/'); ?>/img/porf-7.jpg" style="height: 300px;width :400px">
                <div class="portfolio-over">
                  <div>
                    <h3 class="card-title">
                      Paguyuban UMKM Kalipare
                    </h3>

                    <p class="card-text">
                      Produk-produk lokal pribumi dari pedesaan untuk semua
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="card card-block">
              <a href="<?= base_url('assets/'); ?>/img/porf-8.jpg" class="portfolio-lightbox" data-gallery="portfolioGallery"><img alt="" src="<?= base_url('assets/'); ?>/img/porf-8.jpg" style="height: 300px;width :400px">
                <div class="portfolio-over">
                  <div>
                    <h3 class="card-title">
                      Sinar Lintang
                    </h3>

                    <p class="card-text">
                      Tepung Terigu Singkong - Gluten Free
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <!-- <section class="team" id="team">
      <div class="container">
        <h2 class="text-center">
          Meet our team
        </h2>

        <div class="row">
          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="<?= base_url('assets/'); ?>/img/team-1.jpg">
                <div class="card-title-wrap">
                  <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="bi bi-twitter"></i></a> <a href="#"><i class="bi bi-facebook"></i></a> <a href="#"><i class="bi bi-linkedin"></i></a> <a href="#"><i class="bi bi-envelope-fill"></i></a>
                  </nav>

                  <p>
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </a>
            </div>
          </div>

          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="<?= base_url('assets/'); ?>/img/team-2.jpg">
                <div class="card-title-wrap">
                  <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="bi bi-twitter"></i></a> <a href="#"><i class="bi bi-facebook"></i></a> <a href="#"><i class="bi bi-linkedin"></i></a> <a href="#"><i class="bi bi-envelope-fill"></i></a>
                  </nav>

                  <p>
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </a>
            </div>
          </div>

          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="<?= base_url('assets/'); ?>/img/team-3.jpg">
                <div class="card-title-wrap">
                  <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="bi bi-twitter"></i></a> <a href="#"><i class="bi bi-facebook"></i></a> <a href="#"><i class="bi bi-linkedin"></i></a> <a href="#"><i class="bi bi-envelope-fill"></i></a>
                  </nav>

                  <p>
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </a>
            </div>
          </div>

          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="<?= base_url('assets/'); ?>/img/team-4.jpg">
                <div class="card-title-wrap">
                  <span class="card-title">Sergio Fez</span> <span class="card-text">Art Director</span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Connect with me
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="bi bi-twitter"></i></a> <a href="#"><i class="bi bi-facebook"></i></a> <a href="#"><i class="bi bi-linkedin"></i></a> <a href="#"><i class="bi bi-envelope-fill"></i></a>
                  </nav>

                  <p>
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <!-- <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="section-title">Kontak Kami</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="bi bi-geo-alt"></i>
                <p>Kecamatan Kalipare</p>
              </div>

              <div>
                <i class="bi bi-envelope"></i>
                <p>UMKMKekar@gmail.com</p>
              </div>

              <div>
                <i class="bi bi-phone"></i>
                <p>+6208888888888</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group mt-3">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section> -->
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="site-footer">
    <div class="bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-xs-12 text-lg-start text-center">
            <p class="copyright-text">
              &copy; Copyright <strong>UMKM</strong>. Kalipare
            </p>
            <div class="credits">
              <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bell
            -->
              <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            </div>
          </div>

          <div class="col-lg-6 col-xs-12 text-lg-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#hero">Home</a>
              </li>

              <li class="list-inline-item">
                <a href="#about">Tentang Kami</a>
              </li>

              <li class="list-inline-item">
                <a href="#features">Fitur</a>
              </li>

              <li class="list-inline-item">
                <a href="#portfolio">Portofolio</a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/'); ?>/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url('assets/'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/'); ?>/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('assets/'); ?>/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/'); ?>/js/main.js"></script>

</body>

</html>