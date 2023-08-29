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
          <div class="col-lg-3 col-6">
            <div class="card">
              <div class="card-body">
                <img src="{{asset('public/img/photo1.png')}}" width="220" height="220">
                <h4 class="text-center mt-3">Verari</h4>
                <p class="card-text">
                  No. Kendaraan:
                  <br>
                  STNK:
                </p>
                <div class="d-flex mx-auto justify-content-center">

                  <a href="./portfolio/p1.html" class="btn btn-primary col-6">Sewa</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="card">
              <div class="card-body">
                <img src="{{asset('public/img/photo1.png')}}" width="220" height="220">
                <h4 class="text-center mt-3">Verari</h4>
                <p class="card-text">
                  No. Kendaraan:
                  <br>
                  STNK:
                </p>
                <div class="d-flex mx-auto justify-content-center">

                  <a href="./portfolio/p1.html" class="btn btn-primary col-6">Sewa</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="card">
              <div class="card-body">
                <img src="{{asset('public/img/photo1.png')}}" width="220" height="220">
                <h4 class="text-center mt-3">Verari</h4>
                <p class="card-text">
                  No. Kendaraan:
                  <br>
                  STNK:
                </p>
                <div class="d-flex mx-auto justify-content-center">

                  <a href="./portfolio/p1.html" class="btn btn-primary col-6">Sewa</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="card">
              <div class="card-body">
                <img src="{{asset('public/img/photo1.png')}}" width="220" height="220">
                <h4 class="text-center mt-3">Verari</h4>
                <p class="card-text">
                  No. Kendaraan:
                  <br>
                  STNK:
                </p>
                <div class="d-flex mx-auto justify-content-center">

                  <a href="./portfolio/p1.html" class="btn btn-primary col-6">Sewa</a>
                </div>
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