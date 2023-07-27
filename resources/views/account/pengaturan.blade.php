@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 bg-profile p-4">
            <div class="text-center">
                @if ($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" class="img-fluid rounded-circle shadow" style="height: 150px; width: 150px;">
                @else
                    <img src="/admins/img/user.png" class="img-fluid rounded-circle shadow" style="height: 150px; width: 150px;">
                @endif
                <p class="h3 mt-4 mb-0">{{ $user->name }}</p>
                <p class="text-muted">{{ $user->email }}</p>
            </div>
            <div class="d-flex flex-column mt-5 p-4">
                <div class="d-flex fs-5 mb-3">
                    <i class="bi bi-bar-chart-fill"></i>
                    <a href="/akun" class="text-decoration-none text-dark" style="padding-left: 10px;">Program Diklat</a>
                </div>
                <div class="d-flex fs-5 mb-3">
                    <i class="bi bi-file-richtext-fill"></i>
                    <a href="/akun/sertifikat" class="text-decoration-none text-dark" style="padding-left: 10px;">Sertifikat</a>
                </div>
                <div class="d-flex fs-5 mb-3">
                    <i class="bi bi-gear-fill"></i>
                    <a href="/akun/pengaturan" class="text-decoration-none text-dark" style="padding-left: 10px;">Pengaturan</a>
                </div>
                @if ($review)
                    <div class="d-flex fs-5 mb-3 d-none">
                        <i class="bi bi-star-fill"></i>
                        <a href="/akun/review" class="text-decoration-none text-dark" style="padding-left: 10px;">Beri Ulasan</a>
                    </div>
                @else
                    <div class="d-flex fs-5 mb-3">
                        <i class="bi bi-star-fill"></i>
                        <a href="/akun/review" class="text-decoration-none text-dark" style="padding-left: 10px;">Beri Ulasan</a>
                    </div>
                @endif
                <div class="d-flex fs-5 mb-3">
                    <i class="bi bi-box-arrow-right"></i>
                    <form action="/signout" method="post">
                        @csrf
                        <button type="submit" class="text-decoration-none text-dark bg-transparent border-0" style="padding-left: 10px;">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 offset-lg-1 shadow rounded-3">
            @if (session('added'))
                <div class="alert alert-success my-3 col-lg-5">
                    {{ session('added') }}
                </div>
            @endif
            @if (session('failed'))
                <div class="alert alert-danger my-3 col-lg-5">
                    {{ session('failed') }}
                </div>
            @endif
            <p class="h4 my-4">Pengaturan Akun</p>
            <div class="slide-down p-1">
                <form action="/akun/pengaturan/{{ $user->id }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-lg-5 mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control col-lg-5 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan nama lengkap" value="{{ old('name', $user->name) }}">
                        @error('name')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="col-lg-5 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control col-lg-5 @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan email" value="{{ old('email', $user->email) }}">
                        @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <div class="col-lg-5 mb-5">
                        <label for="phone" class="form-label">Nomor Telpon</label>
                        <input type="number" class="form-control col-lg-5 @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Masukan nomor telpon" value="0{{ old('phone', $user->phone) }}">
                        @error('phone')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                    </div>
                    {{-- ubah foto --}}
                    <p class="h6 text-dark">Ubah Foto Profile</p>
                    <hr class="m-0 bg-dark col-lg-3 opacity-25 rounded-pill">
                    <div class="col-lg-5 mb-5 mt-4">
                        <input type="hidden" name="oldImage" value="{{ $user->photo }}">
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                        <small class="form-text text-muted">Dimensi gambar max: 500 x 500.</small>
                        @error('photo')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                    </div>
                    {{-- ubah kata sandi --}}
                    <p class="h6 text-dark">Ubah Kata Sandi</p>
                    <hr class="m-0 bg-dark col-lg-3 opacity-25 rounded-pill">
                    <div class="col-lg-5 mb-5 mt-4">
                        <input type="password" class="form-control col-lg-5 @error('password') is-invalid autofocus @enderror" id="password" name="password" placeholder="Masukan password Anda" @error('password') autofocus @enderror>
                        @error('password')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection