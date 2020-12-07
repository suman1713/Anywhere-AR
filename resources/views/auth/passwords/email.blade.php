@extends('layouts.app')

@section('content')

                <div class="login100-form">
                    <span class="login100-form-title">
                        Forget Password
                    </span>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="validate-form" method="POST" action="{{ route('password.email') }}">
                        
                        @csrf


                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            {{-- <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                            <input id="email" type="text" placeholder="Email"
                                class="input100 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
    
                            
                        </div>
                        @error('email')
                        <p class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </p>
                        @enderror
                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                {{ __('Send Password Reset Link') }}
                            </button>
                    </div>
                    </form>
                </div>

@endsection
