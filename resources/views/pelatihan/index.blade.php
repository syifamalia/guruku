@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="col-lg-4 offset-lg-4 text-center mt-2">
        <p class="h1 fw-bold">Pelatihan</p>
        <p class="h6 text-muted fw-normal">Pelajari pelatihan-pelatihan dasar untuk mengelola pembelajaran secara kreatif</p>
    </div>
    {{-- Pelatihan Terbaru --}}
    <p class="h4 fw-bold mt-3">Pelatihan Terbaru</p>
    <p class="h6 fw-normal text-muted">Pelatihan yang paling terbaru yang tersedia disini</p>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
        @foreach ($newTraining as $new)
            <div class="col">
            <div class="card shadow bg-card">
                @if ($new->image)
                <div style="max-height: 250px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $new->image) }}" class="img-fluid" alt="{{ $new->tittle }}">
                </div>
                @else
                    <img src="/img/default_pelatihan.png" class="img-fluid">
                @endif
                <div class="card-body">
                    <span class="badge rounded bg-primary mb-3">Pelatihan</span>
                    <h5 class="card-title">{{ $new->tittle }}</h5>
                    <a href="pelatihan/modul/{{ $new->slug }}" class="btn btn-follow col-6 offset-3 mt-4">Ikuti</a>
                </div>
            </div>
            </div>
        @endforeach
      </div>
      <br><br><br>
      {{-- Semua Pelatihan --}}
    <p class="h4 fw-bold mt-5">Semua Pelatihan</p>
    @if ($training->count())
        <p class="h6 fw-normal text-muted">Temukan pelatihan kesukaan kamu disini</p>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            @foreach ($training as $pelatihan)
                <div class="col">
                <div class="card shadow mb-3 bg-card">
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
                        <a href="pelatihan/detail/{{ $pelatihan->slug }}" class="btn btn-more col-5 my-3">Selengkapnya</a>
                        <a href="pelatihan/modul/{{ $pelatihan->slug }}" class="btn btn-follow col-5 offset-1 my-3 float-end">Ikuti</a>
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
          {{ $training->links() }}
      </div>

</div>

    
@endsection