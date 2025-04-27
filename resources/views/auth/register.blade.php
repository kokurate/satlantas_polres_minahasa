@extends('_layouts.master')


@section('content')

 

    <br><br>
    <div class="container my-3">

        <div class="row">

          

            <div class="col-8 mx-auto rounded shadow p-3">

                <a href="{{ route('admin.index') }}" class="btn btn-primary" >
                    {{-- <i class="bi bi-arrow-left-square-fill" style="width:100px;"></i> --}}
                    <i class="bi bi-arrow-left" ></i> Kembali
                </a>


                <img src="/logo.png" class="mx-auto d-flex justify-content-center mx-2" alt="Logo" style="width: 15%;">
                <h2 class="text-center">Register Admin</h2>
                    <form method="post" action="{{ route('register.store') }}" >
                        @csrf

                        {{-- ROLE --}}
                        <div class="mb-3">
                            <label for="tujuan" class="form-label"></label>
                            <select class="form-select" name="level" >
                            <option>Pilih Role</option>
                            <option value="admin" >Admin</option>
                            </select>
                            @error('level')
                            <p class="text-danger">Pilih Role</p>
                            @enderror
                        </div> 
                        

                          <!-- fullname -->
                        <div class="form-floating my-2">
                            <input id="fullname" placeholder="Nama Lengkap" type="text" name="fullname" value="{{ old('fullname') }}" class="form-control @error('fullname') is-invalid @enderror">
                            <label for="fullname" class="form-label">Nama Lengkap</label>
                            @error('fullname')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div> 

                          <!-- email -->
                        <div class="form-floating my-2">
                            <input id="email" placeholder="Nama Lengkap" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                            <label for="email" class="form-label">Email</label>
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div> 

                    

                        {{-- Password --}}
                        <div class="form-floating my-2">
                            <input type="password" name="password" class="form-control  @error('password')is-invalid @enderror" id="password" placeholder="Password">
                            <label for="password">Password</label>
                            @error('password')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                
            
                    <button type="submit" class="btn btn-primary float-right my-3">Tambah Admin</button>
                    </form>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br>
@endsection


