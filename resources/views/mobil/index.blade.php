@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.header')
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(session()->get('sukses'))
            <div class="alert alert-success">
                {{session()->get('sukses')}}
            </div>
        @endif
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @if ($akun->role_id == 2)
          <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            <a href="{{route('sewa_mobil.create')}}" class="btn btn-success"><i class="bi bi-sliders"></i> Tambah</a>
          </div>
          @endif
          
          @foreach ($post as $posts)
          <div class="col-lg-3 col-6">
            <div class="card">
              <div class="card-body">
               
                <img src="{{asset('assets/foto produk/'.$posts->foto_profil)}}" width="220" height="220">
                <h4 class="text-center mt-3">{{$posts->nama_kendaraan}}</h4>
                <p class="card-text">
                  Penyewa : {{$posts->user->name}}
                  <br>
                  Harga Sewa: {{$posts->harga}}/hari
                  <br>
                  No. Kendaraan: {{$posts->no_kendaraan}}
                  <br>
                  STNK: {{$posts->no_stnk}}
                  <br>
                  <br>
                </p>
                @if ($akun->role_id == 2)
                <div class="d-flex mx-auto justify-content-center gap-2">
                  <a href="{{route('sewa_mobil.edit',Crypt::encrypt($posts->id))}}" class="btn btn-primary col-6">Ubah</a>
                  <button class="btn btn-danger col-6" type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Hapus</button>
                  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="p-3">
                            <div class="d-flex justify-content-center py-4">
                              <i class="bi bi-exclamation-triangle text-warning display-1"></i>
                            </div>
                            <div class="d-flex justify-content-center">
                              <h4 class="text-dark text-center fw-bold px-5">Apakah kamu yakin ingin menghapus postingan ini ?</h4>
                            </div>
                            <div class="d-flex justify-content-evenly p-3">
                              <button class="btn btn-primary py-3 px-4" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                              <form action="{{route('sewa_mobil.destroy', $posts->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger py-3 px-4">Hapus</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                @else
                <div class="d-flex mx-auto justify-content-center">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary col-6" data-bs-toggle="modal" data-bs-target="#exampleModal{{$posts->id}}">
                    Sewa
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{($posts->id)}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="{{route('sewa.submit',$posts->id)}}" method="post">
                          @csrf
                          @method('PATCH')
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group mb-3">
                              <label>Tanggal Akhir Peminjaman</label>
                              <input type="date" value="{{$posts->masa_akhir}}" class="form-control @error('masa_akhir') is-invalid @enderror" name="masa_akhir" placeholder="Tanggal Akhir Peminjaman">
                              @error('masa_akhir')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
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