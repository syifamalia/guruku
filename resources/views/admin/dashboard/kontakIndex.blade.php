@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kontak</h1>
    <p class="mb-4">Memuat daftar yang mengirim pesan di Guruku</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-sm-left">Data Pesan Guruku</h6>
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
                            <th>Nama</th>
                            <th>Panggilan</th>
                            <th>Email</th>
                            <th>No. Telp</th>
                            <th>Pesan</th>
                            <th>Tanggal Dikirim</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>No. </th>
                            <th>Nama</th>
                            <th>Panggilan</th>
                            <th>Email</th>
                            <th>No. Telp</th>
                            <th>Pesan</th>
                            <th>Tanggal Dikirim</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($contacts as $kontak)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $kontak->name }}</td>
                            <td>{{ $kontak->title }}</td>
                            <td>{{ $kontak->email }}</td>
                            <td>{{ $kontak->phone }}</td>
                            <td>{{ $kontak->message }}</td>
                            <td class="text-center">{{ date('d/m/Y', strtotime($kontak->created_at)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection