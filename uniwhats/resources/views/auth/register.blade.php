@extends('layouts.app')

@section('content')
<div class="form-container">


    <div class="header">
        <h1>{{ __('Register') }}</h1>
    </div>


    <form method="POST" action="{{ route('register') }}" class="ui form">
        @csrf

            <div class="field">
                <label for="name">Full Name:</label>
                <input name="name" value="{{ old('name') }}" type="text" required autocomplete="name" autofocus/>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="field">
                <label for="email">Email:</label>
                <input name="email" value="{{ old('email') }}" type="email" required autocomplete="email" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        <div class="fields grid-two-columns">
            <div class="eight wide field">
                <label for="password">Password:</label>
                <input name="password" type="password" required/>
            </div>
            <div class="eight wide field">
                <label for="password_confirmation">Confirm Password:</label>
                <input name="password_confirmation" type="password" required/>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="fields">
            <div class="sixteen wide field">
                <button type="submit"><i class='fas fa-angle-double-right'></i>  {{ __('Register') }}</button>
            </div>
        </div>
    </form>


</div>
@endsection