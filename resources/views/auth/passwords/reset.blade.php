@extends('layouts.simple')

@if($email && \App\User::whereEmail($email)->exists() && \App\User::whereEmail($email)->first()->is_new) {{ \App\User::whereEmail($email)->first()->update(['email_verified_at' => \Carbon\Carbon::now(), 'is_new' => 0]) }} @endif

@section('content')
    <!-- Page Content -->
    <div class="bg-image" >
        <div class="row no-gutters justify-content-center bg-success-dark">
            <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                <!-- Reminder Block -->
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
                            <p class="text-uppercase font-w700 font-size-sm text-muted">Update Password</p>
                        </div>
                        <!-- END Header -->

                        <!-- Reminder Form -->
                        <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _es6/pages/op_auth_reminder.js) -->
                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-reminder"  method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-user-circle"></i>
                                        </span>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-asterisk"></i>
                                            </span>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
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
                                <button type="submit" class="btn btn-hero-warning">
                                    <i class="fa fa-fw fa-reply mr-1"></i> Update Password
                                </button>
                            </div>
                        </form>
                        <!-- END Reminder Form -->
                    </div>
                </div>
                <!-- END Reminder Block -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
