<h1>Index Page</h1>

@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif

<div>
    <a href="{{ route('school.login') }}">School Login</a> 
    <a href="{{ route('school.register') }}">School Register</a> 
</div>
