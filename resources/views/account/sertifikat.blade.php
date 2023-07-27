@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 bg-profile p-4">
            <div class="text-center">
                @if ($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" class="img-fluid rounded-circle shadow" style="height: 150px; width: 150px;">
                @else
                    <img src="/admins/img/user.png" class="img-fluid rounded-circle shadow" style="height: 150px; width: 150px;">
                @endif
                <p class="h3 mt-4 mb-0">{{ $user->name }}</p>
                <p class="text-muted">{{ $user->email }}</p>
            </div>
            <div class="d-flex flex-column mt-5 p-4">
                <div class="d-flex fs-5 mb-3">
                    <i class="bi bi-bar-chart-fill"></i>
                    <a href="/akun" class="text-decoration-none text-dark" style="padding-left: 10px;">Program Diklat</a>
                </div>
                <div class="d-flex fs-5 mb-3">
                    <i class="bi bi-file-richtext-fill"></i>
                    <a href="/akun/sertifikat" class="text-decoration-none text-dark" style="padding-left: 10px;">Sertifikat</a>
                </div>
                <div class="d-flex fs-5 mb-3">
                    <i class="bi bi-gear-fill"></i>
                    <a href="/akun/pengaturan" class="text-decoration-none text-dark" style="padding-left: 10px;">Pengaturan</a>
                </div>
                @if ($review)
                    <div class="d-flex fs-5 mb-3 d-none">
                        <i class="bi bi-star-fill"></i>
                        <a href="/akun/review" class="text-decoration-none text-dark" style="padding-left: 10px;">Beri Ulasan</a>
                    </div>
                @else
                    <div class="d-flex fs-5 mb-3">
                        <i class="bi bi-star-fill"></i>
                        <a href="/akun/review" class="text-decoration-none text-dark" style="padding-left: 10px;">Beri Ulasan</a>
                    </div>
                @endif
                <div class="d-flex fs-5 mb-3">
                    <i class="bi bi-box-arrow-right"></i>
                    <form action="/signout" method="post">
                        @csrf
                        <button type="submit" class="text-decoration-none text-dark bg-transparent border-0" style="padding-left: 10px;">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 offset-lg-1 shadow rounded-3">
            <p class="h4 my-4">Sertifikat Diklat yang Diikuti</p>
            <div class="slide-down">
                @if ($participants->count())
                <div class="row row-cols-1 row-cols-md-3 g-4" style="height: auto;">
                    @foreach ($participants as $peserta)
                        <div class="col">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">{{ $peserta->diklat->tittle }}</h5>
                            <p class="card-text">Tanggal Mendaftar: {{ date('d/m/Y', strtotime($peserta->diklat->created_at)) }}</p>
                            <button type="button" class="btn btn-more col-10 offset-1 my-3" data-bs-toggle="modal" data-bs-target="#{{ $peserta->status }}">Tampilkan Sertifikat</button>
                            <!-- Modal -->
                            <div class="modal fade" id="{{ $peserta->status }}" tabindex="-1" aria-labelledby="{{ $peserta->user_id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="{{ $peserta->user->name }}">Nama Peserta: {{ $peserta->user->name }}</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      @if ($peserta->certificate)
                                          <img src="{{ asset('storage/' . $peserta->certificate) }}" class="img-fluid" alt="{{ $peserta->user->name }}">
                                      @else
                                          <img src="" class="img-fluid mt-3">
                                      @endif
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
                </div>
                @else
                    <div class="text-center mt-3">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="/admins/img/not_found.png" alt="Not Found">
                        <p class="text-muted">Kamu belum mengikuti diklat apapun!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
    
@endsection