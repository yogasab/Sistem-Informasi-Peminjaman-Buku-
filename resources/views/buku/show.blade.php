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
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Details</strong>

            <h3 class="mb-0">{{ $book->judul_buku }} ({{ $book->tahun_terbit }})</h3>
            <div class="mb-1 text-muted">{{ $book->penulis }}</div>
            <p class="card-text mb-auto">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis cumque magni veniam error, esse facilis
              iusto debitis ullam perferendis odit?
            </p>
            <div class="row">
              <form class="form-inline mb-4" method="POST" action="{{ route('peminjaman.store') }}"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="anggota_id" value="{{ Auth::guard('anggota')->user()->id }}">
                <input type="hidden" name="buku_id" value="{{ $book->id }}">
                <input type="hidden" name="admin_id" value="1">
                <button type="submit" class="btn btn-success font-weight-bold ml-3 mt-4">Ajukan Peminjaman</button>
                <div class="form-group mt-4">
                  <label for="tgl_kembali" class="ml-4 mr-2">Tanggal Pengembalian</label>
                  <input name="tgl_kembali" class="date form-control @error('tgl_kembali') is-invalid @enderror"
                    type="text">
                </div>
              </form>
            </div>
          </div>
          <div class="col-auto d-none d-lg-block mb-0">
            <img class="card-img-top" style="height: 245px; width: 200px" src="/img/{{ $book->nama_gambar }}"
              alt="Card image cap">
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <a href="{{ route('buku.index') }}" class="btn btn-info py-0 mr-3 ml-2 font-weight-bold">
          Kembali
        </a>
      </div>
    </div>
  </div>
</div>
@endsection

@push('script')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $('.date').datepicker({  
     format: 'mm-dd-yyyy'
   });  
</script>

@endpush