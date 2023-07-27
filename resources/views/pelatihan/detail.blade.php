@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <p class="h1 fw-bold mb-3">{{ $training->tittle }}</p>
            @if ($training->image)
                <img src="{{ asset('storage/' . $training->image) }}" class="img-fluid col-11 mt-3" alt="{{ $training->tittle }}">
            @else
                <img src="/img/default_pelatihan.png" class="img-fluid col-11 mt-3">
            @endif
            <div class="text-justify col-11 mt-4 pt-2">
                {!! $training->desc_body !!}
            </div>
            <div class="bg-detailPelatih col-6 p-2 mt-5 text-dark fw-bold">Nama Pelatih: {{ $training->trainer }}</div>
            <div class="bg-detailModul col-6 p-2 text-dark fw-bold">Jumlah Modul: {{ $modules->where('training_id', $training->id)->count('id') }}</div>
            <div class="d-flex col-lg-6 mt-3 pt-4">
                <a href="/pelatihan/modul/{{ $training->slug }}" class="btn btn-ikuti px-4 ml-5 me-auto">Ikuti Pelatihan</a>
                <a href="/pelatihan" class="btn btn-outline-secondary px-4 ml-5">Kembali</a>
              </div>
        </div>
        <div class="col-lg-3 offset-lg-1 mt-5 randomTraining">
            <ul class="list-group">
                <li class="list-group-item list-group-item-primary fw-bold">Lihat Pelatihan Lainnya</li>
                @foreach ($randTraining as $random)
                <a href="/pelatihan/detail/{{ $random->slug }}" class="text-decoration-none">
                    <li class="list-group-item p-0 bg-transparent mt-3 border-0 rounded">
                        <div class="card border-0 shadow" style="width: 19rem;">
                            @if ($random->image)
                            <div style="max-height: 250px; overflow:hidden;">
                                <img src="{{ asset('storage/' . $random->image) }}" class="rounded-top img-fluid" alt="{{ $random->tittle }}">
                            </div>
                            @else
                                <img src="/img/default_pelatihan.png" class="rounded-top img-fluid">
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
        </div>
    </div>
</div>
    
@endsection