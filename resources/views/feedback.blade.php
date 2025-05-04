@extends('layouts_home.master')

@section('header')
  <!-- Data table src-->
  <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
  <style>
    /* Styling untuk DataTable yang lebih modern */
    .dataTables_wrapper .dataTables_filter input {
      margin-left: 0.5rem;
      border-radius: 50px;
      border: 1px solid #ddd;
      padding: 0.5rem;
    }

    .dataTables_wrapper .dataTables_length select {
      border-radius: 50px;
      border: 1px solid #ddd;
      padding: 0.5rem;
    }

    table.dataTable thead th {
      background-color: #0E1D34;
      color: #ffffff;
      font-weight: bold;
    }

    table.dataTable tbody tr:hover {
      background-color: #f1f1f1;
    }

    table.dataTable td {
      vertical-align: middle;
    }

    /* Styling untuk tombol feedback baru */
    .btn-feedback {
      background-color: #0E1D34;
      color: #ffffff;
      font-size: 14px;
      padding: 10px 20px;
      border-radius: 25px;
      transition: background-color 0.3s ease;
      display: inline-block;
      text-align: center;
      margin-bottom: 1rem;
    }

    .btn-feedback:hover {
      background-color: #12345b;
    }

    /* Style untuk memusatkan konten */
    .text-center-custom {
      text-align: center;
    }
  </style>
@endsection

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="hero page-header d-flex align-items-center" style="background-color:#0E1D34;">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <img class="my-2" src="/logo.png" alt="LOGO" style="width: 25%;">
            <h3 class="text-white">Pengaduan</h3>
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

  <!-- ======= Feedback Section ======= -->
  <section id="feedback" class="services pt-0">
    <div class="container" data-aos="fade-up">
      <div class="section-header text-center mb-4">
        <span>Pengaduan</span>
        <h2>Pengaduan</h2>
        <h5>Semua Pengaduan masyarakat terhadap pelayanan oleh Satlantas Polres Minahasa</h5>
      </div>

      <div class="container">
        <!-- Tombol feedback baru di tengah -->
        <div class="text-center-custom">
          <a href="{{ route('home.feedback.register') }}" class="btn-feedback">Tambahkan Pengaduan Baru</a>
        </div>

        <div class="row d-flex justify-content-center gy-4">
          <div class="col-lg-12">
            <table id="table_id" class="display table table-striped table-bordered table-hover mb-5">
              <thead>
                <tr>
                  <th class="text-center">Pengaduan</th>
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
                    <td> {!! substr($list->konten, 0, 100) !!} <a href="{{ route('home.feedback.detail', $list->token) }}" class="text-decoration-none text-primary"> Selengkapnya</a></td>
                    <td>{{ $output }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="2" class="text-center">Tidak ada Pengaduan saat ini.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Feedback Section -->

</main><!-- End #main -->
@endsection

@section('footer')
  <!-- Jquery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  
  <!-- Datatable src -->
  <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <script>
      $(document).ready( function () {
          $('#table_id').DataTable({
            paging: true,    // Enable paging
            searching: true, // Enable searching/filtering
            responsive: true // Make it responsive
          });
      });
  </script>
@endsection
