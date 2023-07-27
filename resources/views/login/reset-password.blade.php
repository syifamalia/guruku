@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-5">
                <img src="/img/login.png" alt="Login" class="img-fluid">
            </div>
            <div class="col-lg-5 offset-lg-1 my-5">
                <p class="h5">Reset Password</p>
                <form action="{{ route('password.update') }}" method="POST" class="mt-5">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
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
                    <div class="input-group mb-4">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan password Anda">
                        <span class="input-group-text bg-white"><i class="bi bi-eye-slash"></i></span>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <label for="password_confirmation" class="form-label">Konfirmasi Password Anda</label>
                    <div class="input-group mb-5">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Masukan password_confirmation Anda">
                        <span class="input-group-text bg-white"><i class="bi bi-eye-slash"></i></span>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-signin col-lg-12 mb-3">Reset Password</button>
                  </form>
            </div>
        </div>
    </div>
@endsection