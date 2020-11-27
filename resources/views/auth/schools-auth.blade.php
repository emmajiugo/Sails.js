@extends('layouts.app')

@section('content')


<!-- Slider Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="section-tittle text-center mb-60">
                    <h2>Schools</h2>
                </div>

                @include('inc.messages')
                
                <div class="space-20"></div>

            </div>
        </div>
    </div>
</div>
<!-- Slider Area End-->

<!--================Form Area =================-->
<section class="blog_area">
    <div class="row">
        <div class="col-6 padding-0">

            <div class="register-body">
                <div class="section-tittle text-center mb-40">
                    <span>Register</span>
                </div>

                <form method="POST" action="{{ route('school.register.submit') }}">
                    @csrf

                    <div class="form-group">
                        <label for="">Email:</label>
                        <input id="email" type="email" placeholder="Email Address *" class="single-input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        <span style="color: green">
                            This email will be used to login to the platform.
                        </span>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Password:</label>
                        <input id="password" type="password" placeholder="Password *" class="single-input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Confirm Password:</label>
                        <input id="password-confirm" type="password" placeholder="Confirm Password *" class="single-input" name="password_confirmation" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="genric-btn info radius float-right">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>

        <div class="col-6 padding-0">

            <div class="login-body">

                <div class="section-tittle text-center mb-40">
                    <span>Login</span>
                </div>

                <form method="POST" action="{{ route('school.login.submit') }}">
                    @csrf

                    <div class="form-group">
                        <label for="">Email:</label>
                        <input type="email" placeholder="Email Address" class="single-input" name="email" value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Password:</label>
                        <input type="password" placeholder="Password" class="single-input" name="password" required>
                    </div>

                    <div class="space-20"></div>

                    <div class="form-group">
                        <button type="submit" class="genric-btn info radius float-right">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="color:#402c83">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>

            </div>

        </div>
    </div>

</section>
<!--================Form Area =================-->

@endsection
