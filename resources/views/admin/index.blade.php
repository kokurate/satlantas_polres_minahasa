@extends('_layouts.master')

@section('content')

<!-- ======= Hero Section ======= -->
<div class="row">
    <div class="col-6">
            <section id="hero" class="d-flex flex-column justify-content-center">
                <div class="container" data-aos="zoom-in" data-aos-delay="100">
                    <h1>Selamat Datang</h1>
                    <p>{{ auth()->user()->fullname }} </p>
                    <p>{{ auth()->user()->pangkat ?? '' }} Polres Minahasa</p>
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

<main id="main" class="bg-light">

    <!-- Informasi Publik -->
    <section class="py-5" id="about">
        <div class="container" data-aos="fade-up">
            <div class="mb-4 text-center">
                <h2 class="fw-bold">📰 Informasi Publik</h2>
                <p class="text-muted">Data informasi yang tersedia untuk masyarakat.</p>
            </div>

            <div class="card border-0 shadow rounded-4 p-4 bg-white">
                <div class="text-end mb-3">
                    <a href="{{ route('admin.informasi.create') }}" class="btn btn-primary rounded-pill px-4">+ Tambah Informasi</a>
                </div>

                <div class="table-responsive">
                    <table id="informasi_publik" class="table align-middle table-hover">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($information as $info)
                                <tr>
                                    <td class="text-center">{{ $info->judul }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.informasi.update', $info->slug) }}" class="btn btn-warning btn-sm rounded-pill">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.informasi.destroy', $info->slug) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('Yakin mau hapus?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Pengaduan -->
    <section class="py-5 bg-white" id="resume">
        <div class="container" data-aos="fade-up">
            <div class="mb-4 text-center">
                <h2 class="fw-bold">📩 Pengaduan Masyarakat</h2>
                <p class="text-muted">Pengaduan yang dikirimkan oleh masyarakat.</p>
            </div>

            <div class="card border-0 shadow rounded-4 p-4 bg-light">
                <div class="table-responsive">
                    <table id="feedback" class="table align-middle table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Isi Pengaduan</th>
                                <th>Email</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedback as $list)
                                <tr>
                                    <td>{{ \Illuminate\Support\Str::limit(strip_tags($list->konten), 80) }}</td>
                                    <td>{{ $list->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.feedback.detail', $list->token) }}" class="btn btn-info btn-sm rounded-pill">
                                            <i class="bi bi-eye"></i> 
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Kritik & Saran -->
    <section class="py-5 bg-light my-10" id="kritiksarantop">
        <div class="container" data-aos="fade-up">
            <div class="mb-4 text-center">
                <h2 class="fw-bold">📝 Kritik & Saran</h2>
                <p class="text-muted">Kritik dan saran dari masyarakat</p>
            </div>

            <div class="card border-0 shadow rounded-4 p-4 bg-white">
                <div class="table-responsive">
                    <table id="kritiksaran" class="table align-middle table-hover">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kritik_saran as $kritiksaran)
                                <tr>
                                    <td class="text-center">{{ $kritiksaran->judul }}</td>
                                    <td class="text-center">{{ $kritiksaran->nama }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.kritik_saran.detail', $kritiksaran->slug) }}" class="btn btn-info btn-sm rounded-pill">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.kritik_saran.destroy', $kritiksaran->slug) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('Yakin mau hapus?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection

@section('footer')
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    $(document).ready(function () {
        $('#informasi_publik').DataTable();
        $('#feedback').DataTable();
        $('#kritiksaran').DataTable();
        AOS.init();
    });
</script>
@endsection
