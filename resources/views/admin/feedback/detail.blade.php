@extends('_layouts.master')

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
                <h2 class="text-center">Detail Feedback</h2>
                <br>
                <img src="{{ asset('storage/'. $feedback->gbr_pendukung) }}" class=" img-fluid my-2 mx-auto d-flex rounded" alt="Image" style="width: 70%">
                <p class="my-5">{!! $feedback->konten !!}</p>
               
            </div>
        </div>
    </div>

    <br><br><br><br><br><br>
@endsection

