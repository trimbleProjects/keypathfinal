<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Keypath | {{session('title')}}</title>

        <link href="{{asset('css/styles.css') }}" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>        <script src="{{ asset('/js/app.js')}}" async defer></script>
        <script src="{{ asset('/js/actions.js') }}"></script>
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('headeradditions')
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div id="headerArea">
            <div><h1><a href="{{url('/')}}" id="keypath">Keypath Survey</a></h1></div>
            <div>
                <a href="{{url('/')}}"><button class="standardBtn" id="surveyBtn">Survey</button></a>
                <div id="login">
                @auth
                <div class="desktop">
                    <a href="{{url('/login')}}"><button id="loginBtn" class="standardBtn">Account</button></a>
                    <div class="loggedInMenu" id="headerLogin">
                        <a href="{{url('/home')}}"><div>Account</div></a>
                        @if(auth()->user()->userType == "admin")
                        <a href="{{url('/Admin')}}"><div>Admin</div></a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

                <div class="mobile">
                    <button id="loginBtn" class="standardBtn">Account</button>
                    <div class="loggedInMenu" id="headerLogin">
                        @if(auth()->user()->userType == "admin")
                        <a href="{{url('/Admin')}}"><div>Admin</div></a>
                        @endif
                        <a href="{{url('/home')}}"><div>Account</div></a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                @else
                    <a href="{{url('/login')}}"><button id="loginBtn" class="standardBtn">Login</button></a>
                    <form method="POST" action="{{ route('login') }}" id="headerLogin">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="standardBtn">
                                        {{ __('Login') }}
                                    </button>
                                    <a href="{{url('/register')}}"><button type="button" class="standardBtn">Register</button></a>

                                    
                                </div>
                            </div>
                            <div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                @endauth
                    
                </div>
            </div>
        </div>
        <div id="mainContent">
        @yield('content')
        </div>
        <div id="snackbar"></div>
    </body>
</html>