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
                <form action="{{route('anggota.update',$akun->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-3">
                        <div class="row">
                            <label>Nama Lengkap</label>
                            <input type="text" value="{{$akun->name}}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Lengkap">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="row">
                            <label>Alamat</label>
                            <input type="text" value="{{$akun->alamat}}" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Telepon</label>
                        <input id="telepon" type="text" placeholder="Telepon" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ $akun->telepon }}" required autocomplete="telepon" autofocus>
                        @error('telepon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <div class="row">
                            <label>Nomor SIM</label>
                            <input type="text" value="{{$akun->no_sim}}" class="form-control @error('no_sim') is-invalid @enderror" name="no_sim" placeholder="Nomor Sim">
                            @error('no_sim')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>No. NPWP</label>
                        <input type="text" value="{{$akun->no_npwp}}" class="mb-3 form-control @error('no_npwp') is-invalid @enderror" placeholder="No. NPWP" name="no_npwp">
                        @error('no_npwp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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