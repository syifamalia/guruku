@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Partisipan Diklat</h1>
    <p class="mb-4">Memuat daftar partisipan diklat</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-sm-left">Partisipan Diklat</h6>
            <a href="/dashboard/diklat" class="btn btn-info btn-icon-split float-sm-right ml-3">
                <span class="icon text-white-50">
                    <i class="fas fa-list"></i>
                </span>
                <span class="text">List Diklat</span>
            </a>
        </div>
        <div class="card-body">
            @if (session('edited'))
                <div class="alert alert-success">
                    {{ session('edited') }}
                </div>
            @endif
            {{-- Table Partisipan --}}
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No. </th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Sertifikat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>No. </th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Sertifikat</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($participants as $participant)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $participant->user->name }}</td>
                            <td>{{ $participant->email }}</td>
                            <td class="text-center">
                                @if ($participant->status == "Tidak Aktif")
                                    <span class="badge badge-danger p-2">{{ $participant->status }}</span>
                                @endif
                                @if ($participant->status == "Aktif")
                                    <span class="badge badge-success p-2">{{ $participant->status }}</span>
                                @endif
                                @if ($participant->status == "Selesai")
                                    <span class="badge badge-info p-2">{{ $participant->status }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($participant->certificate == NULL)
                                    <span class="badge badge-danger p-2">Belum Selesai</span>
                                @else
                                    <span class="badge badge-success p-2">Telah Selesai</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="/dashboard/diklat-partisipan/{{ $participant->id }}/edit" class="btn btn-info btn-sm">
                                    <span class="text">Ubah</span>
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