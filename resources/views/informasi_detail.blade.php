@extends('layouts_home.master')

@section('content')
<main id="main">

  <!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="hero page-header d-flex align-items-center" style="background-color:#0E1D34;">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8 text-center">
            <img class="my-3" src="/logo.png" alt="LOGO" style="width: 80px; border-radius:10px;">
            <h2 class="text-white mt-3">Detail Informasi</h2>
          </div>
        </div>
      </div>
    </div>

    <nav class="bg-light py-2">
      <div class="container">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('home.informasi') }}">Informasi</a></li>
          <li class="breadcrumb-item active">Detail</li>
        </ol>
      </div>
    </nav>
  </div>
  <!-- End Breadcrumbs -->

  <!-- Detail Informasi -->
  <section id="service" class="services pt-4">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center">
        <div class="col-lg-10">

          <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
            @if ($info->gbr_pendukung)
              {{-- <div class="w-100" style="max-height: 400px; overflow: hidden;"> --}}
              <div class="w-100" style="overflow: hidden;">
                <img src="{{ asset('storage/'. $info->gbr_pendukung) }}" alt="Gambar" class="img-fluid w-100 h-auto object-fit-cover">
              </div>
            @endif

            <div class="card-body p-4">
              <h2 class="card-title mb-4 text-center">{{ $info->judul }}</h2>

              <div class="card-text" style="text-align: justify;">
                {!! $info->konten !!}
              </div>

              <div class="text-end mt-4">
                <a href="{{ route('home.informasi') }}" class="btn btn-outline-primary rounded-pill">
                  <i class="bi bi-arrow-left"></i> Kembali ke Informasi
                </a>
              </div>
            </div>

          </div>

        </div>
      </div>

    </div>
  </section>
  <!-- End Detail Informasi -->

</main>
@endsection
