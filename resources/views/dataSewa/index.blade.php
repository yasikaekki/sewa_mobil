@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.header')
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @if(session()->get('sukses'))
        <div class="alert alert-success">
            {{session()->get('sukses')}}
        </div>
        @endif
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            @if ($akun->role->jenis_role == "User" || $akun->role->jenis_role == "Seller")               
            <div class="row d-flex justify-content-center">
                @if($data == null)
                <div class="col-lg-7">
                    <div class="card p-5">
                        <div class="card-body p-4">
                            <div class="text-center text-warning mb-4">
                                <i class="bi bi-emoji-frown display-1"></i>
            
                            </div>
                            <p class="fs-5 text-center">Mohon maaf<br>Sepertinya belum ada data peminjaman</p>
                        </div>
                        
                    </div>
                </div>
                @else    
                <div class="col-lg-12">
                    <div class="card border-top-info p-4">
                        <div class="card-body">
                            @if ($akun->role->jenis_role == "User")
                            <table class="table table-bordered">
                                <thead>
                                <tr class="table-secondary text-center">
                                    <th>No.</th>
                                    <th>Nama Jasa Penyewa</th>
                                    <th>Foto Kendaraan</th>
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
                                <tr class="text-center">
                                    <td>{{$no++}}.</td>
                                    <td>{{$posts->user->name}}</td>
                                    <td><img src="{{asset('assets/foto mobil/'.$posts->foto_profil)}}" width="50" height="50"></td>
                                    <td>{{$posts->nama_kendaraan}}</td>  
                                    <td>{{$posts->no_kendaraan}}</td>     
                                    <td>{{$posts->no_stnk}}</td>     
                                    <td>{{strftime("%d %B %Y", strtotime($posts->updated_at))}}</td>     
                                    <td>{{strftime("%d %B %Y", strtotime($posts->masa_akhir))}}</td> 
                                    <td>
                                        <form action="{{route('data_sewa.destroy',$posts->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-success">Kembalikan</button>
                                        </form>
                                    </td>      
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
                                    <th>Foto Kendaraan</th>
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
                                <tr class="text-center">
                                    <td>{{$no++}}.</td>
                                    @foreach ($posts->terpinjam as $terpinjams)
                                    <td>{{$terpinjams->user->name}}</td>
                                    @endforeach
                                    <td><img src="{{asset('assets/foto mobil/'.$posts->foto_profil)}}" width="50" height="50"></td>  
                                    <td>{{$posts->nama_kendaraan}}</td>  
                                    <td>{{$posts->no_kendaraan}}</td>     
                                    <td>{{$posts->no_stnk}}</td>     
                                    <td>{{strftime("%d %B %Y", strtotime($posts->updated_at))}}</td>     
                                    <td>{{strftime("%d %B %Y", strtotime($posts->masa_akhir))}}</td> 
                                    @foreach ($posts->terpinjam as $terpinjams) 
                                    <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$terpinjams->id}}">
                                        Laporkan
                                    </button>
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{($terpinjams->id)}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{route('data_sewa.store')}}" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pengaduan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="post_car_id" value="{{$posts->id}}">
                                                <div class="form-group mb-3">
                                                    <label>Nama Penyewa</label>
                                                    <input readonly type="text" value="{{$terpinjams->user->name}}" class="form-control @error('user_id') is-invalid @enderror" placeholder="Nama Penyewa">
                                                    <input type="hidden" name="user_id" value="{{$terpinjams->user->id}}">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Alasan laporan</label>
                                                    <input type="text" value="{{old('jenis_keluhan')}}" class="form-control @error('jenis_keluhan') is-invalid @enderror" name="jenis_keluhan" placeholder="Alasan Laporan">
                                                    @error('jenis_keluhan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Laporkan</button>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>      
                                    @endforeach
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @else
            <div class="row d-flex justify-content-center">
               @if($data == null)
               <div class="col-lg-7">
                <div class="card p-5">
                    <div class="card-body p-4">
                        <div class="text-center text-warning mb-4">
                            <i class="bi bi-emoji-frown display-1"></i>
        
                        </div>
                        <p class="fs-5 text-center">Mohon maaf<br>Sepertinya belum ada data postingan</p>
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
                                    <th>Nama Jasa Penyewa</th>
                                    <th>Foto Kendaraan</th>
                                    <th>Nama Kendaraan</th>
                                    <th>Nomor Kendaraan</th>
                                    <th>Telepon</th>
                                    <th>STNK</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($post as $posts)
                                <tr class="text-center">
                                    <td>{{$no++}}.</td>
                                    <td>{{$posts->user->name}}</td>
                                    <td><img src="{{asset('assets/foto mobil/'.$posts->foto_profil)}}" width="50" height="50"></td>  
                                    <td>{{$posts->nama_kendaraan}}</td>  
                                    <td>{{$posts->no_kendaraan}}</td>     
                                    <td>{{$posts->user->telepon}}</td>     
                                    <td>{{$posts->no_stnk}}</td>      
                                    <td>
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-danger" type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$posts->id}}">Hapus <i class="bi bi-trash"></i></button>
                                    <div class="modal fade" id="staticBackdrop{{$posts->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="p-3">
                                              <div class="d-flex justify-content-center py-4">
                                                <i class="bi bi-exclamation-triangle text-warning display-1"></i>
                                              </div>
                                              <div class="d-flex justify-content-center">
                                                <h4 class="text-dark text-center fw-bold px-5">Apakah kamu yakin ingin menghapus postingan {{$posts->nama_kendaraan}} ?</h4>
                                              </div>
                                              <div class="d-flex justify-content-evenly p-3">
                                                <button class="btn btn-primary py-3 px-4" data-bs-dismiss="modal" aria-label="Close">Batal <i class="bi bi-x-square"></i></button>
                                                <form action="{{route('sewa_mobil.destroy', $posts->id)}}" method="post">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger py-3 px-4">Hapus <i class="bi bi-trash"></i></button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>    
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>    
               @endif 
            </div>    
            @endif
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection