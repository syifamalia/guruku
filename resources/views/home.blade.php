@extends('layouts.main')

@section('container')
{{-- START Section Header --}}
<div class="container-fluid-xxl">
    <div class="row g-0">
        <div class="clearfix mb-4">
            <img src="/img/head.png" alt="Heading Picture" class="img-fluid col-md-7 float-md-end mb-3 ms-md-5">
             <br><br>    
            <p class="heading1 ms-5"> Ikuti Kegiatan Pelatihan Yang Menarik Dengan Sekali Klik</p>
             <p class="bodytext ms-5">Ikuti program kegiatan pelatihan yang menarik dengan sekali klik di Guruku agar mampu mengelola pembelajaran secara kreatif</p>
             <a href="/pelatihan" class="btn hbtn btn-main-program ms-5 mt-2">Program</a>
         </div>
    </div>
</div>
{{-- END Section Header --}}
{{-- START Section About --}}
<div class="container mt-5">
    <div class="row g-0">
        <div class="col-md-3">
            <img class="img-fluid" src="/img/LogoAbout.png" alt="Logo">
            <h1 class="about mt-3 ms-5">Tentang</h1>
            <h1 class="about ms-5">Guruku</h1>
        </div>
        <div class="col-md-8 offset-md-1">
            <p class="about-text">Guruku hadir sebagai tempat pelatihan-pelatihan umum ataupun diklat model bermutu yang menerapkan <i>recognition of prior learning</i> yang pelatih diklatnya bersertifikat.</p>
            <p class="about-text">Guruku juga memberikan info kegiatan seminar dan workshop serta menyediakan e-book untuk mendukung kegiatan e-literasi agar para guru dapat mencari informasi yang dibutuhkan lalu diolah dan dianalisis kembali sehingga tercipta informasi baru.</p>
            <p class="about-text">Guruku mempunyai tujuan untuk meningkatkan kualitas pendidikan di era pembelajaran online sehingga diharapkan dapat membantu para tenaga pendidik (Guru) agar mampu mengelola pembelajaran secara kreatif.</p>
        </div>
    </div>
</div>
{{-- END Section About --}}
{{-- START Section Popular --}}
<div class="mt-5">
  <div class="popular-text rounded-3 py-1 mx-auto col-md-4 position-relative">
    <p class="text-most-popular m-1">Pilihan Program Menarik</p>
  </div>
  <div class="most-popular">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 pt-5">
          @foreach ($trainings as $pelatihan)
            <div class="col">
                <div class="card h-100 shadow border-0 bg-card">
                    @if ($pelatihan->image)
                    <div style="max-height: 250px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $pelatihan->image) }}" class="img-fluid" alt="{{ $pelatihan->tittle }}">
                    </div>
                    @else
                        <img src="/img/default_pelatihan.png" class="img-fluid">
                    @endif
                    <div class="card-body">
                      <span class="badge rounded bg-primary mb-3">Pelatihan</span>
                      <h5 class="card-title">{{ Str::limit($pelatihan->tittle, 65) }}</h5>
                      <p class="card-text">{{ $pelatihan->desc }}</p>
                      <a href="pelatihan/detail/{{ $pelatihan->slug }}" class="btn btn-more col-5 float-start">Selengkapnya</a>
                      <a href="pelatihan/modul/{{ $pelatihan->slug }}" class="btn btn-follow col-5 float-end">Ikuti</a>
                    </div>
                  </div>
                </div>
          @endforeach
          @foreach ($diklats as $diklat)
            <div class="col">
                  <div class="card h-100 shadow border-0 bg-card">
                      @if ($diklat->image)
                      <div style="max-height: 250px; overflow:hidden;">
                          <img src="{{ asset('storage/' . $diklat->image) }}" class="img-fluid" alt="{{ $diklat->tittle }}">
                      </div>
                      @else
                          <img src="/img/default_diklat.png" class="img-fluid">
                      @endif
                    <div class="card-body">
                      <span class="badge rounded bg-info mb-3 text-dark">Diklat</span>
                      <h5 class="card-title">{{ Str::limit($diklat->tittle, 65) }}</h5>
                      <p class="card-text">{{ $diklat->desc }}.</p>
                      <a href="diklat/detail/{{ $diklat->slug }}" class="btn btn-more col-5 float-start">Selengkapnya</a>
                      <a href="diklat/detail/{{ $diklat->slug }}" class="btn btn-follow col-5 float-end">Ikuti</a>
                    </div>
                  </div>
              </div>
          @endforeach
        </div>
    </div>
  </div>
