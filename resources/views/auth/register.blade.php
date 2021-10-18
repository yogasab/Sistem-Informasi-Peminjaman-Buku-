@extends('layouts.auth')


@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-1 d-none d-lg-block"></div>
      <div class="col-lg-10">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Create an Account!</h1>
          </div>
          @isset($url)
          <form class="user" method="POST" action="{{ url("register/$url") }}" enctype="multipart/form-data">
            @else
            <form class="user" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
              @endisset
              @csrf
              <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                  <input type="text" name="name"
                    class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleFirstName"
                    placeholder="First Name">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                  placeholder="Email Address">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input name="password" type="password"
                    class="form-control form-control-user @error('password') is-invalid @enderror"
                    id="exampleInputPassword" placeholder="Password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="col-sm-6">
                  <input name="password_confirmation" type="password" class="form-control form-control-user"
                    id="exampleRepeatPassword" placeholder="Repeat Password">
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block font-weight-bold">
                Register Account
              </button>
              <hr>
            </form>
            <div class="text-center">
              <a class="small font-weight-bold" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
              <a class="small font-weight-bold" href="{{ route('login') }}">Already have an account? Login!</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection