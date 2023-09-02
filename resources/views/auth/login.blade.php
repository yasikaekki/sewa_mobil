@extends('layouts.app')

@section('content')
<div class="card-body login-card-body">
    <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>

    <form action="{{ route('login') }}" method="post">
        @csrf
      <div class="input-group mb-3">
        <input name="email" type="email" class="form-control form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old ('email')}}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="input-group mb-3">
        <input name="password" type="password" class="form-control form-control @error('password') is-invalid @enderror" placeholder="Password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox" id="remember" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
              Ingatkan Saya
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    @if (Route::has('password.request'))
    <p class="mb-1">
      <a href="{{ route('password.request') }}">Lupa Password ?</a>
    </p>
    @endif
  </div>
@endsection
