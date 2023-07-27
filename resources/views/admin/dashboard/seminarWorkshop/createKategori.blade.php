@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori Seminar & Workshop Baru</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-sm-left mt-1">Buat Kategori Seminar & Workshop Baru</h6>
                    <a href="/dashboard/seminar-workshop-kategori" class="btn btn-primary btn-circle btn-sm float-sm-right">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form method="post" action="/dashboard/seminar-workshop-kategori">
                        @csrf
                        <div class="form-group row">
                          <label for="tittle" class="col-sm-2 col-form-label">Nama Kategori</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control @error('tittle') is-invalid @enderror" id="tittle" placeholder="Masukan nama kategori" name="tittle" value="{{ old('tittle') }}">
                            @error('tittle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Slug dari kategori" name="slug" value="{{ old('slug') }}" readonly>
                            @error('slug')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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