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
                <div class="alert alert-success alert-dismissible fade show my-3 col-lg-10">
                    {{ session('newDiklat') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('added'))
                <div class="alert alert-success alert-dismissible fade show my-3 col-lg-10">
                    {{ session('added') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <p class="h4 my-4">Program Diklat yang Diikuti</p>
            @if ($participants->count())
                <div class="slide-down">
                    <ol class="col-lg-5 list-group list-group-numbered">
                        @foreach ($participants as $p)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ $p->diklat->tittle }}</div>
                                Status
                            </div>
                            @if ($p->status == "Tidak Aktif")
                                <span class="badge bg-secondary rounded-pill mt-3">{{ $p->status }}</span>
                            @endif
                            @if ($p->status == "Aktif")
                                <span class="badge bg-primary rounded-pill mt-3">{{ $p->status }}</span>
                            @endif
                            @if ($p->status == "Selesai")
                                <span class="badge bg-success rounded-pill mt-3">{{ $p->status }}</span>
                            @endif
                            </li>
                        @endforeach
                    </ol>
                </div>
            @else
                <div class="text-center mt-3">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="/admins/img/not_found.png" alt="Not Found">
                    <p class="text-muted">Kamu belum mengikuti diklat apapun!</p>
                </div>
            @endif
        </div>
    </div>
</div>
    
@endsection