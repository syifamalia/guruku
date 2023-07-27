@extends('admin.layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pelatihan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $training }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Diklat</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $diklat }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book-reader fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Admin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admin }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Pelatihan Terbaru -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Program Pelatihan Terbaru</h6>
                </div>
                <div class="card-body">
                    @if ($newTraining->count())
                        @foreach ($newTraining as $new)
                        <div class="list-group">
                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1">{{ $new->tittle }}</p>
                                    <small>{{ $new->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1">{{ $new->desc }}</p>
                                <small>{{ $new->trainer }}</small>
                            </div>
                          </div>
                        @endforeach
                    @else
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="/admins/img/not_found.png" alt="Not Found">
                            <p class="text-muted">Data Tidak Ditemukan!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Diklat Terbaru -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Program Diklat Terbaru</h6>
                </div>
                <div class="card-body">
                    @if ($newDiklat->count())
                        @foreach ($newDiklat as $new)
                        <div class="list-group">
                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="h5 mb-1">{{ $new->tittle }}</p>
                                    <small>{{ $new->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1">{{ $new->desc }}</p>
                                <small>{{ $new->trainer }}</small>
                            </div>
                          </div>
                        @endforeach
                    @else
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="/admins/img/not_found.png" alt="Not Found">
                            <p class="text-muted">Data Tidak Ditemukan!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection