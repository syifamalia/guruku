@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-5">
                <img src="/img/login.png" alt="Login" class="img-fluid">
            </div>
            <div class="col-lg-5 offset-lg-1 my-5">
                <p class="h5">Masuk</p>

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" style="margin-bottom: -35px" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" style="margin-bottom: -35px" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="/signin" method="POST" class="mt-5">
                    @csrf
                    <div class="mb-4">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan alamat email Anda" autofocus value="{{ old('email') }}">
                      @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group mb-5">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan password Anda">
                        <span class="input-group-text bg-white"><i class="bi bi-eye-slash"></i></span>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <small class="d-block my-2"><a href="/forgot-password">Lupa kata sandi?</a></small>
                    <button type="submit" class="btn btn-signin col-lg-12 mb-3">Masuk</button>
                  </form>
                  <a href="/signup" class="btn btn-signup col-lg-12">Daftar Akun</a>
            </div>
        </div>
    </div>
@endsection