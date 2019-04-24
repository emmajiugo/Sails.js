@extends('layouts.frontend')

@section('content')

<!--===================== Login Bg ========================-->
<div class="login-bg animatedParent">

    @if(session('success'))
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{session('success')}}
            </div>
        </div>
    @endif
            
    <form method="POST" action="{{ route('school.login.submit') }}" class="animated growIn">
        @csrf

        <h2>School Login</h2>

        <div class="form-group">
            <input id="email" type="email" placeholder="Email Address" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <input id="password" type="password" placeholder="Password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit"">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>

    <h3 class="text-center create">Dont have a School account? <a href="{{ route('school.register') }}">Create Account</a></h3>
</div>

@endsection
