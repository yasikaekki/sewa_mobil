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
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                    <a href="{{route('anggota.create')}}" class="btn btn-success"><i class="bi bi-sliders"></i> Tambah</a>
                </div>
                <div class="card border-top-info p-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="table-secondary text-center">
                                <th>No.</th>
                                <th>Nama Pengguna</th>
                                <th>Jenis Role</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Nomor SIM</th>
                                <th>Nomor NPWP</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $users)
                            <tr class="text-center hasil-filter">
                                <td>{{$no++}}.</td>
                                <td>{{$users->name}}</td>
                                <td>{{$users->role->jenis_role}}</td>  
                                <td>{{$users->alamat}}</td>     
                                <td>{{$users->telepon}}</td>     
                                <td>{{$users->no_sim}}</td>
                                @if ($users->no_npwp == null)
                                <td>-</td>
                                @else
                                <td>{{$users->no_npwp}}</td>
                                @endif
                                @if ($users->role->jenis_role == "Admin")
                                <td><a href="" class="btn btn-primary col-6">Ubah</a></td>      
                                @else
                                <td>
                                    <a href="{{route('anggota.edit',Crypt::encrypt($users->id))}}" class="btn btn-primary">Ubah</a>
                                    <button class="btn btn-danger col-6" type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Hapus</button>
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="p-3">
                                              <div class="d-flex justify-content-center py-4">
                                                <i class="bi bi-exclamation-triangle text-warning display-1"></i>
                                              </div>
                                              <div class="d-flex justify-content-center">
                                                <h4 class="text-dark text-center fw-bold px-5">Apakah kamu yakin ingin menghapus akun {{$users->name}} ?</h4>
                                              </div>
                                              <div class="d-flex justify-content-evenly p-3">
                                                <button class="btn btn-primary py-3 px-4" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                                                <form action="{{route('anggota.destroy', $users->id)}}" method="post">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger py-3 px-4">Hapus</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </td>
                                @endif
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