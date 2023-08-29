@extends('layouts.app')

@section('content')
<div class="card-body login-card-body">
    <p class="login-box-msg">Sign in to start your session</p>

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
              Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    @if (Route::has('password.request'))
    <p class="mb-1">
      <a href="{{ route('password.request') }}">I forgot my password</a>
    </p>
    @endif
    <p class="mb-0">
      <a href="{{route('register')}}" class="text-center">Register a new membership</a>
    </p>
  </div>
@endsection
