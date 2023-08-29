
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
                            <div class="col-lg-8">
                                <div class="card border-top-info p-4">                      
                                    <div class="card-body">
                                        <div class="form-group text-center mb-3">
                                            <img src="{{ asset('vendor/dist/img/logo.png')}}" class="logo-upt img-circle mb-2">   
                                                                                                                 
                                        </div>
                                        <div class="d-grid col-12 mx-auto">                                  
                                            <div class="card mb-4">
                                                <div class="card-header bg-light">
                                                    <p class="text-center h5 fw-bold">Biodata Diri</p>
                                                </div>
                                                <div class="card-body">
                                                    <medium class="text-muted">Alamat:</medium>
                                                    <medium class="mb-3">{{$akun->alamat}}</medium>
                                                    <hr>
                                                    <medium class="text-muted">Tempat, Tanggal Lahir:</medium>
                                                    <medium class="mb-3">{{$akun->tempat_lahir}}, {{$akun->tanggal_lahir}}</medium>
                                                    <hr>
                                                    <medium class="text-muted">Jenis Kelamin:</medium>
                                                    <medium class="mb-3">{{$akun->jenis_kelamin}}</medium>
                                                    <hr>
                                                    <medium class="text-muted">Telepon:</medium>
                                                    <medium class="mb-3">{{$akun->telepon}}</medium>
                                                    <hr>
                                                    <medium class="text-muted">No. Sim:</medium>
                                                    <medium class="text-primary fw-bold mb-3">{{$akun->no_sim}}</medium>
                                                    
                                                    
                                                </div>
                                            </div>
                                            <a href="{{route('profile.edit',Crypt::encrypt($akun->id))}}" class="mt-3 btn btn-primary"><i class="bi bi-pencil-square"></i> Ubah Profil</a>
                                            
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