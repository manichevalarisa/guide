@extends('layouts.simple', [$title =  $title ?? 'Support', $meta = $meta ?? ''])

@section('content')
    <!-- Hero -->
    <!-- Page Content -->
    <div class="bg-image" style="background-color: #5a7fda">
        <div class="row no-gutters justify-content-center bg-black-75">
            <!-- Main Section -->
            <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                <div class="p-3 w-100">
                    <!-- Header -->
                    <div class="mb-3 text-center">
                        <a class="link-fx text-primary font-w700 font-size-h1" href="/">
                            {{ config('app.name') }}
                        </a>
                        <p class="text-uppercase font-w700 font-size-sm text-muted">Support</p>
                    </div>
                    <!-- END Header -->

                    <!-- Sign Up Form -->
                    <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _es6/pages/op_auth_signup.js) -->
                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <div class="row no-gutters justify-content-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="col-sm-8 col-xl-6">
                            <form action="{{route('support')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="username">Name</label>
                                                    <input class="form-control form-control-alt" required="" name="name" type="text" id="username">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="useremail">Email</label>
                                                    <input class="form-control form-control-alt" required="" name="email" type="text" id="useremail">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="formmessage">Message</label>
                                                    <textarea class="form-control form-control-alt" name="message" cols="50" rows="10" id="formmessage" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12 text-right">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light mt-2"><i class="mdi mdi-send"></i> Send
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Sign Up Form -->
                </div>
            </div>
            <!-- END Main Section -->
        </div>
    </div>
@endsection
