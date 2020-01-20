@extends('layouts.frontend')

@section('content')

    <!--===================== Signup Bg ========================-->
    <div class="sign-up animatedParent">

        <p class="text-center">All fields are required and must be filled. <br>
        Already a member? <a href="{{ route('login') }}">Login Here</a></p>

        <form method="POST" action="{{ route('register') }}">
            <h2>Sign Up</h2>

            @csrf

            <div class="form-group">
                <input id="fullname" type="text" placeholder="Fulname *" class="{{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname" value="{{ old('fullname') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('fullname') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="email" type="email" placeholder="Email *" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="phone" type="number" placeholder="Phone Number *" class="{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="password" type="password" placeholder="Password *" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="password-confirm" type="password" placeholder="Confirm Password *" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <button type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>

@endsection
