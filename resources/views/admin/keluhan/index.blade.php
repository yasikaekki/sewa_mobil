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
            @if($data == null)
            <div class="col-lg-7">
                <div class="card p-5">
                    <div class="card-body p-4">
                        <div class="text-center text-warning mb-4">
                            <i class="bi bi-emoji-frown display-1"></i>
                        </div>
                        <p class="fs-5 text-center">Mohon maaf<br>Sepertinya belum ada keluhan</p>
                    </div>
                </div>
            </div>
            @else   
            <div class="col-lg-12">
                <div class="card border-top-info p-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="table-secondary text-center">
                                <th>No.</th>
                                <th>Nama Pelapor</th>
                                <th>Telepon Pelapor</th>
                                <th>Nama Terlapor</th>
                                <th>Telepon Terlapor</th>
                                <th>Foto Kendaraan</th>
                                <th>Nama Kendaraan</th>
                                <th>Nomor Kendaraan</th>
                                <th>Alasan Laporan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lapor as $lapors)
                            <tr class="text-center hasil-filter">
                                <td>{{$no++}}.</td>
                                <td>{{$lapors->post_car->user->name}}</td>  
                                <td>{{$lapors->post_car->user->telepon}}</td>  
                                <td>{{$lapors->user->name}}</td>
                                <td>{{$lapors->user->telepon}}</td>     
                                <td><img src="{{asset('assets/foto mobil/'.$lapors->foto_profil)}}" width="50" height="50"></td>     
                                <td>{{$lapors->post_car->nama_kendaraan}}</td>     
                                <td>{{$lapors->post_car->no_kendaraan}}</td>
                                <td>{{$lapors->jenis_keluhan}}</td>
                                <td><a href="{{route('admin.keluhan.show',Crypt::encrypt($lapors->id))}}" class="btn btn-primary">Lihat</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection