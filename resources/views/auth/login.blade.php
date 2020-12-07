
@extends('layouts.app')

@section('content')

                <div class="login100-form">
                    <span class="login100-form-title">
                        {{ __('Login') }}
                    </span>
                    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        
                        @csrf
    
                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input id="email" type="text" placeholder="Email"
                                class="input100 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                            <input id="password" type="password" placeholder="Password"
                                class="input100 @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
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
    
    
                <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                </div>
                <div class="text-center p-t-12">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link txt2" href="{{ route('password.request') }}">
                                Forgot Password?
                        </a>
                        @endif
                </div>
                <div class="text-center pt-80">
                    <a class="txt2" href="{{url('/register')}}">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
                </form>
                </div>

@endsection



{{-- <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

<label class="form-check-label" for="remember">
    {{ __('Remember Me') }}
</label>
</div>
</div>
</div> --}}


