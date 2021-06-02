@extends('layouts.main')

@section('title', 'Login')
@section('MainTitle', 'Login')

@section('content')
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismis="alert" aria-label="close">&times;</a></p>
    @endif
  @endforeach
  <div class="row flex-grow">
    <div class="col-lg-4 mx-auto">
      <div class="auth-form-light text-left p-5">
        <div class="brand-logo js-tilt" align="center" data-tilt>
          <img src="laravel.PNG">
        </div>
        <h4>Hello! let's get started</h4>
        <h6 class="font-weight-light">Sign in to continue.</h6>
        <form method="POST" action="/check" class="pt-3">
          @csrf
          <?php
            if(Session::get('status')) { ?>
            <div class="alert alert-danger">
              <?php  echo(Session::get('status')) ?>
            </div>
          <?php }  ?>
          <div class="form-group">
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" value="" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="{{ __('Password') }}" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="my-2 d-flex justify-content-between align-items-center">
            <div class="form-check">
              <label class="form-check-label text-muted" for="rememberMe">
                <input type="checkbox" class="form-check-input" value="lsRememberMe" id="rememberMe" onclick="lsRememberMe()"> Remember User </label>
            </div>
            <a href="{{ url('/reset') }}" class="auth-link text-black">Forgot password?</a>
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
              {{ __('LOGIN') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
