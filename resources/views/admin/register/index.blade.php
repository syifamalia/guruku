@extends('admin.layouts.plain')
@section('container')
  <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong border-0 rounded-3 shadow">
              <div class="card-body p-5">
                <p class="h3 mb-3 text-center">Registration | Admin </p>
                <form action="/register" method="post">
                    @csrf
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukan nama lengkap" name="name" value="{{ old('name') }}">
                    <label for="name">Nama Lengkap</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukan username" name="username" value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                    <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <button type="submit" class="d-block mx-auto btn btn-primary mt-4 col-md-5">Registration</button>
                  </form>
                  <small class="d-block text-center mt-3">Already registered? <a href="/admin">Login</a></small>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
@endsection
