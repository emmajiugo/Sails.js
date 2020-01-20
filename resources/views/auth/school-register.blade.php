@extends('layouts.frontend')

@section('content')

    <!--===================== Signup Bg ========================-->
    <div class="sign-up animatedParent">

        <p class="text-center">Signup to enjoy our wonderful services. All fields are required and must be filled. <br>
        Already a member? <a href="{{ route('school.login') }}">Login Here</a></p>

        <form method="POST" action="{{ route('school.register.submit') }}">
            @csrf

            <h2>School Sign Up</h2>

            <div class="form-group">
                <input id="email" type="email" placeholder="Login Email *" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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

            {{-- <h5><u>School Details</u></h5>
            <br>

            <div class="form-group">
                <input id="schoolname" type="text" placeholder="School Name *" class="{{ $errors->has('schoolname') ? ' is-invalid' : '' }}" name="schoolname" value="{{ old('schoolname') }}" required>

                @if ($errors->has('schoolname'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('schoolname') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="schooladdr" type="text" placeholder="School Address *" class="{{ $errors->has('schooladdr') ? ' is-invalid' : '' }}" name="schooladdr" value="{{ old('schooladdr') }}" required>

                @if ($errors->has('schooladdr'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('schooladdr') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="schoolphone" type="number" placeholder="School Phone *" class="{{ $errors->has('schoolphone') ? ' is-invalid' : '' }}" name="schoolphone" value="{{ old('schoolphone') }}" required>

                @if ($errors->has('schoolphone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('schoolphone') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="schoolemail" type="email" placeholder="School Email *" class="{{ $errors->has('schoolemail') ? ' is-invalid' : '' }}" name="schoolemail" value="{{ old('schoolemail') }}" required>

                @if ($errors->has('schoolemail'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('schoolemail') }}</strong>
                    </span>
                @endif
            </div>
            <hr>

            <h5><u>Registrant's Details</u></h5>
            <br>

            <div class="form-group">
                <input id="registeredby" type="text" placeholder="Registrant's Name *" class="{{ $errors->has('registeredby') ? ' is-invalid' : '' }}" name="registeredby" value="{{ old('registeredby') }}" required>

                @if ($errors->has('registeredby'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('registeredby') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <select name="registrarstatus" id="registrarstatus">
                    <option value="Owner/Proprietor"> Proprietor or Owner</option>
                    <option value="Headmaster/Principal"> Headmaster or Principal</option>
                    <option value="Account Officer"> School Account Officer</option>
                </select>
            </div> --}}

            <div class="form-group">
                <button type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
@endsection
