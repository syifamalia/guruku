@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-5">
                <img src="/img/login.png" alt="Login" class="img-fluid">
            </div>
            <div class="col-lg-5 offset-lg-1 my-5">
                <p class="h5">Daftar Akun</p>
                <form action="/signup" method="POST" class="row g-3 mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12 mb-2">
                      <label for="name" class="form-label">Nama Lengkap</label>
                      <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan nama lengkap Anda" value="{{ old('name') }}" autofocus>
                      @error('name')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="col-lg-12 mb-2">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan alamat email Anda" value="{{ old('email') }}">
                      @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="col-lg-12">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group mb-2">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan password Anda">
                            <span class="input-group-text bg-white"><i class="bi bi-eye-slash"></i></span>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <label for="phone" class="form-label">Nomor Handphone</label>
                      <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Nomor hp aktif Anda" value="{{ old('phone') }}">
                      @error('phone')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="col-lg-6 mb-2">
                        <label for="photo" class="form-label">Upload Foto Profile</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                        <small class="form-text text-muted">Dimensi gambar max: 500 x 500.</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-signin col-lg-12 mt-4">Daftar Akun</button>
                </form>
            </div>
        </div>
    </div>
@endsection