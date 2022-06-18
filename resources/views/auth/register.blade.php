@extends('layouts.simple')

@section('content')

    <!-- Page Content -->
    <div class="bg-image">
        <div class="row no-gutters justify-content-center bg-black-75">
            <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                <!-- Sign Up Block -->
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
                            <p class="text-uppercase font-w700 font-size-sm text-muted">Registration</p>
                        </div>
                        <!-- END Header -->

                        <!-- Sign Up Form -->
                            <form class="js-validation-signup" method="POST" action="{{ route('register') }}">
                                @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-user-circle"></i>
                                        </span>
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-envelope-open"></i>
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
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
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirmation">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-asterisk"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <div class="custom-control custom-checkbox custom-control-primary">
                                    <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms" required>
                                    <label style="font-weight: 400;" class="custom-control-label" for="signup-terms">By clicking the Register button, you accept <a class="font-w600 font-size-sm" target="_blank"  href="/terms">Privacy Policy</a></label>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-hero-success">
                                    <i class="fa fa-fw fa-plus mr-1"></i> Register
                                </button>
                            </div>
                        </form>
                        <!-- END Sign Up Form -->
                    </div>
                </div>
            </div>
            <!-- END Sign Up Block -->
        </div>
    </div>
    <!-- END Page Content -->
@endsection
