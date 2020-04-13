<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <!-- <a href="/assets/index3.html" class="navbar-brand">
        <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a> -->
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          @hasrole('admin')
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.beranda.petugas')}}" class="nav-link"> Data Petugas</a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.beranda.masyarakat')}}" class="nav-link"> Data Masyarakat</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"> Cetak Laporan</a>
          </li>
          
          @endhasrole
          
          @hasrole('petugas')
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="{{route('petugas.beranda.petugas')}}" class="nav-link"> Data Petugas</a>
          </li>
          <li class="nav-item">
            <a href="{{route('petugas.beranda.masyarakat')}}" class="nav-link"> Data Masyarakat</a>
          </li>
          
          @endhasrole
          
           
          @hasrole('masyarakat')
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="{{route('masyarakat.beranda.aduan')}}" class="nav-link">Tulis Aduan</a>
          </li>
          <li class="nav-item">
            <a href="{{route('masyarakat.beranda.aduansaya')}}" class="nav-link">Lihat Aduan Saya</a>
          </li>
          
          @endhasrole



          <li class="nav-item">
            <a href="{{route('tentang')}}" class="nav-link">Tentang Aplikasi</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        
        <!-- Notifications Dropdown Menu -->
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> logout</a>
          <form id="logout-form" action="{{route('logout')}}" method="POST" style="display; none;">
            @csrf
          </form>
        </li>
      </ul>
    </div>
  </nav>