@extends('layouts.app')

@section('content')

<!-- Slider Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-40">
                    <h2>School Reset Password</h2>
                </div>

                @include('inc.messages')

                <div class="space-20"></div>
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

                <div class="login">

                    <form method="POST" action="{{ route('school.password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" placeholder="Email" class="single-input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn">
                                {{ __('Reset Password') }}
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
