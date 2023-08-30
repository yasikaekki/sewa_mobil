@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.header')
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 col-3">
            <div class="card bordewr-top-info p-4">
              <div class="card-body">
                <form action="{{route('sewa_mobil.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <img class="logo-profil" src="{{asset('public/img/photo1.png')}}" id="logo-image" width="180" height="180">
                    <div class="form-group">
                        <label>Upload Foto</label>
                        <input type="file" accept="image/png, image/jpeg" name="foto_profil" class="form-control @error('foto_profil') is-invalid @enderror" onchange="previewProfil(event)">
                        @error('foto_profil')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <script>
                        var previewProfil = function(event) {
                            var fotoProfil = document.getElementById('logo-image');
                            fotoProfil.src = URL.createObjectURL(event.target.files[0]);
                            fotoProfil.onload = function() {
                                URL.revokeObjectURL(fotoProfil.src) 
                            }
                        };
                    </script>

                    <div class="form-group mb-3">
                        <div class="row">
                            <label>Nama Kendaraan</label>
                            <input type="text" value="{{old('nama_kendaraan')}}" class="form-control @error('nama_kendaraan') is-invalid @enderror" name="nama_kendaraan" placeholder="Nama Kendaraan">
                            @error('nama_kendaraan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <label>Harga Sewa</label>
                            <input type="number" value="{{old('harga')}}" class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="Harga Sewa">
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <label>Nomor Kendaraan</label>
                            <input type="number" value="{{old('no_kendaraan')}}" class="form-control @error('no_kendaraan') is-invalid @enderror" name="no_kendaraan" placeholder="Nomor Kendaraan">
                            @error('no_kendaraan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <label>Nomor STNK</label>
                            <input type="number" value="{{old('no_stnk')}}" class="form-control @error('no_stnk') is-invalid @enderror" name="no_stnk" placeholder="Nomor STNK">
                            @error('no_stnk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <label>Tanggal Akhir Sewa</label>
                            <input type="date" value="{{old('masa_akhir')}}" class="form-control @error('masa_akhir') is-invalid @enderror" name="masa_akhir" placeholder="Tanggal Akhir Sewa">
                            @error('masa_akhir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary form-control mt-2"><i class="fas fa-save"></i> Buat Akun</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection