@extends('_layouts.master')

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
    <div class="container my-5">
        <div class="row">
            <!-- Bagian Kiri - Menampilkan Data -->
            <div class="col-lg-6 my-4">
                <div class="rounded shadow-lg p-4 bg-white">
                    <a href="{{ route('admin.index') }}" class="btn btn-outline-primary mb-4">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <div class="text-center mb-4">
                        <img src="/logo.png" class="img-fluid" alt="Logo" style="max-width: 120px; border-radius: 10px;">
                    </div>
                    <h2 class="text-center text-dark mb-3 font-weight-bold">{{ $information->judul }}</h2>

                    <!-- Gambar Pendukung -->
                    <div class="mb-3 text-center">
                        @if($information->gbr_pendukung)
                            <img src="{{ asset('storage/'. $information->gbr_pendukung) }}" class="img-fluid rounded shadow" alt="Image" style="max-width: 80%; height: auto;">
                        @else
                            <p>No image available</p>
                        @endif
                    </div>

                    <!-- Konten -->
                    <div class="mb-3">
                        <p>{!! $information->konten !!}</p>
                    </div>
                    
                </div>
            </div>

            <!-- Bagian Kanan - Formulir Edit -->
            <div class="col-lg-6 my-4">
                <div class="rounded shadow-lg p-4 bg-white">
                    <h3 class="text-center text-dark mb-4">Update Informasi</h3>
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

                        <!-- Slug -->
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', $information->slug) }}" readonly>
                        </div>

                        <!-- Konten -->
                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten</label>
                            @error('konten')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="konten" type="hidden" name="konten" value="{{ old('konten', $information->konten) }}">
                            <trix-editor input="konten"></trix-editor>
                        </div>  

                        <!-- Upload Image -->
                        <div class="mb-3">
                            <label for="gbr_pendukung" class="form-label"><span style="color: #ff0000">*</span> Image</label>
                            <input type="hidden" name="oldImage" value="{{ $information->gbr_pendukung }}">
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
                            @error('gbr_pendukung')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tombol Update -->
                        <button type="submit" class="btn btn-primary d-block w-100 mt-4">Update Informasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')
    {{-- Menghilangkan fungsi dari attach file pada trix editor --}}
    {{-- <script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault()
    })
    </script> --}}

    <script>
        // Preview Image
        function previewGbr_Pendukung() {
            const image = document.querySelector('#gbr_pendukung');
            const imgPreview = document.querySelector('.img-preview-visitor-1');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        // For Slug using fetch API
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function() {
            fetch('/admin/informasi/checkSlugInformation?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection