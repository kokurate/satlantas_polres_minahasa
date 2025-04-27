@extends('_layouts.master')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-10 rounded shadow-lg p-5 bg-light" style="border-radius: 15px; background-color: #f9fafb;">
                <!-- Tombol Kembali -->
                <a href="{{ route('admin.index') }}" class="btn btn-primary mb-4 shadow-sm" style="border-radius: 30px; transition: all 0.3s ease;">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>

                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="/logo.png" class="img-fluid" alt="Logo" style="max-width: 120px; border-radius: 10px;">
                </div>

                <!-- Title -->
                <h2 class="text-center mb-3 font-weight-bold text-dark" style="font-size: 2rem;">Detail Feedback</h2>

                <!-- Gambar Pendukung -->
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/'. $feedback->gbr_pendukung) }}" class="img-fluid rounded shadow" alt="Image" style="max-width: 80%; height: auto; border: 2px solid #939597; border-radius: 50px;">
                </div>

                <!-- Konten Feedback -->
                <div class="feedback-content mb-4">
                    <p class="font-italic text-muted" style="font-size: 1.1rem;">{!! $feedback->konten !!}</p>
                </div>

                <!-- Info Pengirim -->
                <div class="info-box d-flex justify-content-between mb-4" style="border-top: 1px solid #e0e0e0; padding-top: 20px;">
                    <div class="info-item" style="flex: 1; padding: 10px;">
                        <strong class="text-dark">Email:</strong>
                        <p class="text-muted">{{ $feedback->email }}</p>
                    </div>
                    <div class="info-item" style="flex: 1; padding: 10px;">
                        <strong class="text-dark">Dibuat Tanggal:</strong>
                        <p class="text-muted">{{ \Carbon\Carbon::parse($feedback->created_at)->isoFormat('dddd, D MMMM YYYY') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>
@endsection
