
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
        
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12">
                                <div class="card border-top-info p-4">
                                    <div class="card-body">
                                        <div class="mb-3 form-group">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img class="logo-profil img-circle" src="{{asset('assets/foto profil/'.$lapor->user->foto_profil)}}" id="logo-image" width="180" height="180">

                                                    <div class="form-group mb-3">
                                                        <div class="row">
                                                            <label>Alamat</label>
                                                            <input type="text" value="{{$lapor->user->alamat}}" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <div class="row">
                                                            <label>Nomor SIM</label>
                                                            <input type="text" value="{{$lapor->user->no_sim}}" class="form-control @error('no_sim') is-invalid @enderror" name="no_sim" placeholder="Nomor Sim">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <div class="row">
                                                            <label>Nomor KTP</label>
                                                            <input type="text" value="{{$lapor->user->no_ktp}}" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" placeholder="Nomor KTP">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
        
                                                <div class="col-md-7">

                                                    <div class="form-group mb-3">
                                                        <div class="row">
                                                            <label>Nama Lengkap</label>
                                                            <input type="text" value="{{$lapor->user->name}}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Lengkap">
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
                                                            <input type="email" value="{{$lapor->user->email}}" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Nomor KTP">
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Tempat, Tanggal Lahir</label>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" value="{{$lapor->user->tempat_lahir}}" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="Tempat Lahir">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="date" value="{{$lapor->user->tanggal_lahir}}" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" id="select" class="form-select mb-3 form-control @error('jenis_kelamin') is-invalid @enderror" required autocomplete="jenis_kelamin">
                                                            @if($lapor->user->jenis_kelamin == "Laki-Laki")
                                                            <option value="{{$lapor->user->jenis_kelamin}}" selected>{{$lapor->user->jenis_kelamin}}</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                            @elseif($lapor->user->jenis_kelamin == "Perempuan")
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="{{$lapor->user->jenis_kelamin}}" selected>{{$lapor->user->jenis_kelamin}}</option>
                                                            @endif
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Telepon</label>
                                                        <input type="text" value="{{$lapor->user->telepon}}" class="mb-3 form-control @error('telepon') is-invalid @enderror" placeholder="Telepon" name="telepon">
                                                    </div>
                                                </div>     
                                            </div>
                                        </div>
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