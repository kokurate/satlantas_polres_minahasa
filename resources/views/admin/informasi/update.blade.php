@extends('_layouts.master')

@section('header')
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script> 
    {{-- Menghilangkan CSS Attach File Pada Trix Editor --}}
    {{-- <style>
    trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
    }
    </style> --}}
@endsection

@section('content')
    <br><br>
    <div class="container my-3">
        <div class="row">
            <div class="col-8 mx-auto rounded shadow p-3">

                <a href="{{ route('admin.index') }}" class="btn btn-primary" >
                    {{-- <i class="bi bi-arrow-left-square-fill" style="width:100px;"></i> --}}
                    <i class="bi bi-arrow-left" ></i>
                </a>

                <img src="/logo.png" class="mx-auto d-flex justify-content-center mx-2" alt="Logo" style="width: 15%;">
                <h2 class="text-center">Update Informasi</h2>
                    <form method="post" action="{{ route('admin.informasi.update.store', $information->slug) }}" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('patch') --}}

                          <!-- Judul -->
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input id="judul" type="text" name="judul" value="{{ old('judul', $information->judul) }}" class="form-control @error('judul') is-invalid @enderror">
                            @error('judul')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div> 

                        <div class="mb-3">
                            {{-- <input class="form-control" type="text" placeholder="Slug" aria-label="Disabled input example" disabled> --}}
                            <label for="slug" class="form-label">Slug</label>
                            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', $information->slug) }}"  readonly>
                        </div>

                        <!-- Konten -->
                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten</label>
                            @error('konten')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="konten" 
                            type="hidden" 
                            name="konten" 
                            value="{{ old('konten', $information->konten) }}" >
                            <!-- End Input -->
                            <trix-editor input="konten"></trix-editor>
                        </div>  
                    
                        <!-- Upload Image  -->
                        <div class="mb-3">
                            <label for="gbr_pendukung" class="form-label" ><span style="color: #ff0000">*</span> Image</label>
                            <input type="hidden" name="oldImage" value="{{ $information->gbr_pendukung }}">
                            {{-- Deklarasi Javascript untuk preview --}}
                            @if($information->gbr_pendukung)
                                <img src="{{ asset('storage/'. $information->gbr_pendukung ) }}" class="img-preview-visitor-1 img-fluid mb-3 col-sm-3 d-block">
                            @else
                                <img class="img-preview-visitor-1 img-fluid mb-3 col-sm-3">
                            @endif      
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
                
            
                    <button type="submit" class="btn btn-primary float-right">Update Informasi</button>
                    </form>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br>
@endsection


@section('footer')
    {{-- Menghilangkan fungsi dari attach file pada trix editor --}}
    {{-- <script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault()
    })
    </script> --}}

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

    <!-- For Slug using fetch api -->
    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function(){
            fetch('/admin/informasi/checkSlug?judul=' + judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });
    </script>
@endsection