@extends('layouts.masterAdmin.master')
@section('title','Masyarakat')
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
              <li class="breadcrumb-item"><a href="#">Halaman Masyarakat</a></li>
            
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Silahkan Edit Aduan</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="{{ route('masyarakat.beranda.update', $pengaduan->id) }}" method="post">
                  @csrf
                  @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">Judul</label>
                        <input class="form-control" type="text" placeholder="Judul:" value="{{ $pengaduan->judul_aduan }}" name="judul_aduan">
                      </div>
                      <div class="form-group">
                        <label for="aduan">Tulis Aduan</label>
                        <textarea class="form-control"name="isi_aduan" id="aduan" cols="30" rows="10">{{ $pengaduan->isi_aduan }}</textarea>
                      </div>
                    </div>
                    <div class="card-footer">
                  <button type="submit" class="btn btn-success">kirim</button>
                </div>
              </form>
            </div>
                </div>
            </div>
        </div>
    </div>
@endsection