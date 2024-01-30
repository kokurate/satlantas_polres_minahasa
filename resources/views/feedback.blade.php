@extends('layouts_home.master')

@section('header')
<!-- Data table src-->
  <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
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
                <img class="my-2" src="/logo.png" alt="LOGO" style="width: 25%;">
                <h3>Umpan Balik (<i>feedback</i>)</h2>
                {{-- <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li>Feedback</li>
            </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Feedback</span>
          <h2>Umpan Balik (feedback)</h2>
          <h5>semua umpan balik masyarakat terhadap pelayanan oleh Satlantas Polres Minahasa</h5>

        </div>
      <div class="container">
        <div class="row d-flex justify-content-center gy-4 ">
          <div class="col-lg-8">

            <a href="{{ route('home.feedback.register') }}" class="btn justify-content-start my-2" style="background-color:#0E1D34; color:#ffffff">Feedback Baru</a>
              <table id="table_id" class="display mb-5">
                  <thead>
                      <tr>
                          <th class="text-center">Umpan Balik</th>
                          <th class="text-center">Email</th>
                      </tr>
                  </thead>
                  <tbody>
                    @forelse ($feedback as $list)
                    <?php 
                      $target = $list->email ;
                      $count = strlen($target) - 10;
                      $output = substr_replace($target, str_repeat('*', $count), 4, $count);
                    ?>
                      <tr>
                          {{-- <td><a href="#">{!! $list->konten !!}</a></td> --}}
                          <td> {!! substr($list->konten, 0, 100) !!} <a href="{{ route('home.feedback.detail', $list->token) }}"> Selengkapnya</a></td>
                          
                          {{-- <td>{{ $list->email }}</td> --}}
                          <td>{{ $output }}</td>
                      </tr>
                    @empty

                    @endforelse
                  </tbody>
              </table>
            </div> <!-- End Col-->
        </div> <!-- End ROw-->
      </div>
      </div>
    </section><!-- End Services Section -->


  </main><!-- End #main -->
@endsection

@section('footer')
  <!-- Jquery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  
  <!-- Datatable src -->
  <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <script>
      $(document).ready( function () {
          $('#table_id').DataTable();
      } );
  </script>
@endsection