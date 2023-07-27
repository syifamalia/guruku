@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="col-lg-4 offset-lg-4 text-center mt-2">
        <p class="h1 fw-bold">Info Seminar & Workshop</p>
        <p class="h6 text-muted fw-normal">Dapatkan info seminar dan workshop yang menarik disini.</p>
    </div>
    {{-- Button Kategori --}}
    <div class="d-grid gap-2 d-md-block mt-4">
        <a class="btn btn-primary" href="/seminar-workshop">Semua</a>
        @foreach ($categories as $category)
            <a class="btn btn-primary" href="/seminar-workshop/{{ $category->slug }}">{{ $category->tittle }}</a>
        @endforeach
    </div>
    {{-- Semua Seminar & Workshop --}}
    <p class="h4 fw-bold mt-5">Semua Seminar & Workshop</p>
    <p class="h6 fw-normal text-muted">Temukan seminar atau workshop kesukaan kamu disini</p>
    @if ($seminarWorkshop->count())
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            @foreach ($seminarWorkshop as $sw)
                <div class="col">
                <div class="card shadow mb-3 bg-card">
                    @if ($sw->image)
                    <div style="max-height: 250px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $sw->image) }}" class="img-fluid" alt="{{ $sw->tittle }}">
                    </div>
                    @else
                        <img src="/img/default_seminar.png" class="img-fluid">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($sw->tittle, 65) }}</h5>
                        <p class="card-text">{{ $sw->desc }}</p>
                        <a href="/seminar-workshop/detail/{{ $sw->slug }}" class="btn btn-more col-5 my-3">Selengkapnya</a>
                        <a href="{{ $sw->registLink }}" class="btn btn-follow col-5 offset-1 my-3 float-end">Daftar</a>
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
        {{ $seminarWorkshop->links() }}
    </div>

</div>

@endsection