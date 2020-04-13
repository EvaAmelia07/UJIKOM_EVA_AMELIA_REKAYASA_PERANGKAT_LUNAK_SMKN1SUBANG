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
              <li class="breadcrumb-item"><a href="#">Halaman Petugas</a></li>
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
        <div class="col-12">
        <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tabel Data Petugas</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            </button>
          </div>
        </div>
        <div class="card-body p-0">
        <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th class="text-center">
                        NIK
                      </th>
                      <th class="text-center">
                        Nama
                      </th>
                      <th class="text-center">
                        Tanggal Lahir
                      </th>
                      <th>
                        Alamat
                      </th>
                      <th class="text-center">
                         Password
                      </th>
                      <th class="text-center">
                        Aksi
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td class="project-state text-center">
                        <a>
                        {{ $users->nik }}
                        </a>
                      </td>
                      <td class="project-state text-center">
                        <a>
                        {{ $users->name }}
                        </a>
                      </td>
                      <td class="project-state text-center">
                      {{ $users->tanggal_lahir }}
                      </td>
                      <td class="project-state text-center">
                      {{ $users->alamat }}
                      </td>
                      <td class="project-state text-center">
                      {{ $users->password }}
                      </td>
                      <td class="project-actions text-center">
                      <a href="{{ route('petugas.edit.petugas', $users->id) }}" class="btn btn-primary btn-sm">Edit</a>
                      </td>
                  </tr>
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
