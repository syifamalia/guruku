@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-5">
                <img src="/img/login.png" alt="Login" class="img-fluid">
            </div>
            <div class="col-lg-5 offset-lg-1 my-5">
                <p class="h5">Lupa Kata Sandi</p>

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" style="margin-bottom: -35px" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('password.email') }}" method="POST" class="mt-5">
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
                    <button type="submit" class="btn btn-signin col-lg-12 mb-3">Reset Password</button>
                  </form>
            </div>
        </div>
    </div>
@endsection