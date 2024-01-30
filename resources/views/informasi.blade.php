@extends('layouts_home.master')



@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      {{-- <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg'); color:#0E1D34;"> --}}
      <div class="hero page-header d-flex align-items-center" style="background-color:#0E1D34;">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
                <img src="/logo.png" alt="LOGO" style="width: 25%;">
                <h3><u>Informasi Publik</u></h3>
                {{-- <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li>Informasi Publik</li>
            </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Featured Services Section ======= -->
    {{-- <section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-cart-flatbed"></i></div>
            <div>
              <h4 class="title">Lorem Ipsum</h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-truck"></i></div>
            <div>
              <h4 class="title">Dolor Sitema</h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
              <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-truck-ramp-box"></i></div>
            <div>
              <h4 class="title">Sed ut perspiciatis</h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
              <a href="service-details.html" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section> --}}
    <!-- End Featured Services Section -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Informasi Publik</span>
          <h2>Informasi Publik</h2>
          <h5>Informasi Berbagai Layanan Oleh Satlantas Polres Minahasa</h5>

        </div>

        <!-- 
        <div class="w-75 mx-auto mb-5">
          <form action=" ">                                
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Masukkan Kata Kunci" aria-describedby="button-addon2">
              <button class="btn btn-outline-primary mb-0" type="submit" id="button-addon2">Pencarian</button>
            </div>
          </form>
        </div>
      -->
        <div class="row gy-4">
          @forelse($information as $info)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
                <div class="card-img">
                  <img src="{{ asset('storage/'. $info->gbr_pendukung) }}" alt="Gambar" class="img-fluid">
                </div>
                <h3><a href="{{ route('home.informasi.detail', $info->slug) }}" class="stretched-link">{{ $info->judul }}</a></h3>
                {{-- <p class="mt-2">{!! substr($info->konten, 0, 220) !!} <a href=""> Selengkapnya</a></p> --}}
                {{-- <p>{{ $info->judul }}</p> --}}
              </div>
            </div><!-- End Card Item -->
          @empty
            <div class="d-flex justify-content-center"> 
              <h1 class="text-center">Belum Ada Informasi</h1>
            </div>
          @endforelse




          

        </div> <!-- End Row -->

      </div>
    </section><!-- End Services Section -->


  </main><!-- End #main -->
@endsection