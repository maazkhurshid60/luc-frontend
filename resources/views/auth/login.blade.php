@extends('admin.layout.login')

@section('content')

    <body class="hold-transition login-page2 bg-light">
        <div class="position-absolute top-0 left-0 m-4" style="z-index: 1;">
            <img src="{{ asset('backend/images/afcon-group-logo-white.png') }}" alt="Afcon Group Logo" class="img-fluid"
                style="width: max-content;">
        </div>

        <div class="row no-gutters w-100 h-100">
            <!-- Left Side: Illustration and Text (Full Height) -->
            <div class="col-md-6 text-white d-flex justify-content-center vh-100 flex-column"
                style="background-color: #0B63E5;">
                <div class="text-center">
                    <img src="{{ asset('backend/images/login-image.png') }}"class="">
                    <h3>Lorem ipsum dolor sit amet consectetur.</h3>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                </div>
            </div>

            <!-- Right Side: Login Form (Centered) -->
            <div class="col-md-6 bg-white d-flex justify-content-center align-items-center vh-100">
                <div class="p-5" style="width: 70%;">

                    <h3 class="text-center mb-4">{{ __('Sign In to your Account') }}</h3>
                    <p class="text-center text-muted mb-4">Welcome back! Please enter your details.</p>

                    <form method="POST" class="form-element" action="{{ route('login') }}">
                        @csrf
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                <small>{{ $errors->first('email') }}</small>
                            </div>
                        @endif

                        <!-- Email Input -->
                        <div class="form-group">
                            <label for="email" class="sr-only">{{ __('Username') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="ion ion-email"></i>
                                    </span>
                                </div>
                                <input type="text" name="username" class="form-control border-left-0"
                                    placeholder="Username" required autofocus>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="form-group">
                            <label for="password" class="sr-only">{{ __('Password') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="ion ion-locked"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" class="form-control border-left-0"
                                    placeholder="Password" required>
                            </div>
                        </div>

                        <!-- Remember Me and Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" id="remember" name="remember" class="form-check-input"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-muted">{{ __('Forgot Password?') }}</a>
                            @endif
                        </div>

                        <!-- Sign In Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Sign In') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
