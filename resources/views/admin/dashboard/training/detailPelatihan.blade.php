@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pelatihan</h1>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <a href="/dashboard/training/{{ $training->slug }}/edit" class="btn btn-primary btn-icon-split mr-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Ubah Data</span>
                  </a>
                  <form action="/dashboard/training/{{ $training->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-icon-split" onclick="return confirm('Hapus?')">
                      <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Hapus Data</span>
                    </button>
                  </form>
                    <a href="/dashboard/training" class="btn btn-primary btn-circle btn-sm float-sm-right">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </div>
                <div class="card-body">
                  <h2 class="mb-3">{{ $training->tittle }}</h2>
                  <div class="row">
                    <div class="col-lg-7">
                      <div class="row">
                        <div class="col-lg-12">
                          @if ($training->image)
                            <img src="{{ asset('storage/' . $training->image) }}" class="img-fluid">
                          @else
                            <img src="/img/default_pelatihan.png" class="img-fluid">
                          @endif
                        </div>
                      </div>
                      <article class="my-3 fs-5">
                        <div class="row">
                          <div class="col-lg-10">
                            <p class="font-weight-bold">Pelatih: {{ $training->trainer }} | Diterbitkan: {{ date('d/m/Y', strtotime($training->created_at)) }}</p>
                            <p>{!! $training->desc_body !!}</p>
                          </div>
                        </div>
                      </article>
                    </div>
                    {{-- List Modul --}}
                    <div class="col-lg-5">
                      <h5 class="mb-3">List Modul {{ $training->tittle }}</h5>
                      <ul class="list-group">
                        @foreach ($modules as $module)
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $module->subject }}
                            <div class="d-flex justify-content-end">
                              <a href="/dashboard/module/{{ $module->slug }}/edit" class="badge badge-primary p-2 mr-2"><i class="bi bi-pencil"></i></a>
                              <form action="/dashboard/module/{{ $module->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge badge-danger p-2 border-0" onclick="return confirm('Hapus?')"><i class="bi bi-trash"></i></button>
                              </form>
                            </div>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection