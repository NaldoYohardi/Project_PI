@extends('layouts.app')

@section('title', 'Register')
@section('MainTitle', 'Register')

@section('content')
<<<<<<< HEAD
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="limiter">
                <div class="container-login100">
                    <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                        @csrf
                        <span class="login100-form-title">
                        {{ __('REGISTER') }}
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Valid name is required.">
                          <input id="name" class="input100 form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="{{ __('Username') }}" value="{{ old('name') }}" autofocus>
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          <span class="focus-input100"></span>
                          <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
=======
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismis="alert" aria-label="close">&times;</a></p>
    @endif
  @endforeach
  <ul class="breadcrumb">
    <li><a href="{{ url('/home')}}">Dashboard</a></li>
    <li>Register</li>
  </ul>
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
                  <p class="alert alert-danger" style="visibility: hidden; text-align: center;" id="demo"></p>
                  <div class="mt-3">
                    <div class="form-group">
                      <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="{{ __('Username') }}" value="{{ old('name') }}" required autofocus>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
>>>>>>> ab03a75ed80fb0d45d054852361637a74e7c9e7c
                          </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
<<<<<<< HEAD
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                          <input id="password" class="input100 form-control @error('password') is-invalid @enderror" value="asd" type="text" name="password" placeholder="{{ __('Password') }}">
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
                          <input id="password-confirm" class="input100 form-control @error('password-confirm') is-invalid @enderror" value="" type="password" name="password_confirmation" placeholder="{{ __('Password') }}">
                          @error('password')
                              <span class="invalid-feedback" role="alert" id="message">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          <span class="focus-input100"></span>
                          <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                          </span>
                        </div>
                        <p class="alert alert-danger" style="visibility: hidden; text-align: center;" id="demo"></p>
                        <div class="container-login100-form-btn">
                          <button type="submit" class="login100-form-btn" onclick="return myFunction()">
                            Register
                          </button>
                        </div>
                    </form>

                    <script>
                    function myFunction() {
                      if(document.getElementById("password-confirm").value != document.getElementById("password").value){
                        document.getElementById("demo").innerHTML = "Password Mismatch";
                        document.getElementById("demo").style.visibility = "visible";
                        return false;
                      } else{
                        document.getElementById("demo").style.visibility = "hidden";
                      }
                    }
                    </script>
=======
                      @enderror
                    </div>
                    <div class="form-group">
                      <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="{{ __('Password') }}" required value="">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input id="password-confirm" class="form-control @error('password-confirm') is-invalid @enderror" type="password" name="password_confirmation" placeholder="{{ __('Password') }}" required value="">
                      @error('password')
                          <span class="invalid-feedback" role="alert" id="message">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="mt-3">
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="return myFunction()">
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

<script>
  function myFunction() {
      if(document.getElementById("password-confirm").value != document.getElementById("password").value){
      document.getElementById("demo").innerHTML = "Password Mismatch";
      document.getElementById("demo").style.visibility = "visible";
      return false;
      } else{
      document.getElementById("demo").style.visibility = "hidden";
      }
    }
</script>
>>>>>>> ab03a75ed80fb0d45d054852361637a74e7c9e7c
