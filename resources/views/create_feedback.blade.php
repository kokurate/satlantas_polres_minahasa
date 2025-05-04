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
                <img class="my-2" src="/logo.png" alt="LOGO" style="width: 25%;">
                <h3>Tambah Pengaduan</h2>
                {{-- <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('home.feedback') }}">Pengaduan</a></li>
            <li>Create</li>
            </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Pengaduan</span>
          <h2>Tambah</h2>
          <h5>Lengkapi form di bawah ini untuk menambahkan Pengaduan</h5>

        </div>
        </div>


      <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <form method="post" action="{{ $url_token }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3">
                            <h5 style="color:rgb(99, 99, 99) ">Email : {{ $feedback->email }}</h5>
                        </div> 
                    
                    
                    
                        <!-- Konten -->
                        <div class="mb-3">
                            <label for="konten" class="form-label"><span style="color: #ff0000">*</span> konten</label>
                            @error('konten')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="konten" 
                            type="hidden" 
                            name="konten" 
                            value="{{ old('konten') }}" >
                            <!-- End Input -->
                            <trix-editor input="konten"></trix-editor>
                        </div>  
                    
                        <!-- Upload Image  -->
                        <div class="mb-3">
                            <label for="gbr_pendukung" class="form-label" ><span style="color: #ff0000">*</span> Image</label>
                            {{-- Deklarasi Javascript untuk preview --}}
                            <img class="img-preview-visitor-1 img-fluid mb-3 col-sm-3">
                            <input 
                            class="form-control @error('gbr_pendukung') is-invalid @enderror" 
                            type="file" id="gbr_pendukung" 
                            name="gbr_pendukung" 
                            onchange="previewGbr_Pendukung();">
                            <!-- End Input -->
                            @error('gbr_pendukung')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                
            
                    <button type="submit" class="btn btn-primary float-right">Tambah Pengaduan</button>
                    </form>
                </div> <!-- End Col -->
            </div> <!-- End Row-->        

        </div> <!-- End Container-->

    </section><!-- End Services Section -->

    


  </main><!-- End #main -->
@endsection

@section('footer')
    {{-- Menghilangkan fungsi dari attach file pada trix editor --}}
    <script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault()
    })
    </script>

    <script>
         // Preview Image 1
         function previewGbr_Pendukung(){
                const image = document.querySelector('#gbr_pendukung');
                const imgPreview = document.querySelector('.img-preview-visitor-1');
                imgPreview.style.display = 'block';
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);
                oFReader.onload = function(oFREvent){
                    imgPreview.src = oFREvent.target.result;
                }
            }
    </script>
@endsection