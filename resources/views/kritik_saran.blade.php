@extends('layouts_home.master')

@section('header')
 {{-- Trix Editor --}}
 <link rel="stylesheet" type="text/css" href="/css/trix.css">
 <script type="text/javascript" src="/js/trix.js"></script> 
 {{-- Menghilangkan CSS Attach File Pada Trix Editor --}}
 <style>
   trix-toolbar [data-trix-button-group="file-tools"]{
     display: none;
   }
 </style>
@endsection


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
                <h3><u>Kritik & Saran</u></h3>
                {{-- <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li>Kritik & Saran</li>
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
          <span>Kritik & Saran</span>
          <h2>Kritik & Saran</h2>
          <h5>Kami berkomitmen untuk terus meningkatkan kualitas pelayanan kami kepada masyarakat.
            Apabila Anda memiliki kritik, saran, atau masukan terkait pelayanan maupun informasi yang disajikan melalui website Satlantas Polres Minahasa, kami sangat menghargai partisipasi Anda.
            <br>
            <br>
            Silakan sampaikan kritik dan saran Anda dengan santun dan membangun.
            Setiap masukan akan menjadi bahan evaluasi kami untuk memberikan pelayanan yang lebih baik, cepat, dan profesional</h5>

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
        {{-- <div class="row gy-4">
        
            <div class="d-flex justify-content-center"> 
              <h1 class="text-center">Belum Ada Informasi</h1>


            </div> --}}

              <!-- ======= Services Section ======= -->
                <section id="service" class="services pt-0">
                    <div class="container" data-aos="fade-up">
            
                    <div class="section-header">
                        {{-- <span>Masukkan Data Anda</span> --}}
                        <h5>Silahkan masukkan pada form di bawah ini</h5>
            
                    </div>
                    <!-- New Container with custom width-->
                    <div class="container justify-content-center">
                        <form method="post" action="{{ route('home.kritik_saran.store') }}" enctype="multipart/form-data">
                            @csrf
                        
                            {{-- Email --}}
                            <div class="form-floating mb-3">
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" autocomplete="off" value="{{ old('email') }}">
                                <label for="email">Email</label>
                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        
                            {{-- Nama --}}
                            <div class="form-floating mb-3">
                                <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" autocomplete="off" value="{{ old('nama') }}">
                                <label for="nama">Nama</label>
                                @error('nama')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        
                            {{-- Alamat --}}
                            <div class="form-floating mb-3">
                                <input name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" autocomplete="off" value="{{ old('alamat') }}">
                                <label for="alamat">Alamat</label>
                                @error('alamat')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        
                            {{-- Judul --}}
                            <div class="mb-3 form-floating">
                                <input id="judul" type="text" name="judul" value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror">
                                <label for="judul">Judul</label>
                                @error('judul')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            {{-- Slug --}}
                            <div class="mb-3 form-floating">
                                <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" id="slug" value="{{ old('slug') }}" readonly>
                                <label for="slug">Slug</label>
                                @error('slug')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            {{-- Konten --}}
                            <div class="mb-3">
                                <label for="konten" class="form-label"><span style="color: #ff0000">*</span> Kritik & Saran</label>
                                <input id="konten" type="hidden" name="konten" value="{{ old('konten') }}">
                                <trix-editor input="konten"></trix-editor>
                                @error('konten')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <button type="submit" class="my-2 btn d-flex text-center float-right" style="color: #ffffff; background-color:#0E1D34">Submit</button>
                        </form>
                    </div>
                    <!-- End of new container  -->
                    </div>
                </section><!-- End Services Section -->

       
        {{-- </div> <!-- End Row --> --}}

      </div>
    </section><!-- End Services Section -->


  </main><!-- End #main -->
@endsection

@section('footer')
  
    <!-- For Slug using fetch api -->
    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function(){
            fetch('/kritik-saran/checkSlugKritikSaran?judul=' + judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });
    </script>
@endsection