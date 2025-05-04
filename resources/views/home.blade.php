@extends('layouts_home.master')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
    <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">Website Informasi dan Umpan Balik Masyarakat <span style="color: #EDBE10">SATLANTAS POLRES MINAHASA</span></h1>
        <p data-aos="fade-up" data-aos-delay="100"  style="font-size: 24px;">Tempat terpercaya untuk mendapat informasi terkait layanan dan wadah untuk menyuarakan umpan balik ke <span style="color: #EDBE10">Satlantas Polres Minahasa</span></p>

        <div class="text-center text-lg-start">
           
                <a href="{{ route('home.informasi') }}"><p data-aos="fade-up" data-aos-delay="200" class="btn btn-primary mx-2"> Informasi Publik </p></a>
           
           
               <a href="{{ route('home.kritik_saran') }}"><p data-aos="fade-up" data-aos-delay="200" class="btn btn-primary mx-2"> Umpan Balik </p></a> 
           
        </div>

        <!--    <form action="#" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
                <input type="text" class="form-control" placeholder="ZIP code or CitY">
                <button type="submit" class="btn btn-primary">Search</button>
                </form>
        -->

        
        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
        <img src="/logo.png" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

    </div>
    </div>
</section><!-- End Hero Section -->

@endsection
