@extends('_layouts.master')

@section('content')
    

    <!-- ======= Hero Section ======= -->
        <div class="row">
            <div class="col-6">
                    <section id="hero" class="d-flex flex-column justify-content-center">
                        <div class="container" data-aos="zoom-in" data-aos-delay="100">
                            <h1>Selamat Datang</h1>
                            <p>Petugas, {{ auth()->user()->fullname }} </p>
                            <p>Kasatlantas Polres Minahasa</p>
                            {{-- <div class="social-links">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div> --}}
                        </div>
                    </section><!-- End Hero -->
            </div>
            <div class="col-6 my-2 d-flex flex-column justify-content-center">
                <img src="/logo.png" class="img-fluid mx-auto" alt="Logo" style="width:50%;">
            </div>
                
        
        </div>

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Informasi Publik</h2>
                </div> <!-- End Section-->
            </div>
            
        

        <div class="container">
                <div class="row">
                    {{-- <div class="col-2"></div> --}}
                    <div class="col-lg-8 rounded shadow-lg p-3 bg-body mx-auto">
                        {{-- <h2 class="text-center">testing</h2> --}}
                        <a href="{{ route('admin.informasi.create') }}" class="btn btn-primary justify-content-start my-3">Informasi Baru</a>
                        <table id="informasi_publik" class="display cell-border mb-5" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Informasi</th>
                                    <th class="text-center">Operasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($information as $info)
                                <tr>
                                   
                                    <td class="text-center"> {{ $info->judul }}</td>
                                    
                                    <td class="text-center">
                                        <a href="{{ route('admin.informasi.update', $info->slug) }}" class="mx-2"><i class="bi bi-pencil" style="color: orange"></i></i></a>
                                        {{-- <a href="" class="mx-2"><i class="bi bi-trash" style="color: red"></i></a> --}}
                                        <form action="{{ route('admin.informasi.destroy', $info->slug) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="mx-2 border-0 " onclick="return confirm('Yakin mau hapus ?')"><i class="bi bi-trash" style="color: red"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="col-2"></div> --}}
                </div>
        </div> <!-- End Container-->
        
    </section><!-- End About Section -->

    

        <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
            <div class="container" data-aos="fade-up">
    
            <div class="section-title">
                <h2>Umpan Balik Masyarakat</h2>
                {{-- <p> testing.</p> --}}
            </div>
    
            <div class="row">
                {{-- <div class="col-lg-8 mx-auto rounded shadow p-3"> --}}
                <div class="col-lg-8 rounded shadow-lg p-3 bg-body mx-auto">
                    <table id="feedback" class="display mb-5 cell-border" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="text-center">Umpan Balik</th>
                                <th class="text-center">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($feedback as $list)
                            <tr>
                                {{-- <td><a href="#">{!! $list->konten !!}</a></td> --}}
                                <td> {!! substr($list->konten, 0, 100) !!} <a href="{{ route('admin.feedback.detail', $list->token) }}"> Selengkapnya</a></td>
                                
                                <td>{{ $list->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            
    
            </div>
        </section><!-- End Resume Section -->
        <br>
        <br>
    

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    {{-- <footer id="footer">
        <div class="container">
        <h3>Brandon Johnson</h3>
        <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
        <div class="social-links">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
        <div class="copyright">
            &copy; Copyright <strong><span>MyResume</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: [license-url] -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
        </div>
    </footer><!-- End Footer --> --}}

    @endsection

    @section('footer')
        <!-- Jquery CDN -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        
        <!-- Datatable src -->
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        
        <script>
            $(document).ready( function () {
                $('#informasi_publik').DataTable();
            } );
        </script>

        <script>
            $(document).ready( function () {
                $('#feedback').DataTable();
            } );
        </script>
    @endsection

