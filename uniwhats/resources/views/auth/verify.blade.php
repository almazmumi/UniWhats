@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="header">
        <h1>Verify Your Email Address</h1>

        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif
        <br>
        <br>
        <p style="line-height: 2.5rem">
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}
        </p>

    </div>

    <form class="auth_form ui form" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <div class="field">
            <button type="submit" style="margin-top: 0;">{{ __('Click here to request another') }}</button>
        </div>
    </form>



</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
