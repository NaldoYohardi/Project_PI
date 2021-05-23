<?php
if(Session::get('LoggIN')==0)
{?>
  <script>
    window.location.href='{{url('')}}';
  </script>
<?php } ?>
@extends('layouts.app')

@section('title', 'Register')
@section('MainTitle', 'Register')

@section('content')
<div class="row justify-content-center">
  <div class="wrap-login100">

      <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
          @csrf
          <span class="login100-form-title">
          {{ __('REGISTER') }}
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Valid name is required.">
            <input id="name" class="input100 form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="{{ __('Username') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input id="email" class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email">
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
            <input id="password" class="input100 form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
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

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input id="password-confirm" class="input100 form-control @error('password-confirm') is-invalid @enderror" type="password" name="password_confirmation" placeholder="{{ __('Password') }}" required autocomplete="new-password">
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

            <div class="container-login100-form-btn">
              <button type="submit" class="login100-form-btn">
                {{ __('Register') }}
              </button>
            </div>
      </form>
  </div>
</div>
@endsection
