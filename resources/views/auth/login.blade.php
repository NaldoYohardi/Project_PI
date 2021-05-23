@extends('layouts.main')

@section('title', 'Login')
@section('MainTitle', 'Login')

@section('content')
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismis="alert" aria-label="close">&times;</a></p>
    @endif
  @endforeach

  <form method="POST" action="/check" class="login100-form validate-form">
    @csrf
    <span class="login100-form-title">
      LOGIN
    </span>
    <?php
      if(Session::get('status')) { ?>
      <div class="alert alert-danger">
        <?php  echo(Session::get('status')) ?>
      </div>
    <?php }  ?>
    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
      <input id="email" class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}">
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      <span class="focus-input100"></span>
      <span class="symbol-input100">
        <i class="fa fa-envelope" aria-hidden="true"></i>
      </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate = "Password is required">
      <input id="password" class="input100 form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="{{ __('Password') }}">
      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      <span class="focus-input100"></span>
      <span class="symbol-input100">
        <i class="fa fa-lock" aria-hidden="true"></i>
      </span>
    </div>

    <div class="form-check">
      <center>
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
      </center>
    </div>

    <div class="container-login100-form-btn">
      <button type="submit" class="login100-form-btn">
        {{ __('Login') }}
      </button>
    </div>

    <div class="text-center p-t-136">
      <span class="txt1">
        Forgot
      </span>
      <a class="txt2 btn-link" href="{{ url('/reset') }}">
        {{ __('Password?') }}
      </a>
    </div>

  </form>
@endsection
