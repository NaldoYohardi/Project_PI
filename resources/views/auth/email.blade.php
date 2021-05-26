@extends('layouts.main')

@section('title', 'Send Password Reset')
@section('MainTitle', 'Send Password Reset')

@section('content')
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismis="alert" aria-label="close">&times;</a></p>
    @endif
  @endforeach
  <div class="row flex-grow">
    <div class="col-lg-6 mx-auto">
      <div class="auth-form-light text-left p-5">
        <div class="brand-logo js-tilt" align="center" data-tilt>
          <img src="laravel.PNG">
        </div>
        <h4>Reset Password</h4>
        <h6 class="font-weight-light">Send Password Reset Link</h6>
        <form method="POST" action="{{ route('password.email') }}" class="pt-3">
          @csrf
          <?php
            if(Session::get('status')) { ?>
            <div class="alert alert-info">
              <?php  echo(Session::get('status')) ?>
            </div>
          <?php }  ?>
          <!-- @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif -->
          <div class="form-group">
            <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
              {{ __('SEND LINK') }}
            </button>
          </div>
          <div class="my-2 justify-content-between align-items-center" align="center">
            <a href="{{ url('/') }}" class="auth-link text-black">Go Back?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
