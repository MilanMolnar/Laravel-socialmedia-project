@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" >
        <div class="col-md-9" >
            <div class="card pt-5" id="auth-body" >
                <div id="bar" style="color: white;text-align: center; font-size: x-large" class="card-header"><b> {{ __('Login') }}  ⌥</b></div>

                <div class="card-body" id="auth-item-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row pt-2">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-7">
                                <input style="border-radius: 15px" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row  pt-2">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-7">
                                <input style="border-radius: 15px" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row  pt-2">
                            <label class="col-md-3 col-form-label text-md-right"></label>

                            <div class="col-md-7 d-flex">
                                <button class="loginBtn loginBtn--google">
                                    Login with Google
                                </button>

                                <button class="loginBtn loginBtn--facebook">
                                    Login with Facebook
                                </button>

                            </div>
                        </div>

                        <div class="form-group row  pt-2">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button id="auth-btn" type="submit">
                                    {{ __('Login') }}
                                </button>


                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
