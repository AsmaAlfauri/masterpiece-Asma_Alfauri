@extends('layouts.app')
<style>
               html, body {
                background-color: #ffffff;
                color: #ffffff;
                background:url(https://blamethemonkey.com/wp-content/uploads/2013/06/Elia-Locardi-Travel-Photography-The-Path-Of-Ages-Petra-Jordan-1280-WM-sRGB-1280x640.jpg) no-repeat;
                background-size:100% 100%;
                background-position:0 0;
                height: 100vh;
                margin: 0;

            }
      h2 {
  cursor: pointer;
}
   </style>
@section('content')
<div class="container">
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
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
