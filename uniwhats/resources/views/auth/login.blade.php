@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="header">
        <h1>Login<h1>
    </div>
    <form action="{{route('login')}}" method="POST" class="auth_form ui form">
        @csrf
            
            <div class="field">
                <label for="email" class="">{{ __('Email') }}</label>
                <input type="email" class="email @error('email') error @enderror" name="email" value="{{ old('email') }}"
                required autocomplete="email" autofocus>
                @error('email')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
            </div>

            
            <div class="field">
                <label for="password" class="">{{ __('Password') }}</label>
                <input type="password" class="password @error('password') error @enderror" name="password"
                value="{{ old('password') }}" required autocomplete="current-password" autofocus>
                @error('password')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
            </div>

                <input class="ui checkbox remember" type="hidden" name="remember" id="remember" checked>
                

        <div class="fields password">
            

            
            <div class="sixteen wide field">
                <button type="submit">
                    <i class='fas fa-angle-double-right'></i>    {{ __('Login') }} 
                </button>
                @if (Route::has('password.request'))
                <div class="other-options">
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a> | <a href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                </div>
                
                @endif
            </div>
        </div>

    </form>
</div>
@endsection