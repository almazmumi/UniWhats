@extends('layouts.app')

@section('content')
<div class="form-container">


    <div class="header">
        <h1>{{ __('Feedback Page') }}</h1>
        <p style="margin-bottom: 40px;font-size: 16px;margin-top: 25px;line-height: 30px;">UniWhats beta helps the students to reach out to their collegues faster and easier. This website currently is in beta version. if there are any improvments or suggestions, don't hesitate to send us.</p>
    </div>

    @if(null != session()->get( 'status' ))
        <p style="color: red;margin-bottom: 50px;">Thank you for your contribution, your message is in save hands.</p>
    @endif
    <form method="POST" action="{{ route('feedback.store') }}" class="ui form">
        @csrf

            <div class="field">
                <label for="name">Full Name:</label>
                <input name="name" value="{{ old('name') }}" type="text" autocomplete="name" autofocus/>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="field">
                <label for="email">Email:</label>
                <input name="email" value="{{ old('email') }}" type="email" autocomplete="email" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="field">
                <label for="feedback">Feedback <span style="color:red;">*</span></label>
                <textarea name="feedback">{{ old('feedback') }}</textarea>
                @error('feedback')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
        <div class="fields">
            <div class="sixteen wide field">
                <button type="submit"><i class='fas fa-angle-double-right'></i>  {{ __('Submit') }}</button>
            </div>
        </div>
    </form>


</div>
@endsection
