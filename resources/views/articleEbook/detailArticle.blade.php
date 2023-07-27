@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <p class="h1 fw-bold mb-3">{{ $article->tittle }}</p>
            @if ($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid col-11 mt-3" alt="{{ $article->tittle }}">
            @else
                <img src="/img/default_artikel.png" class="img-fluid col-11 mt-3">
            @endif
            <div class="text-justify col-11 mt-4 pt-2">
                {!! $article->desc_body !!}
            </div>
            <a href="/artikel" class="btn btn-outline-secondary px-4 ml-5 mt-5">Kembali</a>
        </div>
        <div class="col-lg-3 offset-lg-1 mt-5 randomdiklat">
            @if ($randArticle->count())
                <ul class="list-group">
                    <li class="list-group-item list-group-item-primary fw-bold">Lihat Artikel Lainnya</li>
                    @foreach ($randArticle as $random)
                        <a href="/artikel/{{ $random->slug }}" class="text-decoration-none">
                            <li class="list-group-item p-0 bg-transparent mt-3 border-0 rounded">
                                <div class="card border-0 shadow" style="width: 19rem;">
                                    @if ($random->image)
                                    <div style="max-height: 250px; overflow:hidden;">
                                        <img src="{{ asset('storage/' . $random->image) }}" class="rounded-top img-fluid" alt="{{ $random->tittle }}">
                                    </div>
                                    @else
                                        <img src="" class="rounded-top img-fluid">
                                        @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $random->tittle }}</h5>
                                        <p class="card-text">{{ $random->desc }}</p>
                                    </div>
                                </div>
                            </li>
                        </a>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection