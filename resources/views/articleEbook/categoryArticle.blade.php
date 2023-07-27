@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="col-lg-4 offset-lg-4 text-center mt-2">
        <p class="h1 fw-bold">Artikel</p>
        <p class="h6 text-muted fw-normal">Kumpulan artikel menarik untuk memperoleh informasi terbaru.</p>
    </div>
    {{-- Button Kategori --}}
    <div class="d-grid gap-2 d-md-block mt-4">
        <a class="btn btn-primary" href="/artikel">Semua</a>
        @foreach ($categories as $cat)
            <a class="btn btn-primary" href="/artikel/kategori/{{ $cat->slug }}">{{ $cat->tittle }}</a>
        @endforeach
    </div>
    {{-- Semua Artikel --}}
    <p class="h4 fw-bold mt-5">{{ $category->tittle }}</p>
    @if ($articles->count())
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            @foreach ($articles as $artikel)
                <div class="col">
                <div class="card shadow mb-3 bg-card">
                    @if ($artikel->image)
                    <div style="max-height: 250px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $artikel->image) }}" class="img-fluid" alt="{{ $artikel->tittle }}">
                    </div>
                    @else
                        <img src="/img/default_artikel.png" class="img-fluid">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($artikel->tittle, 65) }}</h5>
                        <p class="card-text">{{ $artikel->desc }}</p>
                        <a href="/artikel/{{ $artikel->slug }}" class="btn btn-more col-5 offset-1 my-3 float-end">Baca Selanjutnya</a>
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
        {{ $articles->links() }}
    </div>
    
</div>
    
@endsection