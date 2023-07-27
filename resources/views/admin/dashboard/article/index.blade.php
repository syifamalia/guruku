@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Artikel</h1>
    <p class="mb-4">Memuat daftar artikel yang diposting</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-sm-left">Data Artikel</h6>
            <a href="/dashboard/article-category" class="btn btn-info btn-icon-split float-sm-right ml-3">
                <span class="icon text-white-50">
                    <i class="fas fa-list"></i>
                </span>
                <span class="text">List Kategori</span>
            </a>
            <a href="/dashboard/article/create" class="btn btn-primary btn-icon-split float-sm-right">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambahkan Data Baru</span>
            </a>
        </div>
        <div class="card-body">
            @if (session('added'))
                <div class="alert alert-success">
                    {{ session('added') }}
                </div>
            @endif
            @if (session('deleted'))
                <div class="alert alert-danger">
                    {{ session('deleted') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No. </th>
                            <th>Judul Artikel</th>
                            <th>Kategori</th>
                            <th>Excerpt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>No. </th>
                            <th>Judul Artikel</th>
                            <th>Kategori</th>
                            <th>Excerpt</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $article->tittle }}</td>
                            <td>{{ $article->article_category->tittle }}</td>
                            <td>{{ $article->desc }}</td>
                            <td class="text-center">
                                <a href="/dashboard/article/{{ $article->slug }}" class="btn btn-info btn-sm">
                                    <span class="text">Detail</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection