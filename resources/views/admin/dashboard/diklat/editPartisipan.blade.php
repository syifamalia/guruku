@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Partisipan</h1>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-sm-left mt-1">Ubah Data {{ $participant->user->name }}</h6>
                    <a href="/dashboard/diklat-partisipan" class="btn btn-primary btn-circle btn-sm float-sm-right">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
                <div class="card-body">
                    <form method="post" action="/dashboard/diklat-partisipan/{{ $participant->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                          <label for="name" class="col-sm-2 col-form-label">Nama Partisipan</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $participant->user->name) }}" disabled>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $participant->email) }}" disabled>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="diklat" class="col-sm-2 col-form-label">Diklat yang Diambil</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="diklat" name="diklat" value="{{ old('diklat', $participant->diklat->tittle) }}" disabled>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="status" class="col-sm-2 col-form-label">Status</label>
                          <div class="col-sm-8">
                            <select class="custom-select" name="status">
                                @if (old('status', $participant->status) == $participant->status)
                                    <option value="{{ $participant->status }}" selected>{{ $participant->status }}</option>  
                                    <option value="Tidak Aktif" @if($participant->status == "Tidak Aktif") hidden @endif>Tidak Aktif</option>    
                                    <option value="Aktif" @if($participant->status == "Aktif") hidden @endif>Aktif</option>    
                                    <option value="Selesai" @if($participant->status == "Selesai") hidden @endif>Selesai</option>  
                                @endif
                              </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="name" class="col-sm-2 col-form-label">Sertifikat</label>
                          <div class="col-sm-8">
                            <div class="row">
                              <div class="col-5">
                                <input type="hidden" name="oldCertificate" value="{{ $participant->certificate }}">
                                @if ($participant->certificate)
                                  <img src="{{ asset('storage/' . $participant->certificate) }}" class="img-preview img-fluid mb-2 d-block">  
                                @else
                                  <img src="/img/Diklat/template_sertifikat.png" class="img-preview img-fluid mb-2 d-block">
                                @endif
                              </div>
                            </div>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input @error('certificate') is-invalid @enderror" id="image" name="certificate" onchange="previewImage()">
                              <label class="custom-file-label" for="certificate"></label>
                              @error('certificate')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
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