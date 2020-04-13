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
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <span class="username">
                          <a href="#"><b>
                          {{ $pengaduan->users->name }}
                          </b></a>
                      </span>
                      <br>
                      <span class="description" style="font-size:10pt;">
                      Dipublikasikan pada, {{ $pengaduan->tanggal_aduan }}
                      </span>
                    </div>
                    <div class="card-body">
                      <div class="post">
                          <!-- /.user-block -->
                          <h4 class="text-primary">{{ $pengaduan->judul_aduan }}</h4>
                          <p class="text-justify">
                            {{ $pengaduan->isi_aduan }}
                          </p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
              @if($tanggapan == TRUE)
              <label for="" class="ml-2">Dibalas</label>
              @foreach($tanggapan as $t)
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                      <span class="username">
                          <a href="#"><b>
                          {{ $t->name }}
                          </b></a>
                      </span>
                      <br>
                      <span class="description" style="font-size:10pt;">
                      Dipublikasikan pada, {{ $t->tanggal_tanggapan }}
                      </span>
                  </div>
                  <div class="card-body">
                    <div class="post">
                        <!-- /.user-block -->
                        <p class="text-justify">
                        {{ $t->isi_tanggapan }}
                        </p>
                        <!-- <div class="form-group">
                            <label for="Balas">Balas</label>
                            <textarea class="form-control" name="Balas" id="Balas" cols="30" rows="10"></textarea>
                        </div> -->
                        <!-- <button type="submit" class="btn btn-success">Kirim</button> -->
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              @endif
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
@endsection
