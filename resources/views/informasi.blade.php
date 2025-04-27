@extends('layouts_home.master')

@section('header')
  <!-- CSS tambahan untuk efek -->
  <style>
    .transition-effect {
      transition: all 0.4s ease;
      background: #ffffff;
      border: 1px solid rgba(0, 0, 0, 0.05);
      box-shadow: 0 2px 5px rgba(0,0,0,0.05), 0 8px 20px rgba(0,0,0,0.08);
      border-radius: 1rem;
    }
    
    .transition-effect:hover {
      transform: scale(1.02);
      box-shadow: 0 4px 10px rgba(0,0,0,0.08), 0 12px 25px rgba(0,0,0,0.15);
    }
    </style>
    
@endsection


@section('content')
<main id="main">

  <!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="hero page-header d-flex align-items-center" style="background-color:#0E1D34;">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <img src="/logo.png" alt="LOGO" style="width: 80px; border-radius:10px;">
            <h3 class="text-white mt-3"><u>Informasi Publik</u></h3>
          </div>
        </div>
      </div>
    </div>
    <nav class="bg-light py-2">
      <div class="container">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Informasi Publik</li>
        </ol>
      </div>
    </nav>
  </div>
  <!-- End Breadcrumbs -->

  <!-- Informasi Publik Section -->
  <section id="service" class="services pt-4">
    <div class="container" data-aos="fade-up">

      <div class="section-header mb-5 text-center">
        <span>Informasi Publik</span>
        <h2>Informasi Publik</h2>
        <h5>Informasi Berbagai Layanan Oleh Satlantas Polres Minahasa</h5>
      </div>

      <div class="row gy-4">
        @forelse($information as $info)
          <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="card w-100 shadow-lg border-0 rounded-4 overflow-hidden d-flex flex-column transition-effect" style="transition: all 0.3s ease;">
              <div class="card-img position-relative" style="height: 250px; overflow: hidden;">
                <img src="{{ asset('storage/'. $info->gbr_pendukung) }}" alt="{{ $info->judul }}" class="img-fluid w-100 h-100 object-fit-cover">
              </div>
              <div class="card-body d-flex flex-column p-4">
                <h5 class="card-title mb-2" style="min-height: 3rem; overflow: hidden;">
                  <a href="{{ route('home.informasi.detail', $info->slug) }}" class="text-decoration-none text-dark">
                    {{ Str::limit($info->judul, 80) }}
                  </a>
                </h5>
                <p class="card-text flex-grow-1">{!! Str::limit(strip_tags($info->konten), 100) !!}</p>

                <div class="mt-3 text-end">
                  <a href="{{ route('home.informasi.detail', $info->slug) }}" class="btn btn-sm btn-outline-primary rounded-pill">
                    Lihat Detail <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="d-flex justify-content-center">
            <h1 class="text-center">Belum Ada Informasi</h1>
          </div>
        @endforelse
      </div>

    </div>
  </section>
  <!-- End Informasi Publik Section -->

</main>


@endsection

