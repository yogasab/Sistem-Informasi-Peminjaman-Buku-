@extends('layouts.main')

@section('content')
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
          <span class="mr-2 d-none d-lg-inline text-gray-600 small font-weight-bold">{{
            Auth::guard('admin')->user()->name }}</span>
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
    <h1 class="h3 mb-3 font-weight-bold text-gray-800">Buku</h1>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">X</button>
      <strong>{{ $message }}</strong>
    </div>
    @endif
    {{--
    <!-- DataTales Example --> --}}
    <div class="card shadow">
      <div class="card-header py-3">
        <h5 class="font-weight-bold text-primary">Daftar Buku
          <a href="{{ route('admin.buku.create') }}" class="btn ml-4 btn-primary font-weight-bold">
            + Tambah Buku
          </a>
        </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Kode Buku</th>
                <th>Stok Buku</th>
                <th>Cover</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Kode Buku</th>
                <th>Stok Buku</th>
                <th>Cover</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($books as $buku)
              <tr>
                <td>{{ $buku->judul_buku }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ $buku->tahun_terbit }}</td>
                <td>{{ $buku->kode_buku }}</td>
                <td>{{ $buku->stok_buku }}</td>
                <td>
                  <img src="/img/{{ $buku->nama_gambar }}" alt="img" class="w-50">
                </td>
                <td>
                  <span>
                    <a href="{{ route('admin.buku.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
                  </span>
                  <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <span>
                      <button onclick="return confirm('Are you sure?')" class="btn btn-danger d-block" type="submit">
                        Hapus
                      </button>
                    </span>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection