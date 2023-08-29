
<!doctype html>
<html lang="en">
    <head>
        @include('layouts.top')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('layouts.navigation')
            <div class="content-wrapper">    
                @include('layouts.sidebar')
                <section class="content">
                    <div class="container p-5">
                        @if(session()->get('sukses'))
                            <div class="alert alert-success">
                                {{session()->get('sukses')}}
                            </div>
                        @endif
        
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12">
                                <div class="card border-top-info p-4">
                                    <div class="card-body">
                                        <form action="{{route('profile.update',$akun->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="mb-3 form-group">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        @if ($akun->foto_profil == null)
                                                            
                                                        <img class="logo-profil img-circle" src="{{asset('public/img/user2-160x160.jpg')}}" id="logo-image" width="180" height="180">
                                                        @else
                                                            
                                                        <img class="logo-profil img-circle" src="{{asset('assets/foto profil/'.$akun->foto_profil)}}" id="logo-image" width="180" height="180">
                                                        @endif
                                                        <div class="form-group">
                                                            <label>Ubah Foto</label>
                                                            <input type="file" accept="image/png, image/jpeg" name="foto_profil" class="form-control @error('foto_profil') is-invalid @enderror" onchange="previewProfil(event)">
                                                            @error('foto_profil')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
    
                                                        <script>
                                                            var previewProfil = function(event) {
                                                                var fotoProfil = document.getElementById('logo-image');
                                                                fotoProfil.src = URL.createObjectURL(event.target.files[0]);
                                                                fotoProfil.onload = function() {
                                                                    URL.revokeObjectURL(fotoProfil.src) 
                                                                }
                                                            };
                                                        </script>

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
                                                        <div class="form-group mb-3">
                                                            <div class="row">
                                                                <label>Nomor KTP</label>
                                                                <input type="text" value="{{$akun->no_ktp}}" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" placeholder="Nomor KTP">
                                                                @error('no_ktp')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
            
                                                    <div class="col-md-7">
    
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
                                                                <label>Email</label>
                                                                <input type="email" value="{{$akun->email}}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Nomor KTP">
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Tempat, Tanggal Lahir</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" value="{{$akun->tempat_lahir}}" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="Tempat Lahir">
                                                                    @error('tempat_lahir')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="date" value="{{$akun->tanggal_lahir}}" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir">
                                                                    @error('tanggal_lahir')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                                            <select name="jenis_kelamin" id="select" class="form-select mb-3 form-control @error('jenis_kelamin') is-invalid @enderror" required autocomplete="jenis_kelamin">
                                                                @if($akun->jenis_kelamin == "Laki-Laki")
                                                                <option value="{{$akun->jenis_kelamin}}" selected>{{$akun->jenis_kelamin}}</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                                @elseif($akun->jenis_kelamin == "Perempuan")
                                                                <option value="Laki-Laki">Laki-Laki</option>
                                                                <option value="{{$akun->jenis_kelamin}}" selected>{{$akun->jenis_kelamin}}</option>
                                                                @endif
                                                            </select>
                                                            @error('jenis_kelamin')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                                            <select name="jenis_kelamin" id="select" class="form-select mb-3 form-control @error('jenis_kelamin') is-invalid @enderror" required autocomplete="jenis_kelamin">
                                                                <option value="null" selected hidden disabled>Pilih</option>
                                                                <option value="Laki-Laki">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                            @error('jenis_kelamin')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
    
                                                        <div class="form-group">
                                                            <label>Telepon</label>
                                                            <input type="text" value="{{$akun->telepon}}" class="mb-3 form-control @error('telepon') is-invalid @enderror" placeholder="Telepon" name="telepon">
                                                            @error('telepon')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="d-grid col-6 mx-auto">
                                                    
                                                        <button type="submit" class="btn btn-primary form-control mt-3"><i class="fas fa-save"></i> Simpan</button>
                                                    </div>        
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        @include('layouts.footer')
        @include('layouts.bottom')
    </body>
    <script>
        window.setTimeout(function() {
            $(".alert ").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    </script>
</html>