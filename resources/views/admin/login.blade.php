@extends('admin.layouts.auth')@section("htmlheader_title", "Login")

@section('main-content')
<div class="login-box">
  <!-- <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div> -->
  <!-- /.login-logo -->
    <div class="card-header text-center pb-5">
      <img src="{{asset('/public/img/logo.png')}}" width="300">
    </div>
  <div class="card card-outline card-primary shadow">
    <div class="card-header text-center">
      <div class="h2 text-uppercase">Admin Login</div>
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <div class="form-group row">
        <div class="col-md-12">
          @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
          </div>
          @endif

          @if(Session::has('incorrect'))
          <div class="alert alert-danger" role="alert">
            {{ Session::get('incorrect') }}
          </div>
          @endif
        </div>
      </div>
      <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" value="{{old('email', 'admin@admin.com')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
          @enderror
          
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" value="admin@1234" class="form-control @error('email') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group row justify-content-center">
          <div class="col-8"> 
            <button type="submit" class="btn btn-block btn-primary text-uppercase">
              {{ __('Sign In') }}
            </button>
          </div>
        </div>
      </form>
      <div class="card">
        <div class="card-body bg-light">
          <div><b>Demo User: </b></div>
          <div><b>Email:</b> admin@admin.com</div>
          <div><b>Password:</b> admin@1234</div>
        </div>
      </div>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection
