@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="header">
        <h1>Reset Password<h1>
    </div>
    <form action="{{ route('password.update') }}" method="POST" class="auth_form ui form">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

            @if(session('status'))
                <div class="message">
                    <p>{{session('status')}}</p>
                </div>
            @endif
            <div class="disabled field">
                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                <input  type="email" class="email @error('email') error @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>

            
            <div class="field">
                <label for="password" class="">{{ __('Password') }}</label>
                <input type="password" class="password @error('password') error @enderror" name="password" required autocomplete="new-password" autofocus>
                @error('password')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
            </div>
            <div class="field">
                <label for="password-confirm" class="">{{ __('Password') }}</label>
                <input type="password" class="password @error('password') error @enderror" name="password_confirmation" required autocomplete="new-password" autofocus>
                @error('password')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
            </div>


        <div class="fields password">
            <div class="sixteen wide field">
                <button type="submit">
                    <i class='fas fa-angle-double-right'></i>    {{ __('Reset Password') }} 
                </button>
                
                
            </div>
        </div>

    </form>
</div>





{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@endsection