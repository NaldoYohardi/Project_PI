@extends('layouts.main')

@section('title', 'Forget Password')
@section('MainTitle', 'Forget Password')

@section('content')
  @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
  @endif

  <form method="POST" action="{{ route('password.email') }}" class="login100-form validate-form">
    @csrf
    @if (session('status'))
      <div class="alert alert-danger">
        {{ session('status') }}
      </div>
    @endif
    <span class="login100-form-title">
      {{ __('RESET PASSWORD') }}
    </span>

    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
      <input id="email" class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
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

    <div class="container-login100-form-btn">
      <button type="submit" class="login100-form-btn">
        {{ __('Send Password Reset Link') }}
      </button>
    </div>

    <div class="text-center p-t-136">
      <a class="txt2 btn-link" href="{{ url('/') }}">
        {{ __('Go Back?') }}
      </a>
    </div>

  </form>
@endsection
