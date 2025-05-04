@extends('layouts_home.master')

@section('content')
<main id="main">

  <!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="hero page-header d-flex align-items-center" style="background: #1A1A1A; color: #fff;">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <img src="/logo.png" alt="LOGO" class="my-3" style="width: 80px; border-radius: 10px;">
            <h3 class="text-white mt-3">Detail Pengaduan</h3>
          </div>
        </div>
      </div>
    </div>

    <nav class="bg-light py-2 shadow-sm">
      <div class="container">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('home.feedback') }}">Feedback</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
      </div>
    </nav>
  </div>
  <!-- End Breadcrumbs -->

  <!-- Detail Pengaduan Section -->
  <section id="service" class="services pt-5 pb-5">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-lg-8 shadow-lg rounded-4 overflow-hidden bg-light">
          <!-- Image Section -->
          @if ($feedback->gbr_pendukung)
            <div class="position-relative mb-4">
              <img src="{{ asset('storage/'. $feedback->gbr_pendukung) }}" alt="Gambar" class="img-fluid w-100 h-auto object-fit-cover rounded-3">
            </div>
          @endif

          <!-- Content Section -->
          <div class="card-body p-4">
            <h2 class="card-title text-center mb-4" style="color: #333;">{{ $feedback->judul }}</h2>

            <div class="card-text" style="text-align: justify; color: #444;">
              {!! $feedback->konten !!}
            </div>

            <!-- Created At Section -->
            <div class="mt-5 text-muted text-center" style="font-size: 0.875rem;">
              <strong>Dibuat pada:</strong> 
              <span>{{ \Carbon\Carbon::parse($feedback->created_at)->isoFormat('dddd, D MMMM YYYY') }}</span>
            </div>

            <!-- Back Button -->
            <div class="text-end mt-4">
              <a href="{{ route('home.feedback') }}" class="btn btn-outline-dark rounded-pill px-4 py-2">
                <i class="bi bi-arrow-left"></i> Kembali ke Pengaduan
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Detail Pengaduan Section -->

</main>
@endsection
