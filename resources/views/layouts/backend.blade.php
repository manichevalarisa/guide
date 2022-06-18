<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @isset($metas)
        @foreach($metas as $meta)
            <meta name="{{$meta->name}}" content="{{$meta->text}}">
        @endforeach
    @endisset

    <title>{{ isset($title) ? $title : config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ isset($icon) ? $icon : asset('logo.png') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="{{ mix('css/dashmix.css') }}">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
    <link rel="stylesheet" id="css-theme" href="{{ mix('css/themes/xpro.css') }}">
    @yield('css_after')

    <style>
        .notification-content {
            font-size: 15px;
        }

        .vue-notification .error {
            background-color: #e04f1a;
        }

        .lang-select:focus {
            border: 0;
            background: transparent;
        }
    </style>

    <!-- Scripts -->
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
</head>
<body>
<!-- Page Container -->
<div id="page-container"
     class="{{ isset($closedSidebar) && $closedSidebar ? 'side-trans-enabled' : 'sidebar-o'}} enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">
    <!-- Sidebar -->
    <!--
        Sidebar Mini Mode - Display Helper classes

        Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
            If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

        Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
        Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
        Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="bg-header-dark">
            <div class="content-header bg-white-10">
                <!-- Logo -->
                <a class="link-fx font-w600 font-size-lg text-white" href="/home">
                            <span class="smini-visible">
                                <span class="text-white-75">{{config('app.name', 'Laravel')}}</span>
                            </span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                    <!-- Toggle Sidebar Style -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                    <!-- END Toggle Sidebar Style -->

                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close"
                       href="javascript:void(0)">
                        <i class="fa fa-times-circle"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li class="nav-main-heading">My Info-products</li>
                @forelse(auth()->user()->getPaidProducts() as $product)
                <li class="nav-main-item{{ request()->is('my-products/' . $product->slug) || request()->is('my-products/' . $product->slug . '/*') ? ' open' : '' }}">

                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                       aria-expanded="true">
                        <i class="nav-main-link-icon si si-star"></i>
                        <span class="nav-main-link-name"> {{ $product->name }} </span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('my-products/' . $product->slug) ? ' active' : '' }}" href="/{{'my-products/' . $product->slug}}">
                                <span class="nav-main-link-name">All Lectures</span>
                            </a>
                        </li>
                        @foreach($product->lectures()->orderBy('order')->get() as $lecture)
                            <li class="nav-main-item">
                                <a class="nav-main-link{{ request()->is('my-products/' . $product->slug . '/' . $lecture->slug) ? ' active' : '' }}"
                                   href="{{ '/my-products/' . $product->slug . '/' . $lecture->slug }}">
                                    <span class="nav-main-link-name">{{$lecture->name}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @empty
                @endforelse
            </ul>
        </div>
        <!-- END Side Navigation -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div>
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle"
                        id="sidebar-style-toggler">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!-- END Toggle Sidebar -->


            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div>
                <!-- User Dropdown -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-user d-sm-none"></i>
                        <span class="d-none d-sm-inline-block">{{auth()->user()->name}}</span>
                        <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">

                        <div class="p-2">
                            <!-- Toggle Side Overlay -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" href="/profile" data-toggle="layout"
                               data-action="side_overlay_toggle">
                                <i class="far fa-fw fa-user mr-1"></i> Account Settings
                            </a>
                            <a class="dropdown-item" href="/support" data-toggle="layout"
                               data-action="side_overlay_toggle">
                                <i class="far fa-fw fa-question-circle mr-1"></i> Support
                            </a>
                            <!-- END Side Overlay -->

                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Log Out
                            </a>

                        </div>
                    </div>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <!-- END User Dropdown -->

            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader"
             class="{{isset($pageLoader) ? ($pageLoader ? '' : 'overlay-header') : 'overlay-header'}} bg-primary-darker">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        <div id="app" @if(isset($backcolor)) style="background: {{$backcolor}}" @endif>
            <div id="page-loader" class=" {{isset($loader) ? ($loader ? 'show' : '') : ''}} bg-gd-sea"></div>
            @yield('content')
        </div>
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-0">
            <div class="row font-size-sm">
                <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">
                    {{-- Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://goo.gl/vNS3I" target="_blank">pixelcave</a>--}}
                </div>
                <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                    <a class="font-w600" href="{{url('/home')}}"
                       target="_blank">{{config('app.name', 'Laravel')}}</a> &copy; <span
                        data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Dashmix Core JS -->
<script src="{{ mix('js/dashmix.app.js') }}"></script>


<!-- App Script -->
<script src="{{ asset('js/app.js') }}" defer></script>

@yield('js_after')
</body>
</html>
