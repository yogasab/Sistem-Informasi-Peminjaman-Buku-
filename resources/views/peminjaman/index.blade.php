@extends('layouts.main')

@section('content')
<!-- Main Content -->
<div id="content">
  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          @auth('anggota')
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">
            {{ Auth::guard('anggota')->user()->name }}
          </span>
          @endauth
          <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- End of Topbar -->
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>
    <!-- Content Row -->
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h4 class="font-lg font-weight-bold text-primary font-weight-bold">Daftar Permohonan Peminjaman Anda</h4>
            {{-- <a class="btn btn-info" href="{{ route('peminjaman.create') }}">+ Ajukan Pinjaman Buku</a> --}}
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Kode Buku</th>
                    <th>Peminjam</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Kode Buku</th>
                    <th>Peminjam</th>
                    <th>Status</th>
                  </tr>
              </tfoot>
                <tbody>
                  @if ($anggotas->count())
                  @foreach ($anggotas as $anggota)
                  <tr>
                    <td>{{ $anggota->buku->judul_buku }}</td>
                    <td>{{ $anggota->buku->penulis }}</td>
                    <td>{{ $anggota->buku->tahun_terbit }}</td>
                    <td>{{ $anggota->buku->kode_buku }}</td>
                    <td>{{ $anggota->anggota->name }}</td>
                    {{-- Status --}}
                    @if ($anggota->status == 'Approved')
                    <td class="font-weight-bold text-success">{{ $anggota->status }}</td>
                    @elseif($anggota->status == 'Waiting')
                    <td class="font-weight-bold text-warning">{{ $anggota->status }}</td>
                    @elseif($anggota->status == 'Done')
                    <td class="font-weight-bold text-success">{{ $anggota->status }}</td>
                    @else
                    <td class="font-weight-bold text-danger">{{ $anggota->status }}</td>
                    @endif
                    {{-- End Status --}}
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td>Anda belum memilik riwayat peminjaman</td>
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection