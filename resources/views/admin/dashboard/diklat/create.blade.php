@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Diklat Baru</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-sm-left mt-1">Buat Diklat Baru</h6>
                    <a href="/dashboard/diklat" class="btn btn-primary btn-circle btn-sm float-sm-right">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form method="post" action="/dashboard/diklat" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                          <label for="tittle" class="col-sm-2 col-form-label">Judul Diklat</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control @error('tittle') is-invalid @enderror" id="tittle" placeholder="Masukan judul diklat" name="tittle" value="{{ old('tittle') }}">
                            @error('tittle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Slug dari judul" name="slug" value="{{ old('slug') }}" readonly>
                            @error('slug')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="tittle" class="col-sm-2 col-form-label">Kategori Diklat</label>
                          <div class="col-sm-8">
                            <select class="custom-select" name="diklat_category_id">
                              @foreach ($diklatCat as $category)
                              @if (old('diklat_category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>  
                              @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>    
                              @endif
                            @endforeach
                            </select>
                          </div>
                        </div>
                          <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-8">
                              <div class="row">
                                <div class="col-5">
                                  <img class="img-preview img-fluid mb-2">
                                </div>
                              </div>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                                <small class="form-text text-muted">Dimensi gambar max: 1280 x 720.</small>
                                <label class="custom-file-label" for="image">Choose file</label>
                                @error('image')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="trainer" class="col-sm-2 col-form-label">Nama Pelatih</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control @error('trainer') is-invalid @enderror" id="trainer" placeholder="Masukan nama pelatih" name="trainer" value="{{ old('trainer') }}">
                              @error('trainer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="regist_deadline" class="col-sm-2 col-form-label">Tanggal Pendaftaran Terakhir</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control @error('regist_deadline') is-invalid @enderror" id="regist_deadline" placeholder="Masukan nama pelatih" name="regist_deadline" value="{{ old('regist_deadline') }}">
                              @error('regist_deadline')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="desc_body" class="col-sm-2 col-form-label">Deskripsi Diklat</label>
                            <div class="col-sm-8">
                              @error('desc_body')
                                  <p class="text-danger">{{ $message }}</p>
                              @enderror
                              <input id="desc_body" type="hidden" name="desc_body" value="{{ old('desc_body') }}">
                              <trix-editor input="desc_body"></trix-editor>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary btn-icon-split mt-4 mr-4">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data</span>
                          </button>
                          <button type="reset" class="btn btn-info btn-icon-split mt-4">
                            <span class="icon text-white-50">
                                <i class="fas fa-undo"></i>
                            </span>
                            <span class="text">Reset Data</span>
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
    fetch('/dashboard/training/checkSlug?tittle=' + tittle.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });
</script>
@endsection