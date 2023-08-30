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
            <div class="col-lg-12">
                <div class="card border-top-info p-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="table-secondary text-center">
                                <th>No.</th>
                                <th>Nama Penyewa</th>
                                <th>Jenis Kendaraan</th>
                                <th>Nomor Kendaraan</th>
                                <th>STNK</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Akhir Sewa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($post as $posts)
                            <tr class="text-center hasil-filter">
                                <td>{{$no++}}.</td>
                                <td>{{$posts->user->nama_penyewa}}</td>
                                <td>{{$posts->jenis_kendaraan}}</td>  
                                <td>{{$posts->no_kendaraan}}</td>     
                                <td>{{$posts->no_stnk}}</td>     
                                <td>{{$posts->tgl_sewa}}</td>     
                                <td>{{$posts->tgl_akhir}}</td>     
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
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