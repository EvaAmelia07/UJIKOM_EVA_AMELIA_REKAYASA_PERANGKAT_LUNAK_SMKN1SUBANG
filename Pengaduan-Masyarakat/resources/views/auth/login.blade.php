@extends('layouts.LoginMaster.master')
@section('title','Halaman Log in')
@section('content')
<!-- <div class="image" style="background-color: #96858f;">
       <img src="/assets/dist/img/photo1.png" class="img">
   </div> -->
<div class="login-box" >
    <div class="login-logo">
      <a href="/assets/index2.html" style="color:white;"><b>SIKULAT</b></a>
      <h3 style="color:white;"><i>Silahkan Login Aplikasi</i></h3>
     
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body"  >
        <!-- <p class="login-box-msg">Silahkan Login</p> -->

        <form method="POST" action="{{ route('login') }}">
        @csrf
          <div class="input-group mb-3">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
          <div class="input-group mb-3">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>
          <div class="row">
            <!-- <div class="col-4"></div> -->
            <!-- /.col -->
            <!-- <div class="col-4"> -->
              <button type="submit" class="btn btn-block btn-outline-info">Login</button>
            <!-- </div> -->
            <!-- /.col -->
          </div>
        </form>

      
        <!-- /.social-auth-links -->

      
        <p class="mb-0">
          <a href="{{route('register')}}"  class="text-center">Buat Akun</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
@endsection
