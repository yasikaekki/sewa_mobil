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
                                <th>Nama Kendaraan</th>
                                <th>Nomor Kendaraan</th>
                                <th>STNK</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Akhir Sewa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($post as $posts)
                            @if ($posts->status !=null || $posts->masa_akhir != null)
                            <tr class="text-center hasil-filter">
                                <td>{{$no++}}.</td>
                                <td>{{$posts->user->name}}</td>
                                <td>{{$posts->nama_kendaraan}}</td>  
                                <td>{{$posts->no_kendaraan}}</td>     
                                <td>{{$posts->no_stnk}}</td>     
                                <td>{{strftime("%d %B %Y", strtotime($posts->created_at))}}</td>     
                                <td>{{strftime("%d %B %Y", strtotime($posts->masa_akhir))}}</td>     
                            </tr>
                            @endif
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