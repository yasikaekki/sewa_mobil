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
                <form action="{{route('sewa_mobil.submit',$post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <img class="logo-profil" src="{{asset('assets/foto produk/'.$post->foto_profil)}}" id="logo-image" width="180" height="180">

                    <div class="form-group mb-3">
                        <div class="row">
                            <label>Nama Kendaraan</label>
                            <input readonly type="text" value="{{$post->nama_kendaraan}}" class="form-control @error('nama_kendaraan') is-invalid @enderror" name="nama_kendaraan" placeholder="Nama Kendaraan">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <label>Harga Sewa</label>
                            <input readonly type="number" value="{{$post->harga}}" class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="Harga Sewa">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <label>Nomor Kendaraan</label>
                            <input readonly type="number" value="{{$post->no_kendaraan}}" class="form-control @error('no_kendaraan') is-invalid @enderror" name="no_kendaraan" placeholder="Nomor Kendaraan">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <label>Nomor STNK</label>
                            <input readonly type="number" value="{{$post->no_stnk}}" class="form-control @error('no_stnk') is-invalid @enderror" name="no_stnk" placeholder="Nomor STNK">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <label>Tanggal Akhir Peminjaman</label>
                            <input type="date" value="{{$post->masa_akhir}}" class="form-control @error('masa_akhir') is-invalid @enderror" name="masa_akhir" placeholder="Tanggal Akhir Peminjaman">
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