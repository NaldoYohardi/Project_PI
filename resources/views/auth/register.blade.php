@extends('layouts.app')

@section('title', 'Register')
@section('MainTitle', 'Register')

@section('content')
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismis="alert" aria-label="close">&times;</a></p>
    @endif
  @endforeach
  <div class="container-scroller">
    <div class="container-fluid full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left p-5">
              <h4>Register</h4>
              <h6 class="font-weight-light">Register new Users to the Database</h6>
              <form method="POST" action="{{ route('register') }}" class="pt-3">
                  @csrf
                  <div class="mt-3">
                    <div class="form-group">
                      <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="{{ __('Username') }}" value="{{ old('name') }}" required autofocus>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
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
                    <div class="form-group">
                      <input id="password-confirm" class="form-control @error('password-confirm') is-invalid @enderror" type="password" name="password_confirmation" placeholder="{{ __('Password') }}" required>
                      @error('password')
                          <span class="invalid-feedback" role="alert" id="message">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="mt-3">
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                        {{ __('REGISTER') }}
                      </button>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
