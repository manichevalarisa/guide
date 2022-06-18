@extends('layouts.simple')
@section('content')
    <!-- Page Content -->
    <div class="row no-gutters justify-content-center bg-body-dark">
        <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
            <!-- Lock Block -->
            <!-- jQuery Vide for video backgrounds, for more examples you can check out https://github.com/VodkaBears/Vide -->
            <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-video" data-vide-bg="assets/media/videos/city_night" data-vide-options="posterType: jpg">
                <div class="row no-gutters">
                    <div class="col-md-6 order-md-1 bg-white">
                        <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                            <!-- Header -->
                            <div class="mb-2 text-center">
                                <a class="link-fx text-{{$status ? 'primary' : 'danger'}} font-w700 font-size-h1" href="/">
                                    <span class="text-dark">{{ config('app.name') }}</span>
                                </a>
                            </div>
                            <!-- END Header -->

                            <!-- Lock Form -->
                            <div class="js-validation-lock">
                                <div class="form-group text-center">
                                    <a href="/" class="btn btn-block btn-hero-{{$status ? 'primary' : 'danger'}}" style="color: white">
                                        <i class="fa fa-fw fa-reply mr-1"></i> {{ t('Вернуться на главную страницу') }}
                                    </a>
                                </div>
                            </div>
                            <!-- END Lock Form -->
                        </div>
                    </div>
                    <div class="col-md-6 order-md-0 bg-{{$status ? 'primary' : 'danger'}}-op d-flex align-items-center">
                        <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6 text-center">
                            <div class="d-block text-white font-size-lg font-w600 mb-3">{{ t(!$status ? 'Извините, но что-то пошло не так :(' : 'Оплата прошла успешно!') }}</div>
                            @if($status)
                            <div class="text-white-75">{{ t('Вам было отправлено письмо с дальнейшими инструкциями.') }}</div>
                            <div class="text-white-75">{{ t('Пожалуйста, проверьте свою почту и папку спам.') }}</div>
                            <div class="text-white-75">{{ t('Если вы не видите письма в почтовом ящике, указанном при оплате, пожалуйста, воспользуйтесь' ) }} <a class="d-block text-white font-size-lg font-w600" href="/instructions">{{ t('инструкцией') }}</a></div>
                            <div class="text-white-75">{{ t('Если у вас возникли какие-то трудности - вы можете обратиться в нашу') }} <a class="d-block text-white font-size-lg font-w600" href="/support"> {{ t('службу поддержки') }} </a></div>
                            @else
                                <div class="text-white-75">{{ t('К сожалению, мы не смогли подтвердить ваш заказ.') }}</div>
                                <div class="text-white-75">{{ t('Если у вас возникли какие-то трудности - вы можете обратиться в нашу') }} <a class="d-block text-white font-size-lg font-w600" href="/support"> {{ t('службу поддержки') }} </a></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Lock Block -->
        </div>
    </div>
    <!-- END Page Content -->
@endsection
