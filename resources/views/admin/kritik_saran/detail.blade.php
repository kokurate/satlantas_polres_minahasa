@extends('_layouts.master')

@section('content')
<br><br>
<div class="container my-3">
    <div class="row">
        <div class="col-10 mx-auto rounded shadow p-4 bg-white">
            <a href="{{ route('admin.index') }}" class="btn btn-primary mb-3">
                <i class="bi bi-arrow-left"></i> Back
            </a>

            <div class="text-center mb-4">
                <img src="/logo.png" alt="Logo" style="width: 15%;">
                <h2 class="mt-3">Detail Kritik & Saran</h2>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-black text-white text-center">
                    <h4 class="mb-0">{{ $kritik_saran->judul }}</h4> 
                </div>
                <div class="card-body p-0">
                  <table class="table mb-0 table-striped">
                    <tbody>
                        <tr>
                            <td class="text-left" style="width: 20%;"><b>Email </b></td>
                            <td style="width: 2%; text-align: center;">:</td>
                            <td>{{ $kritik_saran->email }}</td>
                        </tr>
                        <tr>
                            <td class="text-left" style="width: 20%;"><b>Nama </b></td>
                            <td style="width: 2%; text-align: center;">:</td>
                            <td>{{ $kritik_saran->nama }}</td>
                        </tr>
                        <tr>
                            <td class="text-left" style="width: 20%;"><b>Alamat </b></td>
                            <td style="width: 2%; text-align: center;">:</td>
                            <td>{{ $kritik_saran->alamat }}</td>
                        </tr>
                        <tr>
                            <td class="text-left" style="width: 20%;"><b>Kritik & Saran</b></td>
                            <td style="width: 2%; text-align: center;">:</td>
                            <td>{!! $kritik_saran->konten !!}</td>
                        </tr>
                    </tbody>
                </table>
                
                </div>
            </div>

        </div>
    </div>
</div>
<br><br><br><br><br><br>
@endsection
