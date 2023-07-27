@extends('admin.layouts.plain')
@section('container')
  <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong border-0 rounded-3 shadow">
              <div class="card-body p-5">
                
                @if (session()->has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                @if (session()->has('loginError'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <p class="h3 mb-3">Login | Admin </p>
                <form action="/admin" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ old('username') }}" autofocus>
                      <label for="username">Username</label>
                    </div>
                    <div class="form-floating">
                      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                      <label for="password">Password</label>
                    </div>
                    <button type="submit" class="d-block mx-auto btn btn-primary mt-4 col-md-5">Login</button>
                  </form>
                  <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
@endsection
