@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Artikel</h1>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-sm-left mt-1">Ubah {{ $article->tittle }}</h6>
                    <a href="/dashboard/article" class="btn btn-primary btn-circle btn-sm float-sm-right">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form method="post" action="/dashboard/article/{{ $article->slug }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                          <label for="tittle" class="col-sm-2 col-form-label">Judul Artikel</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control @error('tittle') is-invalid @enderror" id="tittle" placeholder="Masukan judul artikel" name="tittle" value="{{ old('tittle', $article->tittle) }}">
                            @error('tittle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Slug dari judul" name="slug" value="{{ old('slug',  $article->slug) }}" readonly>
                            @error('slug')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="tittle" class="col-sm-2 col-form-label">Kategori Artikel</label>
                            <div class="col-sm-8">
                              <select class="custom-select" name="article_category_id">
                                @foreach ($articleCat as $category)
                                @if (old('article_category_id', $article->article_category_id) == $category->id)
                                  <option value="{{ $category->id }}" selected>{{ $category->tittle }}</option>  
                                @else
                                  <option value="{{ $category->id }}">{{ $category->tittle }}</option>    
                                @endif
                              @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                            <input type="hidden" name="oldImage" value="{{ $article->image }}">
                            <div class="col-sm-8">
                              <div class="row">
                                <div class="col-5">
                                  @if ($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" class="img-preview img-fluid mb-2 d-block">  
                                  @else
                                    <img class="img-preview img-fluid mb-3">
                                  @endif
                                </div>
                              </div>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                                <small class="form-text text-muted">Dimensi gambar max: 1280 x 720.</small>
                                <label class="custom-file-label" for="image"></label>
                                @error('image')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="desc_body" class="col-sm-2 col-form-label">Isi Artikel</label>
                            <div class="col-sm-8">
                              @error('desc_body')
                                  <p class="text-danger">{{ $message }}</p>
                              @enderror
                              <input id="desc_body" type="hidden" name="desc_body" value="{{ old('desc_body', $article->desc_body) }}">
                              <trix-editor input="desc_body"></trix-editor>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary btn-icon-split mt-4 mr-4">
                            <span class="icon text-white-50">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="text">Ubah Data</span>
                          </button>
                      </form>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
  const tittle = document.querySelector('#tittle');
  const slug = document.querySelector('#slug');

  tittle.addEventListener('change', function() {
    fetch('/dashboard/diklat/checkSlug?tittle=' + tittle.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });
</script>
@endsection