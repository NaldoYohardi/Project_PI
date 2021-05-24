@extends('layouts.app')

@section('title', 'Register')
@section('MainTitle', 'Register')

@section('content')
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
                          </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                          <input id="email" class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" autofocus>
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
