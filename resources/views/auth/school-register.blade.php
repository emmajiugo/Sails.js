@extends('layouts.app')

@section('content')


<!-- Slider Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-80">
                    <h2>Register</h2>
                    <span>Schools</span>
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
                        <p>
                            Signup to enjoy our wonderful services. All fields are required and must be filled. <br>
                            Already a member? <a href="{{ route('school.login') }}" style="color:#402c83">Login Here</a>
                        </p>
                    </div>
                </div>

                <div class="register">

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
        </div>
    </div>
</section>
<!--================Form Area =================-->

@endsection
