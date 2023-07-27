@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kategori Artikel</h1>
    <p class="mb-4">Memuat daftar kategori artikel</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-sm-left">Kategori Artikel</h6>
            <a href="/dashboard/article" class="btn btn-info btn-icon-split float-sm-right ml-3">
                <span class="icon text-white-50">
                    <i class="fas fa-list"></i>
                </span>
                <span class="text">List Artikel</span>
            </a>
            <a href="/dashboard/article-category/create" class="btn btn-primary btn-icon-split float-sm-right">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambahkan Data Baru</span>
            </a>
        </div>
        <div class="card-body">
            @if (session('added'))
                <div class="alert alert-success col-6">
                    {{ session('added') }}
                </div>
            @endif
            @if ($articleCat->count())
                <ul class="list-group col-6">
                    @foreach ($articleCat as $kategori)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="ms-2 me-auto">
                                <div class="font-weight-bold">{{ $kategori->tittle }}</div>
                                Jumlah Artikel: {{ $articles->where('article_category_id', $kategori->id)->count() }}
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="/dashboard/article-category/{{ $kategori->slug }}/edit" class="badge badge-info p-2 mr-2"><i class="bi bi-pencil"></i></a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center text-muted">Kategori Tidak Ditemukan.</p>
            @endif
        </div>
    </div>

</div>

@endsection