<img src="/img/bgMostPopular.png" alt="" class="img-fluid col-12">
</div>
{{-- END Section Popular --}}
{{-- START Section Review --}}
<div class="container my-5">
  <p class="h1 text-center">Testimonial</p>
  <p class="h6 text-center">Pendapat para tenaga pendidik tentang kami</p>
  @if ($reviews->count())
  <div class="row row-cols-1 row-cols-md-4 g-4 mt-3">
    @foreach ($reviews as $rv)
      <div class="col">
        <div class="reviewCard card h-100 shadow border-0">
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0 ms-2 my-3">
              @if ($rv->user->photo)
                <div style="max-height: 250px; overflow:hidden;">
                  <img src="{{ asset('storage/' . $rv->user->photo) }}" class="img-fluid imgProfile rounded-circle" alt="{{ $rv->user->name }}">
                </div>
              @else
                <img src="/admins/img/user.png" class="img-fluid imgProfile rounded-circle">
              @endif
            </div>
            <div class="flex-grow-1 ms-3">
              <p class="name m-0">{{ $rv->user->name }}</p>
            </div>
          </div>
          <div class="card-body">
            <p class="card-text">{{ $rv->review }}</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">{{ date('d-F-Y', strtotime($rv->created_at)) }}</small>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  @else
    <div class="text-center mt-3">
      <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="/admins/img/find.png" alt="Not Found">
      <p class="text-muted">Data Tidak Ditemukan!</p>
    </div>
  @endif
</div>
<br>
{{-- END Section Review --}}
{{-- START Section Contact --}}
<div class="container mt-5">
  <div class="row g-0 position-relative">
    <div class="formContactUs rounded-3 col-md-5 mb-md-0">
      <p class="h1 text-center">Hubungi Kami</p><br>
      <form action="/" method="post">
        @csrf
        <div class="mb-3 col-md-11">
          <label for="name" class="form-label">Nama *</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Ketik Nama Anda Disini" value="{{ old('name') }}" @error('name') autofocus @enderror>
          @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3 col-md-11">
          <label for="title" class="form-label">Bagaimana Kami Memanggil Anda? *</label>
          <select class="form-select @error('title') is-invalid @enderror" aria-label="Default select example" name="title" @error('title') autofocus @enderror>
            <option selected>Pilih di sini</option>
            <option value="Ibu">Ibu</option>
            <option value="Bapak">Bapak</option>
          </select>
          @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3 col-md-11">
          <label for="email" class="form-label">E-mail *</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Ketik Alamat E-mail Anda Disini" value="{{ old('email') }}" @error('email') autofocus @enderror>
          @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3 col-md-11">
          <label for="phone" class="form-label">Nomor Handphone *</label>
          <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Ketik Nomor Handphone Anda Disini" value="{{ old('phone') }}" @error('phone') autofocus @enderror>
          @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-4 col-md-11">
          <label for="message" class="form-label">Pesan *</label>
          <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" placeholder="Tulis Pesan Anda" @error('message') autofocus @enderror>{{ old('message') }}</textarea>
          @error('message')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-2 col-md-5">
          <button type="submit" class="btn btn-main shadow">Kirim</button>
        </div>
      </form>
      @if (session('added'))
        <div class="alert alert-success mt-3">
            {{ session('added') }}
        </div>
      @endif
    </div>
    <div class="col-md-6 offset-md-1 p-4 ps-md-0">
      <img src="img/contact.png" alt="" class="img-fluid">
    </div>
  </div>
</div>
{{-- END Section Contact --}}
@endsection