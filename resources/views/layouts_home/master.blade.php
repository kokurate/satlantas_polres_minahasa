<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Satlantas Polres Minahasa</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="/favicon.ico" rel="icon">
<link href="/logo.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="/templates/home/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/templates/home/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="/templates/home/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="/templates/home/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="/templates/home/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link href="/templates/home/assets/vendor/aos/aos.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="/templates/home/assets/css/main.css" rel="stylesheet">

<!-- =======================================================
* Template Name: Logis - v1.2.1
* Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->

@yield('header')
</head>

<body>

    <!-- Sweetalert-->
    @include('sweetalert::alert')

<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between " style="color: #0E1D34">

    <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="/logobig-removebg-preview.png" alt="Logo"> 
        {{-- <h1>Logis</h1> --}}
    </a>

    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    <nav id="navbar" class="navbar">
        <ul>
        <li><a href="/" class="active">Home</a></li>
        <li><a href="{{ route('home.informasi') }}">Informasi</a></li>
        <li><a href="{{ route('home.feedback') }}">Pengaduan</a></li>
        <li><a href="{{ route('home.kritik_saran') }}">Kritik dan Saran</a></li>
        {{-- <li><a href="#">About Us</a></li> --}}
        <!--    <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
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
            </li>
        -->    
        {{-- <li><a href="/templates/home/contact.html">Contact</a></li>
        <li><a class="get-a-quote" href="get-a-quote.html">Get a Quote</a></li> --}}
        </ul>
    </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<!-- End Header -->

@yield('content')


<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="container">
    <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
        <img src="/logobig.png" class="logo d-flex align-items-center">
            {{-- <span>Logis</span> --}}
        </img>
        {{-- <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p> --}}
        <div class="social-links d-flex mt-4">
            {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> --}}
            {{-- <a href="#" class="facebook"><i class="bi bi-facebook"></i></a> --}}
            <a href="https://www.instagram.com/polresminahasapresisi_official/" class="instagram"><i class="bi bi-instagram"></i></a>
            {{-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> --}}
        </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('home.informasi') }}">Informasi</a></li>
            <li><a href="{{ route('home.feedback') }}">Pengaduan</a></li>
            <li><a href="{{ route('home.kritik_saran') }}">Kritik & Saran</a></li>
            <li><a href="#">About Us</a></li>
            {{-- <li><a href="#">Privacy policy</a></li> --}}
        </ul>
        </div>

    <!--    
        <div class="col-lg-2 col-6 footer-links">
        <h4>Our Services</h4>
        <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
        </ul>
        </div>
    -->

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
        <h4>Contact Us</h4>
        <p>
            Jln. Manguni <br>
            No. 28, Tondano Barat,<br>
            Kabupaten Minahasa, <br>
            Sulawesi Utara <br><br>
            <strong>Telepon:</strong> (0431)321040<br>
            {{-- <strong>Email:</strong> info@example.com<br> --}}
        </p>

        </div>

    </div>
    </div>

    <div class="container mt-4">
    <div class="copyright">
        &copy; Copyright <strong><span>Logis</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
    </div>

</footer><!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="/templates/home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/templates/home/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="/templates/home/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/templates/home/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/templates/home/assets/vendor/aos/aos.js"></script>
<script src="/templates/home/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/templates/home/assets/js/main.js"></script>

@yield('footer')

</body>

</html>