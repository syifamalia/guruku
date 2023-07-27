@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <p class="h1 fw-bold mb-3">{{ $diklat->tittle }}</p>
            @if ($diklat->image)
                <img src="{{ asset('storage/' . $diklat->image) }}" class="img-fluid col-11 mt-3" alt="{{ $diklat->tittle }}">
            @else
                <img src="/img/default_diklat.png" class="img-fluid col-11 mt-3">
            @endif
            <p class="badge bg-info h4 mt-4">Tanggal Terakhir Pendaftaran: {{ date('d-m-Y', strtotime($diklat->regist_deadline)) }}</p>
            <div class="text-justify col-11 mt-2 pt-2">
                {!! $diklat->desc_body !!}
            </div>
            <div class="bg-detailPelatih col-6 p-2 mt-5 text-dark fw-bold">Nama Pelatih: {{ $diklat->trainer }}</div>
            <div class="bg-detailModul col-6 p-2 text-dark fw-bold">Kategori Diklat: {{ $diklat->diklat_category->name }}</div>
            <div class="d-flex col-lg-6 mt-3 pt-4">
                <form action="/diklat/detail" method="post" class="me-auto">
                    @auth
                        <input type="hidden" name="userID" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="diklatID" value="{{ $diklat->id }}">
                        <input type="hidden" name="userEmail" value="{{ auth()->user()->email }}">
                    @endauth
                    <button class="btn btn-ikuti px-4 ml-5 me-auto" @if (date('Y-m-d', strtotime($diklat->regist_deadline)) < date('Y-m-d')) disabled @endif>Ikuti Diklat</button>
                    @csrf
                </form>
                <a href="/diklat" class="btn btn-outline-secondary px-4 ml-5">Kembali</a>
              </div>
        </div>
        <div class="col-lg-3 offset-lg-1 mt-5 randomdiklat">
            <ul class="list-group">
                <li class="list-group-item list-group-item-primary fw-bold">Lihat Diklat Lainnya</li>
                @foreach ($randDiklat as $random)
                <a href="/diklat/detail/{{ $random->slug }}" class="text-decoration-none">
                    <li class="list-group-item p-0 bg-transparent mt-3 border-0 rounded">
                        <div class="card border-0 shadow" style="width: 19rem;">
                            @if ($random->image)
                            <div style="max-height: 250px; overflow:hidden;">
                                <img src="{{ asset('storage/' . $random->image) }}" class="rounded-top img-fluid" alt="{{ $random->tittle }}">
                            </div>
                            @else
                                <img src="/img/default_diklat.png" class="rounded-top img-fluid">
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