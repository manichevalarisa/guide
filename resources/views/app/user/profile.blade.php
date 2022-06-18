@extends('layouts.backend')
@section('css_after')

@endsection
@section('content')
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            <p class="mb-0"> {{session('error')}} </p>
        </div>
    @endisset
    @if(session('status'))
        <div class="alert alert-success" role="alert">
            <p class="mb-0"> {{session('status')}} </p>
        </div>
    @endisset

    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <form action="{{route('profile')}}" method="POST">
                @csrf
                <!-- Vital Info -->
                    <h2 class="content-heading pt-0">Settings</h2>
                    <div class="row push">
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label for="dm-project-edit-name">
                                    Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{auth()->user()->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="dm-project-edit-name">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{auth()->user()->email}}" required>
                            </div>
                            <div class="form-group">
                                <label for="dm-project-edit-name">
                                    Current Password <span class="text-danger"></span>
                                </label>
                                <input type="password" class="form-control" id="current_password"
                                       name="current_password">
                            </div>
                            <div class="form-group">
                                <label for="dm-project-edit-name">
                                    New Password <span class="text-danger"></span>
                                </label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                            </div>
                        </div>
                    </div>
                    <!-- END Vital Info -->

                    <!-- Submit -->
                    <div class="row push">
                        <div class="col-lg-8 col-xl-5 offset-lg-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa fa-check-circle mr-1"></i> Update Information
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- END Submit -->
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
@section('js_after')

@endsection
