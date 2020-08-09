@extends('layouts.app')

@section('content')

<!-- Slider Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-80">
                    <h2>Login</h2>
                    {{-- <span>Schools</span> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End-->

<!--================Form Area =================-->
<section class="blog_area section-paddingr">
    <div class="container">
        <div class="row">
            <div class="offset-lg-3 col-lg-6">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{session('success')}}
                    </div>
                    <div class="space-20"></div>
                @endif

                <div class="row">
                    <div class="col-12 text-center">
                        <p>Dont have a School account? <a href="{{ route('school.register') }}" style="color:#402c83">Create Account</a></p>
                    </div>
                </div>

                <div class="login">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="section-tittle text-center mb-80">
                                <span>Schools</span>
                            </div>
                        </div>

                        @include('inc.messages')
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
    </div>
</section>
<!--================Form Area =================-->

@endsection
