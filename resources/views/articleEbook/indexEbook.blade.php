@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <div class="col-lg-4 offset-lg-4 text-center mt-2">
        <p class="h1 fw-bold">E-book</p>
        <p class="h6 text-muted fw-normal">Kumpulan e-book menarik untuk menambah pengetahuan.</p>
    </div>
    {{-- Button Kategori --}}
    <div class="d-grid gap-2 d-md-block mt-4">
        <a class="btn btn-primary" href="/ebook">Semua</a>
        <a class="btn btn-primary" href="/ebook/spesial">Spesial</a>
        <a class="btn btn-primary" href="/ebook/terbaru">Terbaru</a>
    </div>
    {{-- List Ebook --}}
    <p class="h4 fw-bold mt-5">{{ $tittle }}</p>
    @if ($ebooks->count())
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            @foreach ($ebooks as $eb)
                <div class="col">
                <div class="card shadow mb-3 bg-card">
                    @if ($eb->image)
                    <div style="max-height: 250px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $eb->image) }}" class="img-fluid" alt="{{ $eb->tittle }}">
                    </div>
                    @else
                        <img src="/img/default_ebook.png" class="img-fluid">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($eb->tittle, 65) }}</h5>
                        <button type="button" class="btn btn-more col-10 offset-1 my-3" data-bs-toggle="modal" data-bs-target="#{{ $eb->slug }}">Baca Sekarang</button>
                        <!-- Modal -->
                        <div class="modal fade" id="{{ $eb->slug }}" tabindex="-1" aria-labelledby="{{ $eb->tittle }}" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="{{ $eb->tittle }}">{{ $eb->tittle }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                @if ($eb->image)
                                    <img src="{{ asset('storage/' . $eb->image) }}" class="img-fluid" alt="{{ $eb->tittle }}">
                                @else
                                    <img src="/img/default_ebook.png" class="img-fluid">
                                @endif
                                <p class="h6 mt-3">Penulis: {{ $eb->author }}</p>
                                <p>{{ $eb->synopsis }}</p>
                                <p class="text-muted">Total di download: {{ $eb->downloadCount }}</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="/ebook/downloadEbook/{{ $eb->slug }}" class="btn btn-primary">Download E-book</a>
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
            <p class="text-muted">Data Tidak Ditemukan!</p>
        </div>
    @endif

    <div class="d-flex justify-content-end mt-5">
        {{ $ebooks->links() }}
    </div>

</div>


@endsection