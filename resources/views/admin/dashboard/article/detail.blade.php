@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Article</h1>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <a href="/dashboard/article/{{ $article->slug }}/edit" class="btn btn-primary btn-icon-split mr-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Ubah Data</span>
                  </a>
                  <form action="/dashboard/article/{{ $article->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-icon-split" onclick="return confirm('Hapus?')">
                      <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Hapus Data</span>
                    </button>
                  </form>
                    <a href="/dashboard/article" class="btn btn-primary btn-circle btn-sm float-sm-right">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
                <div class="card-body">
                  <h2 class="mb-3">{{ $article->tittle }}</h2>
                  <div class="row">
                    <div class="col-lg-10">
                      <div class="row">
                        <div class="col-lg-10">
                          @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid">
                          @else
                            <img src="/img/default_article.png" class="img-fluid">
                          @endif
                        </div>
                      </div>
                      <article class="my-3 fs-5">
                        <div class="row">
                          <div class="col-lg-10">
                            <p class="font-weight-bold">Diposting pada: {{ date('d/m/Y', strtotime($article->created_at)) }}</p>
                            <p class="font-weight-bold mt-1">Kategori: {{ $article->article_category->tittle }}</p>
                            <p>{!! $article->desc_body !!}</p>
                          </div>
                        </div>
                      </article>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection