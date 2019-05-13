@extends('layouts.app')

@section('content')
    <div class="section background-black over-hide">
        <div class="form-center-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-6 col-lg-8 col-md-10">                            
                        <div class="input-form">
                            <h1 class="text-center mb-4">Login</h1>
                            @if(Session::has('failed'))
                                <div class="alert-error text-center mt-4" id="login_failed">{{Session::get('failed')}}</div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                
                                <div class="input-field">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }} color-white" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                </div>

                                <div class="input-field">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }} color-white" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    
                                </div>

                                <div class="button-div text-center col-12 mb-4">
                                    <button type="submit" class="input-button pt-2 pb-2">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                                <div  class="text-center col-12 mb-3">
                                    <a class="account-help" href="{{ route('password.request') }}">Forgot password</a> |
                                    <a class="account-help" href="{{route('register')}}">Create a new account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.background');
    </div>
@endsection
