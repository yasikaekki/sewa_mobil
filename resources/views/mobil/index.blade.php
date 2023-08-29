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
        <div class="row">
          <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            <a href="{{route('sewa_mobil.create')}}" class="btn btn-primary""><i class="bi bi-sliders"></i> Tambah</a>
          </div>
          @foreach ($post as $posts)
          <div class="col-lg-3 col-6">
            <div class="card">
              <div class="card-body">
               
                <img src="{{asset('assets/foto_profil/'.$posts->foto_profil)}}" width="220" height="220">
                <h4 class="text-center mt-3">{{$posts->nama_mobil}}</h4>
                <p class="card-text">
                  Penyewa : {{$posts->user->name}}
                  <br>
                  No. Kendaraan: {{$posts->no_kendaraan}}
                  <br>
                  STNK: {{$posts->no_stnk}}
                </p>
                <div class="d-flex mx-auto justify-content-center">

                  <a href="./portfolio/p1.html" class="btn btn-primary col-6">Sewa</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection