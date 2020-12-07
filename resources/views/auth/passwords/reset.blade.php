@extends('layouts.app')

@section('content')

                <div class="login100-form">
                    <span class="login100-form-title">
                        {{ __('Reset Password') }}
                    </span>
                    <form class="validate-form" method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            {{-- <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                            <input id="email" type="text" placeholder="Email"
                                class="input100 @error('email') is-invalid @enderror" name="email"
                                value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
                            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
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
                            <button type="submit" class="login100-form-btn">
                                {{ __('Reset Password') }}
                            </button>
                        </div>

                    </form>
                </div>

@endsection

