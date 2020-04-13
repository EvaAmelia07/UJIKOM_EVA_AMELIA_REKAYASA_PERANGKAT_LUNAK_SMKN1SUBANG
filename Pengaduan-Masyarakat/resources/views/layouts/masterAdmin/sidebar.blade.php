<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @hasrole('admin')
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link bg-primary">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Laporan 
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="{{route('admin.beranda.petugas')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Petugas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.beranda.masyarakat')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Masyarakat
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Tentang Aplikasi
              </p>
            </a>
          </li>
          @endhasrole
          @hasrole('petugas')
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Data Master
              </p>
            </a>
          </li> -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link bg-primary">
              <i class="nav-icon fas fa-home"></i>
              <p>
               Data Pengaduan
              </p>
            </a>
           
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Data Petugas
              </p>
            </a>
           
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Data Pengguna
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Tentang Aplikasi
              </p>
            </a>
          </li>
          @endhasrole
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside> -->