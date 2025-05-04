<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MyResume Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/logo.png" rel="icon">
  <link href="/favicon.ico" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/templates/auth/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/templates/auth/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/templates/auth/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/templates/auth/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/templates/auth/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/templates/auth/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/templates/auth/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyResume - v4.9.2
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
  <!-- Data table src-->
  <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">

  @yield('header')

</head>

<body>
 <!-- Sweetalert-->
 @include('sweetalert::alert')

    <!-- ======= Mobile nav toggle button ======= -->
        <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
        <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
        <!-- ======= Header ======= -->
        <header id="header" class="d-flex flex-column justify-content-center">

            <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="{{ route('admin.index', '#hero') }} " class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
                <li><a href="{{ route('admin.index', '#about') }} " class="nav-link scrollto"><i class="bx bx-user"></i> <span>Informasi Publik</span></a></li>
                <li><a href="{{ route('admin.index', '#resume') }} " class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Pengaduan Masyarakat</span></a></li>
                <li><a href="{{ route('admin.index', '#kritiksarantop') }} " class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Kritik & Saran</span></a></li>
                <li><a href="{{ route('register') }}" class="nav-link scrollto"><i class="bx bx-plus"></i> <span>Register</span></a></li> 
                <li>
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-primary btn-sm mb-0 w-100 mx-1"><span>Log Out</span> </button>
                </form> 
                </li>
                {{-- <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li> --}}
                
            </ul>
            </nav><!-- .nav-menu -->

        </header><!-- End Header -->

@yield('content')

<div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/templates/auth/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/templates/auth/assets/vendor/aos/aos.js"></script>
  <script src="/templates/auth/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/templates/auth/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/templates/auth/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/templates/auth/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/templates/auth/assets/vendor/typed.js/typed.min.js"></script>
  <script src="/templates/auth/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="/templates/auth/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/templates/auth/assets/js/main.js"></script>

    @yield('footer')

</body>

</html>