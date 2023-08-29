
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
                                        <form action="" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="mb-3 form-group">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <img class="logo-profil img-circle" src="{{ asset('vendor/dist/img/logo.png')}}" id="logo-image">
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
                                                            <label>Tempat, Tanggal Lahir</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" value="{{old('tempat_lahir')}}" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="Tempat Lahir">
                                                                    @error('tempat_lahir')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="date" value="{{old('tanggal_lahir')}}" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir">
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