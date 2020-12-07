@extends('layouts.app')

@section('content')

                <div class="login100-form">
                    <span class="login100-form-title">
                        {{ __('New Account') }}
                    </span>
                    <form method="POST" class="login100-form validate-form" action="{{ route('register') }}">
                        
                        @csrf
                        <div class="wrap-input100 validate-input">
                            <input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">
                                <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                            </span>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    
                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input type="text" placeholder="Email" id="email"
                                class="input100 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input id="password" type="password" placeholder="Password" class="input100 @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    
    
                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" placeholder=" Confirm Password" id="password-confirm" type="password"
                                    name="password_confirmation" required autocomplete="new-password">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
    
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Complete Sign-up
                            </button>
                        </div>
                        <div class="container-login100-form-btn pt-50">
                            {{-- <p>Already have an Account</p> --}}
                            <a class="txt2" href="{{url('/login')}}">
                                Already have an Account
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                            {{-- <a class="login100-form-btn" href="{{url('login')}}">
                                 Login
                            </a> --}}
                        </div>
                </form>
                </div>

@endsection
