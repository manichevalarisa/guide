@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content content-boxed">
        <div class="row row-deck">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Verify Your Email Address</h3>
                    </div>
                    <div class="block-content">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ t('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        {{ t('Before proceeding, please check your email for a verification link.') }}
                            <br> <br>
                        {{ t('If you did not receive the email') }}
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ t('click here to request another') }}</button>
                            </form>
                            <br> <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
