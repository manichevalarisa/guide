@extends('layouts.backend')
@section('css_after')
    <style>
        .cropped-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endsection
@section('content')
    <!-- Hero -->
    <div class="bg-dark bg-image" style="background-image: url({{$product->main_image_path}});">
        <div class="bg-black-75">
            <div class="content content-full content-top">
                <div class="py-4 text-center">
                    <h1 class="font-w700 text-white mb-2">
                        {{$product->name}}
                    </h1>
                    <h2 class="font-size-sm mb-3 font-w400 text-white-75 font-italic">
                        {{$product->description}}
                    </h2>
                    <a class="btn btn-hero-primary" href="/my-products/{{$product->slug}}/{{$product->lectures()->first()->slug}}" data-toggle="click-ripple">
                        <i class="fa fa-play mr-1"></i> Start Learning
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- Lessons -->
        <div class="block block-rounded block-bordered">
            <div class="block-content">
                <table class="table table-striped table-borderless table-vcenter">
                    <tbody>
                    @foreach($product->lectures()->orderBy('order')->get() as $lecture)
                    <tr>
                        <td class="text-center w-25 d-none d-md-table-cell">
                            <a class="item item-circle bg-primary text-white font-size-h2 mx-auto" href="/my-products/{{$product->slug}}/{{$lecture->slug}}">
                               {{$lecture->order < 10 ? ('0'.$lecture->order) : $lecture->order}}
                            </a>
                        </td>
                        <td>
                            <div class="py-4">
                                <div class="font-size-sm font-w700 text-uppercase mb-2">
                                    <span class="text-muted mr-3">Lesson {{$lecture->order}}</span>
                                    <span class="text-primary">
                                                        <i class="fa fa-clock"></i> {{$lecture->time}}
                                                    </span>
                                </div>
                                <a class="link-fx h4 mb-2 d-inline-block text-dark" href="/my-products/{{$product->slug}}/{{$lecture->slug}}">
                                    {{$lecture->name}}
                                </a>
                                <p class="text-muted mb-0">
                                    {{$lecture->description}}
                                </p>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Lessons -->
    </div>
    <!-- END Page Content -->
@endsection
@section('js_after')

@endsection
