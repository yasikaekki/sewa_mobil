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
                        @if ($akun->role->jenis_role == "User")
                        <table class="table table-bordered">
                            <thead>
                            <tr class="table-secondary text-center">
                                <th>No.</th>
                                <th>Nama Jasa Penyewa</th>
                                <th>Nama Kendaraan</th>
                                <th>Nomor Kendaraan</th>
                                <th>STNK</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Akhir Sewa</th>
                                <th>Aksi</th>
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
                                <td>{{strftime("%d %B %Y", strtotime($posts->updated_at))}}</td>     
                                <td>{{strftime("%d %B %Y", strtotime($posts->masa_akhir))}}</td> 
                                <td><a href="" class="btn btn-success">Kembalikan</a></td>      
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                        @elseif($akun->role->jenis_role == "Seller")
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
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($post as $posts)
                            @if ($posts->status !=null || $posts->masa_akhir != null)
                            <tr class="text-center hasil-filter">
                                <td>{{$no++}}.</td>
                                @foreach ($posts->terpinjam as $terpinjams)
                                <td>{{$terpinjams->user->name}}</td>
                                @endforeach
                                <td>{{$posts->nama_kendaraan}}</td>  
                                <td>{{$posts->no_kendaraan}}</td>     
                                <td>{{$posts->no_stnk}}</td>     
                                <td>{{strftime("%d %B %Y", strtotime($posts->updated_at))}}</td>     
                                <td>{{strftime("%d %B %Y", strtotime($posts->masa_akhir))}}</td> 
                                <td><a href="" class="btn btn-danger">Laporkan</a></td>      
                            </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                        @endif
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