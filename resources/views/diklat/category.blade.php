@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="col-lg-4 offset-lg-4 text-center mt-2">
        <p class="h1 fw-bold">Diklat</p>
        <p class="h6 text-muted fw-normal">Ikuti program diklat guru bermutu yang menerapkan <i>recognition of prior learning</i> yang diberikan oleh pelatih diklat bersertifikat</p>
    </div>
    {{-- Button Kategori --}}
    <div class="d-grid gap-2 d-md-block mt-4">
        <a class="btn btn-primary" href="/diklat">Semua Diklat</a>
        @foreach ($categories as $cat)
            <a class="btn btn-primary" href="/diklat/{{ $cat->slug }}">{{ $cat->name }}</a>
        @endforeach
    </div>
    {{-- Semua Diklat --}}
    <p class="h4 fw-bold mt-5">Diklat {{ $category->name }}</p>
    @if ($diklats->count())
        <p class="h6 fw-normal text-muted">Berikut ini adalah diklat dari {{ $category->name }}</p>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            @foreach ($diklats as $d)
                <div class="col">
                <div class="card shadow mb-3 bg-card">
                    @if ($d->image)
                    <div style="max-height: 250px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $d->image) }}" class="img-fluid" alt="{{ $d->tittle }}">
                    </div>
                    @else
                        <img src="/img/default_diklat.png" class="img-fluid">
                    @endif
                    <div class="card-body">
                        <span class="badge rounded bg-info mb-3 text-dark">Diklat</span>
                        <h5 class="card-title">{{ Str::limit($d->tittle, 65) }}</h5>
                        <p class="card-text">{{ $d->desc }}</p>
                        <span class="badge rounded bg-info mb-3 text-dark">Pendaftaran Terakhir: {{ date('Y-m-d', strtotime($d->regist_deadline)) }}</span>
                        <div class="d-flex">
                            <a href="detail/{{ $d->slug }}" class="btn btn-more px-3 my-3 me-auto">Selengkapnya</a>
                            <form action="/diklat/detail" method="post">
                                @auth
                                    <input type="hidden" name="userID" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="diklatID" value="{{ $d->id }}">
                                    <input type="hidden" name="userEmail" value="{{ auth()->user()->email }}">
                                @endauth
                                <button class="btn btn-follow px-5 my-3 float-end" @if (date('Y-m-d', strtotime($d->regist_deadline)) < date('Y-m-d')) disabled @endif>Ikuti</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center mt-3">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="/admins/img/not_found.png" alt="Not Found">
            <p class="text-muted">Data Tidak Ditemukan!</p>
        </div>
    @endif

    <div class="d-flex justify-content-end mt-5">
        {{ $diklats->links() }}
    </div>

</div>
    
@endsection