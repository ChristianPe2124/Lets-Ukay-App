@extends('layouts.app')

@section('content')

<main class="wrapper-whole bg-images py-5" style="background-image: url('/images/login-register-bg.jpg');">
    <div class="container-login">
        <div class="wrapper">
            <div class="title mb-2">
            <i class="fa-solid fa-heart  mt-5"></i>
                <span>Welcome Back,</span>Ka-Ukay
            </div>
            <form class="form-signin" method="POST" action="{{ route('login') }}">
                @csrf
                    @if (session()->has('status'))
                        <span class="invalid-feedback d-block" role="alert">
                            <p style="text-align:center;font-size: 15px;color:red;">
                                <strong>{{ session()->get('status') }}</strong>
                            </p>
                        </span>
                    @endif
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required autocomplete="current-password">
                </div>
                <div class="pass">
                    @if (Route::has('password.request'))
                        <a class="pull-right" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a><span class="clearfix"></span>
                    @endif
                </div>
                <div class="row button">
                    <input type="submit" value="Sign In">
                </div>
                <div class="signup-link">Not a member? <a href="{{ route('register') }}">Signup now</a></div>
            </form>
        </div>
    </div>
</main>
<div class="float-end mt-1 px-1">
    <h6><span>©</span>Let’s Ukay. All Rights Reserved</h6>
</div>
@endsection
