<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('public/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if ($akun->foto_profil == null)
          <img src="{{asset('public/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image" width="60" height="60">
          @else
          <img src="{{asset('assets/foto profil/'.$akun->foto_profil)}}" class="img-circle elevation-2" alt="User Image" width="60" height="60">
          @endif
        </div>
        <div class="info">
          <a href="{{route('profile.index')}}" class="d-block">{{$akun->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            @if ($judul == "Beranda")
            <a href="{{route('home')}}" class="nav-link active">
            @else
            <a href="{{route('home')}}" class="nav-link">   
            @endif
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          @if ($akun->role->jenis_role == "User" || $akun->role->jenis_role == "Seller")
          <li class="nav-item">
            @if ($judul == "Sewa Kendaraan" || $judul == "Tambah Kendaraan" || $judul == "Ubah Kendaraan")
            <a href="{{route('sewa_mobil.index')}}" class="nav-link active">    
            @else    
            <a href="{{route('sewa_mobil.index')}}" class="nav-link">
            @endif
              <i class="nav-icon fa-solid fa-car"></i>
              <p>
                Sewa Mobil
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if ($judul == "Data Sewa")
            <a href="{{route('data_sewa.index')}}" class="nav-link active">    
            @else
            <a href="{{route('data_sewa.index')}}" class="nav-link">
            @endif
              <i class="nav-icon fa-solid fa-clipboard-list"></i>
              <p>
                Data Peminjaman
              </p>
            </a>
          </li>    
          @else
          <li class="nav-item">
            @if ($judul == "Data Akun" || $judul == "Tambah Akun" || $judul == "Ubah Akun")
            <a href="{{route('anggota.index')}}" class="nav-link active">    
            @else
            <a href="{{route('anggota.index')}}" class="nav-link">
            @endif
              <i class="nav-icon fa-solid fa-user-group"></i>
              <p>
                Data Anggota
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if ($judul == "Data Sewa")
            <a href="{{route('data_sewa.index')}}" class="nav-link active">    
            @else     
            <a href="{{route('data_sewa.index')}}" class="nav-link">
            @endif
              <i class="nav-icon fa-solid fa-clipboard-list"></i>
              <p>
                Data Postingan
              </p>
            </a>
          </li>
          <li class="nav-item">
            @if ($judul == "Data Keluhan")
            <a href="{{route('admin.keluhan.index')}}" class="nav-link active">    
            @else 
            <a href="{{route('admin.keluhan.index')}}" class="nav-link">
            @endif
              <i class="nav-icon fa-solid fa-clipboard"></i>
              <p>
                Data Keluhan
              </p>
            </a>
          </li>
          @endif
          <div class="user-panel pb-3 mb-3 d-flex"></div>       
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-power-off nav-icon"></i>
              <p>Keluar</p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>