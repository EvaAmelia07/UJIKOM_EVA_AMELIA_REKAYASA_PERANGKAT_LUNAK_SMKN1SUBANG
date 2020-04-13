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
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info" >
              <div class="inner">
                <h3 class="text-white">1</h3>

                <p class="text-white">Keluhan</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-download"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>1<sup style="font-size: 20px"></sup></h3>

                <p>Diverifikasi</p>
              </div>
              <div class="icon">
                <i class="fas fa-check-circle"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0</h3>

                <p>Ditolak</p>
              </div>
              <div class="icon">
                <i class="fas fa-times-circle"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box" style="background-color:#96858f">
              <div class="inner">
                <h3 class="text-white">1</h3>

                <p class="text-white">Pengguna</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
          
            </div>
          </div>
          <!-- ./col -->
      </div>
      <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Laporan</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body p-0">
        <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th class="text-center">
                          No
                      </th>
                      <th class="text-center">
                         Tanggal
                      </th>
                      <th class="text-center">
                         Keluhan
                      </th>
                      <th class="text-center">
                        Pengirim
                      </th>
                      <th class="text-center">
                          Status
                      </th>
                      <th class="text-center">
                        Aksi
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach($pengaduan as $aduan)
                  <tr>
                      <td class="text-center">
                          {{$loop->iteration}}
                      </td>
                      <td class="text-center">
                          <a>
                          {{ $aduan->tanggal_aduan }}
                          </a>
                          
                      </td>
                      <td class="text-center">
                      {{ $aduan->judul_aduan }}
                      </td>
                      <td class="text-center">
                      {{ $aduan->users->name }}
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success">Diterima</span>
                      </td>
                      <td class="project-actions text-center">
                          <a class="btn btn-primary btn-sm" href="{{route('admin.aduan.detail', $aduan->id)}}">
                              <i class="fas fa-eye">
                              </i>
                             Lihat Detail
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
        </div>
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
