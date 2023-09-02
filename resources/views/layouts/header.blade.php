<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{$judul}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            @if ($judul == "Beranda")
            <li class="breadcrumb-item active"><a href="#">$judul</a></li>   
            @elseif($judul == "Akun")
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>  
            <li class="breadcrumb-item active">{{$judul}}</li>
            @elseif($judul == "Ubah Akun")
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>  
            <li class="breadcrumb-item"><a href="#">Akun</a></li>  
            <li class="breadcrumb-item active">{{$judul}}</li>
            @elseif($judul == "Sewa Kendaraan")
            <li class="breadcrumb-item"><a href="#">Beranda</a></li> 
            <li class="breadcrumb-item active">{{$judul}}</li>
            @elseif($judul == "Tambah Data Kendaraan")
            <li class="breadcrumb-item"><a href="#">Beranda</a></li> 
            <li class="breadcrumb-item"><a href="#">Sewa Kendaraan</a></li> 
            <li class="breadcrumb-item active">{{$judul}}</li>
            @elseif($judul == "Ubah Data Kendaraan")
            <li class="breadcrumb-item"><a href="#">Beranda</a></li> 
            <li class="breadcrumb-item"><a href="#">Sewa Kendaraan</a></li> 
            <li class="breadcrumb-item active">{{$judul}}</li>
            @elseif($judul == "Data Sewa")
            <li class="breadcrumb-item"><a href="#">Beranda</a></li> 
            <li class="breadcrumb-item active">{{$judul}}</li>
            @elseif($judul == "Data Akun")
            <li class="breadcrumb-item"><a href="#">Beranda</a></li> 
            <li class="breadcrumb-item active">{{$judul}}</li>
            @elseif($judul == "Tambah Akun")
            <li class="breadcrumb-item"><a href="#">Beranda</a></li> 
            <li class="breadcrumb-item"><a href="#">Data Akun</a></li> 
            <li class="breadcrumb-item active">{{$judul}}</li>
            @elseif($judul == "Perbarui Akun")
            <li class="breadcrumb-item"><a href="#">Beranda</a></li> 
            <li class="breadcrumb-item"><a href="#">Data Akun</a></li> 
            <li class="breadcrumb-item active">{{$judul}}</li>
            @elseif($judul == "Data Keluhan")
            <li class="breadcrumb-item"><a href="#">Beranda</a></li> 
            <li class="breadcrumb-item active">{{$judul}}</li>
            @elseif($judul == "Data Terlapor")
            <li class="breadcrumb-item"><a href="#">Beranda</a></li> 
            <li class="breadcrumb-item"><a href="#">Data Keluhan</a></li> 
            <li class="breadcrumb-item active">{{$judul}}</li>
            @endif
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>