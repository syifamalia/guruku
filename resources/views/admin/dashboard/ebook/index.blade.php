@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ebook</h1>
    <p class="mb-4">Memuat daftar ebook</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-sm-left">Data Ebook</h6>
            <a href="/dashboard/ebook/create" class="btn btn-primary btn-icon-split float-sm-right">
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
                            <th>Judul Ebook</th>
                            <th>Penulis</th>
                            <th>Jumlah Download</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>No. </th>
                            <th>Judul Ebook</th>
                            <th>Penulis</th>
                            <th>Jumlah Download</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($ebooks as $ebook)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $ebook->tittle }}</td>
                            <td>{{ $ebook->author }}</td>
                            <td>{{ $ebook->downloadCount }}</td>
                            <td class="text-center">
                                <a href="/dashboard/ebook/{{ $ebook->slug }}" class="btn btn-info btn-sm">
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