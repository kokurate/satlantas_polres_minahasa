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
                <h2 class="text-center">Detail Kritik & Saran</h2>
                <br>
                
                
                <div class="container py-5">
                    <div class="card">
                      <div class="card-header text-center">
                        <h4>Judul</h4>
                      </div>
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item"><strong>Email:</strong> contoh@email.com</li>
                          <li class="list-group-item"><strong>Nama:</strong> Budi Santoso</li>
                          <li class="list-group-item"><strong>Alamat:</strong> Jl. Raya Minahasa No.123</li>
                          <li class="list-group-item"><strong>Kritik dan Saran:</strong> Website perlu ditingkatkan kecepatan aksesnya dan diperbarui informasi layanan secara berkala.</li>
                        </ul>
                      </div>
                    </div>
                  </div>

            </div>
        </div>
    </div>

    <br><br><br><br><br><br>
@endsection

