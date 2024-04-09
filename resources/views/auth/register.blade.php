@extends('layouts.app')

@section('content')

<div class="wrapper-whole bg-images py-5 h-100" style="background-image: url('/images/login-register-bg.jpg');">
    <div class="container-login">
        <div class="wrapper">
            <div class="title mb-2">
            <i class="fa-solid fa-heart  mt-5"></i>
                <span>Welcome to Let's Ukay!</span>
                Sign up to start
            </div>
            <form class="form-signin" method="POST" action="{{ route('register') }}">
                @csrf
                @if (session()->has('status'))
                    <span class="invalid-feedback d-block" role="alert">
                    <p style="text-align:center;font-size: 15px;color:red;"><strong>{{ session()->get('status') }}</strong></p>
                    </span>
                @endif
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                <i class="fa-solid fa-envelope"></i>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                </div>
                <div class="row button">
                    <input type="submit" value="Sign Up">
                </div>
                <div class="signup-link">Already a member? <a href="{{ Route('login') }}">Sign in now</a></div>
            </form>
        </div>
    </div>
</div>
<div class="float-end mt-1 px-1">
    <h6><span>©</span>Let’s Ukay. All Rights Reserved</h6>
</div>
@endsection
