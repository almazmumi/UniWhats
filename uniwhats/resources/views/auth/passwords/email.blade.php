@extends('layouts.app')

@section('content')

<div class="form-container">
    <div class="header">
        <h1>Reset Password<h1>
    </div>
    @if(session('status'))
    <div class="message">
        <p>{{session('status')}}</p>
    </div>
@endif
    <form action="{{ route('password.email') }}" method="POST" class="auth_form ui form">
        @csrf
            
            <div class="field">
                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                <input type="email" class="email @error('email') error @enderror" name="email" value="{{ old('email') }}"
                required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>

            



        <div class="fields password">
            <div class="sixteen wide field">
                <button type="submit">
                    <i class='fas fa-angle-double-right'></i>    {{ __('Send Password Reset Link') }} 
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
