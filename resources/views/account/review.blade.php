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
            @if (session('newDiklat'))
                <div class="alert alert-success my-3">
                    {{ session('newDiklat') }}
                </div>
            @endif
            <p class="h4 my-4">Berikan ulasan untuk aplikasi ini!</p>
            <div class="slide-down">
                <form action="/akun/review" method="post" class="p-1">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <label for="rates" class="form-label mt-3">Seberapa bermanfaat aplikasi ini?</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="rate1" value="1" name="rate">
                        <label class="form-check-label" for="rate1">Tidak Bermanfaat</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="rate2" value="2" name="rate">
                        <label class="form-check-label" for="rate2">Cukup Bermanfaat</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="rate3" value="3" name="rate">
                        <label class="form-check-label" for="rate3">Bermanfaat</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="rate4" value="4" name="rate">
                        <label class="form-check-label" for="rate4">Sangat Bermanfaat</label>
                    </div>
                    <div class="my-4 col-lg-6">
                      <label for="review" class="form-label">Tuliskan ulasan singkatmu disini!</label>
                      <textarea class="form-control" id="review" rows="4" name="review"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection