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
                <h3>Register Email</h2>
                {{-- <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Register</li>
            </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Registrasi Email</span>
          <h2>Registrasi Email</h2>
          <h5>untuk membuat umpan balik, silahkan registrasi email di bawah ini</h5>

        </div>
      <!-- New Container with custom width-->
        <div class="container justify-content-center  w-50">
          <form method="post"  action="{{ route('home.feedback.register.store') }}" >
          @csrf

            @error('email')
              <div class="is-invalid">
              <p style="color: red" class="d-flex text-left">{{ $message }}</p>
              </div>
            @enderror

            <div class="form-floating ">
              <input name="email" type="email" class="form-control" id="floatingInput" placeholder="18210120@unima.ac.id" autocomplete="off" value="{{ old('email') }}">
              <label for="floatingInput">Email</label>
            </div>

           <button type="submit" class="my-2 btn d-flex text-center float-right" style="color: #ffffff; background-color:#0E1D34">Registrasi</button>
          </form>
        </div>
      <!-- End of new container  -->
      </div>
    </section><!-- End Services Section -->


  </main><!-- End #main -->
@endsection