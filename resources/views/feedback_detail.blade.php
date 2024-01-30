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
                <img class="my-2" src="/logo.png" alt="LOGO" style="width: 25%;">
                <h3>Detail Umpan Balik</h2>
                {{-- <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('home.feedback') }}">Feedback</a></li>
            <li>Detail</li>
            </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        {{-- <div class="section-header">
          <span>Feedback</span>
          <h2>Umpan Balik (feedback)</h2>
          <h5>semua umpan balik masyarakat terhadap pelayanan oleh Satlantas Polres Minahasa</h5>

        </div> --}}
      <div class="container ">
        <div class="row d-flex justify-content-center gy-4 ">
          <div class="col-lg-8 shadow rounded p-3 mt-5">

            <img src="{{ asset('storage/'. $feedback->gbr_pendukung) }}" class=" img-fluid my-2 mx-auto d-flex rounded" alt="Image" style="width: 70%">
            <p class="my-5">{!! $feedback->konten !!}</p>
              
            </div> <!-- End Col-->
        </div> <!-- End ROw-->
      </div>
      </div>
    </section><!-- End Services Section -->


  </main><!-- End #main -->
@endsection