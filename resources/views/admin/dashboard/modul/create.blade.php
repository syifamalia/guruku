@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modul Pelatihan Baru</h1>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-sm-left mt-1">Buat Modul Pelatihan Baru</h6>
                    <a href="/dashboard/training" class="btn btn-primary btn-circle btn-sm float-sm-right">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form method="post" action="/dashboard/module">
                        @csrf
                        <div class="form-group row">
                          <label for="tittle" class="col-sm-2 col-form-label">Pilih Pelatihan</label>
                          <div class="col-sm-8">
                            <select class="custom-select @error('tittle') is-invalid @enderror" name="training_id">
                              @foreach ($trainings as $training)
                                @if (old('training_id') == $training->id)
                                  <option value="{{ $training->id }}" selected>{{ $training->tittle }}</option>  
                                @else
                                  <option value="{{ $training->id }}">{{ $training->tittle }}</option>    
                                @endif
                              @endforeach
                            </select>
                            @error('tittle')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="subject" class="col-sm-2 col-form-label">Judul Modul</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" placeholder="Masukan judul modul" name="subject" value="{{ old('subject') }}">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" readonly>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                          <div class="form-group row">
                            <label for="videoLink" class="col-sm-2 col-form-label">Link Video</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control @error('videoLink') is-invalid @enderror" id="videoLink" placeholder="Masukan kode terakhir pada link YouTube atau setelah v=kode_link " name="videoLink" value="{{ old('videoLink') }}">
                              @error('videoLink')
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
  const subject = document.querySelector('#subject');
  const slug = document.querySelector('#slug');

  subject.addEventListener('change', function() {
    fetch('/dashboard/module/checkSlug?subject=' + subject.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });
</script>
@endsection