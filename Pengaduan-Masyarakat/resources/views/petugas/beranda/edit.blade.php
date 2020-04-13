@extends('layouts.masterAdmin.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark">Starter Page</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Halaman Admin</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container- -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
              <div class="col-md-3"></div>
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Ubah data Petugas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('petugas.update.petugas', $users) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" value="{{ $users->nik }}" class="form-control" name='nik' id="nik" placeholder="Masukan Nama">
                  </div>
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" value="{{ $users->name }}" class="form-control" name='name' id="name" placeholder="Masukan Nama">
                  </div>
                  <div class="form-group">
                    <label for="tanggal">tanggal Lahir</label>
                    <input type="date" value="{{ $users->tanggal_lahir }}" class="form-control" name='tanggal_lahir' id="tanggal" placeholder=" masukan tanggal">
                  </div>
                  <div class="form-group">
                    <label for="alamat">alamat</label>
                    <textarea class="form-control"" name="alamat" id="alamat" cols="30" rows="10">{{ $users->alamat }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder=" masukan Password">
                  </div>
                  <div class="form-group">
                    <label for="password">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password" placeholder=" masukan Password">
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Ubah Data</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
