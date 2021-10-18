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
      <div class="topbar-divider d-none d-sm-block"></div>
      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          {{-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span> --}}
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
    <h1 class="h3 mb-3 font-weight-bold text-gray-800">Pinjam Buku</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">Ajukan Peminjaman Buku</h5>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="judul_buku">Judul</label>
            <input type="text" class="form-control @error('judul_buku') is-invalid @enderror" id="judul_buku"
              name="judul_buku" placeholder="Nama Buku" value="{{ old('judul_buku') }}">
            @error('judul_buku')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" id="penulis" class="form-control @error('penulis') is-invalid @enderror" id="penulis"
              name="penulis" placeholder="Jumlah Buku" value="{{ old('penulis') }}">
            @error('penulis')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="text" id="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror"
              id="tahun_terbit" name="tahun_terbit" placeholder="Harga Buku" value="{{ old('tahun_terbit') }}">
            @error('tahun_terbit')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="kode_buku">Kode Buku</label>
            <input type="text" id="kode_buku" class="form-control @error('kode_buku') is-invalid @enderror"
              id="kode_buku" name="kode_buku" placeholder="Harga Buku" value="{{ old('kode_buku') }}">
            @error('kode_buku')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="stok_buku">Stok Buku</label>
            <input type="text" id="stok_buku" class="form-control @error('stok_buku') is-invalid @enderror"
              id="stok_buku" name="stok_buku" placeholder="Harga Buku" value="{{ old('stok_buku') }}">
            @error('stok_buku')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <button type="submit" class="btn btn-info">Tambah</button>
        </form>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection