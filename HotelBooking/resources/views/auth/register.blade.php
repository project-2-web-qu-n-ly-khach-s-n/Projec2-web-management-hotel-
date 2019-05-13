@extends('layouts.app')

@section('content')
<div class="section background-black over-hide">
    <div class="form-center-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-6 col-lg-8 col-md-10">                            
                    <div class="input-form">
                        <h1 class="text-center">Register</h1>
                        @if(Session::has('success'))
                            <div class="alert-error text-center mt-4"id="reg_success">{{Session::get('success')}}</div>
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="input-field"> 
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }} color-white" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <div class="alert-error text-center mt-4">
                                        <strong>*{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif                               
                            </div>

                            <div class="input-field">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }} color-white" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <div class="alert-error text-center mt-4">
                                        <strong>*{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="input-field">
                                <label for="password" >{{ __('Password') }}</label>
                                <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }} color-white" name="password" required>

                                @if ($errors->has('password'))
                                    <div class="alert-error text-center mt-4">
                                        <strong>*{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif                              
                            </div>

                            <div class="input-field">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password"  name="password_confirmation" class="color-white" required>
                            </div>

                            <div class="button-div text-center col-12">                                
                                <button type="submit" class="input-button pt-2 pb-2">
                                    {{ __('Register') }}
                                </button>                                
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
