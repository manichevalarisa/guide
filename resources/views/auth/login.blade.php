@extends('layouts.simple')

@section('content')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="bg-image">
            <div class="row no-gutters justify-content-center bg-primary-dark-op">
                <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                    <!-- Sign In Block -->
                    <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                        <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    <p class="mb-0">{{ session('status') }}</p>
                                </div>
                            @endif

                            <!-- Header -->
                            <div class="mb-2 text-center">
                                <a class="link-fx font-w700 font-size-h1" href="/">
                                    <span class="text-dark">{{ config('app.name') }}</span>
                                </a>
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Log In</p>
                            </div>
                            <!-- END Header -->

                            <!-- Sign In Form -->
                            <form class="js-validation-signin" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-user-circle"></i>
                                                    </span>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                               {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-asterisk"></i>
                                            </span>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                              {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-left">
                                    <div class="custom-control custom-checkbox custom-control-primary">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">Remember Me</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <div class="font-w600 font-size-sm py-1">
                                            <a href="{{ route('password.request') }}"> Forgot Password? </a>
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-hero-primary">
                                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Log In
                                    </button>
                                </div>
                            </form>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                    <!-- END Sign In Block -->
                </div>
            </div>
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
@endsection
