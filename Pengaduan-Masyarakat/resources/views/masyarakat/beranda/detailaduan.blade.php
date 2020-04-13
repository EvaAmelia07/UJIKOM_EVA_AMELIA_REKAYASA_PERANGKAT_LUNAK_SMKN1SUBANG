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
                    @if(Auth::user()->hasAnyRole('masyarakat'))
                    {{ $pengaduan->users->name }}
                    @endif
                    </b></a>
                </span>
                <br>
                <span class="description" style="font-size:10pt;">
                Dipublikasikan pada, {{ $pengaduan->tanggal_aduan }}
                </span>
                <div class="card-tools">
                  <div class="input-group input-group-sm">
                    <div class="input-group-append">
                      <a href="{{ route('masyarakat.beranda.edit', $pengaduan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                      <form action="{{ route('masyarakat.beranda.delete', $pengaduan->id) }}" method="POST">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button class="btn btn-danger btn-sm" type="submit">
                          Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
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
      <label for="">Balasan</label>
      <div class="row">
        @if($tanggapan == TRUE)
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
                    </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif
        </div>
      </div>
    </div>
  </div>
    <!-- /.content -->
</div>
@endsection
