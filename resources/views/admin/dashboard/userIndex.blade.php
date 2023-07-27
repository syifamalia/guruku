@extends('admin.layouts.main')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">User</h1>
    <p class="mb-4">Memuat daftar user yang mendaftar di Guruku</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-sm-left">Data User Guruku</h6>
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
                            <th>Email</th>
                            <th>No. Telpon</th>
                            <th>Akun Dibuat</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>No. </th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telpon</th>
                            <th>Akun Dibuat</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td class="text-center">{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                            {{-- <td class="text-center">
                                <a href="/dashboard/user/{{ $user->id }}/edit" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="/dashboard/user/{{ $user->id }}" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection