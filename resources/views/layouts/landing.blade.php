<!doctype html>
<html lang="ru">

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
    <link rel="stylesheet" href="/landing/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/landing/css/plugins/slick.css">
    <link rel="stylesheet" href="/landing/css/plugins/font-awesome.css">
    <link rel="stylesheet" href="/landing/css/plugins/plugins.css">
    <link rel="stylesheet" href="/landing/css/style.css">
    @yield('css_after')
</head>

<body class="active_acrollToTop">

<div class="main-content">
    <div class="wrapper position-relative">
        <!-- Start Page Wrapper  -->
        <main class="pv-page-wrapper">
            <!-- Start Set Line  -->
            <div class="set-line-wrapper">
                <div class="set-line-area">
                    <div class="line-inner">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <!-- End Set Line  -->

            <!-- Start Header -->
            <header class="ax-header haeder-default header-sticky light-logo-version header-transparent sveetlo-header-sticky">
                <div class="header-wrapper">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 header-left">
                                <div class="logo">
                                    <a href="index.html">
                                        <svg width="281px" height="60px" viewBox="0 0 281 60" version="1.1">
                                            <!-- Generator: Sketch 60.1 (88133) - https://sketch.com -->
                                            <title>Logo</title>
                                            <desc>Created with Sketch.</desc>
                                            <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-315.000000, -40.000000)">
                                                    <g>
                                                        <g id="logo" transform="translate(315.000000, 40.000000)">
                                                            <text id="Keystroke-Startup-la" font-family="DMSans-Bold, DM Sans" font-size="20" font-weight="bold" fill="#000248">
                                                                <tspan x="75" y="24">Keystroke</tspan>
                                                                <tspan x="175.14" y="24.5001221" font-family="DMSans-Regular, DM Sans" font-weight="normal"></tspan>
                                                                <tspan x="76.16" y="49.5001221" font-family="DMSans-Regular, DM Sans" font-size="18" font-weight="normal">Startup template</tspan>
                                                            </text>
                                                            <g id="Favicon">
                                                                <rect id="Base" fill="#702FFF" x="0" y="0" width="60" height="60" rx="14"></rect>
                                                                <g id="Group-3" transform="translate(15.000000, 11.000000)">
                                                                    <circle id="icon-oval-lg" class="icon-oval-lg" stroke="#FFFFFF" stroke-width="7" cx="15" cy="15" r="11.5"></circle>
                                                                    <circle id="icon-oval-sm" class="icon-oval-sm" fill="#FFFFFF" cx="4" cy="34" r="4"></circle>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-6 col-sm-6 col-12 header-right">
                                <div class="mainmenu-wrapepr justify-content-sm-end justify-content-start mt_mobile--10">
                                    <!-- Start Mainmanu Nav -->
                                    <nav class="mainmenu-nav d-none d-lg-block">
                                        <ul class="mainmenu">
                                            <li><a class="smoth-animation" href="#demos">Template</a></li>
                                            <li><a class="smoth-animation" href="#feature">Features</a></li>
                                            <li><a class="smoth-animation" href="#chooseUs">Why Us</a></li>
                                        </ul>
                                    </nav>
                                    <!-- End Mainmanu Nav -->
                                    <div class="sveetlo-header-extra d-flex align-items-center ml--30">
                                        <!-- Start Hamburger -->
                                        <a href="#" class="sveetlo-button btn-large btn-solid btn-primary-color d-none d-md-block" @guest data-toggle="modal" data-target="#buy-product-modal" @else onclick="document.getElementById('buy-form').submit()" @endguest>
                                            <span class="button-text">Buy Now</span>
                                            <span class="button-icon-right">
                                                    <i class="far fa-shopping-cart"></i>
                                                </span>
                                        </a>
                                        <!-- End Hamburger -->
                                    </div>

                                    @guest
                                    <div class="modal" id="buy-product-modal" tabindex="-1" role="dialog" aria-labelledby="buy-product-modal-label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="svvetlo-contact-form contact-form-style-1">
                                                        <h3 class="title">Get a free Keystroke quote now</h3>
                                                        <form method="post" action="{{'/payment/' . \App\Models\Product::first()->id}}">
                                                            @csrf
                                                            <div class="form-group @auth focused @endauth">
                                                                <input type="text" name="name" id="name" required @auth value="{{auth()->user()->name}}" @endauth>
                                                                <label>Name</label>
                                                                <span class="focus-border"></span>
                                                            </div>
                                                            <div class="form-group @auth focused @endauth">
                                                                <input type="email" id="email" name="email" required @auth value="{{auth()->user()->email}}" @endauth>
                                                                <label>Email</label>
                                                                <span class="focus-border"></span>
                                                            </div>
                                                            <div class="form-group text-center">
                                                                <div class="form-group">
                                                                    <input type="checkbox" class="" id="signup-terms" name="signup-terms" required>
                                                                    <label class="custom-control-label" for="signup-terms">Нажимая кнопку Регистрация, вы принимаете <a target="_blank" class="font-w600 font-size-sm" href="/terms">Условия, Политику использования данных</a></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="sveetlo-button btn-large btn-transparent w-100">
                                                                    <span class="button-text">Get Pricing Now</span><span class="button-icon"></span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                        <form method="post" action="{{'/payment/' . \App\Models\Product::first()->id}}" id="buy-form">
                                            @csrf
                                        </form>
                                    @endguest

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Start Header -->

            @yield('content')

        <!-- Start Footer Area  -->
            <footer class="pv-footer-area pv-footer-styles theme-gradient-4 pt--110 position-relative">
                <!-- Start Copyright Area  -->
                <div class="pv-copyright-area ptb--120">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2">
                                <div class="copyright-inner">
                                    <div class="inner-left">
                                        <p>© 2020. All rights reserved by Axilweb</p>
                                        <ul class="liststyle d-flex quick-links">
                                            <li><a target="_blank" href="https://themeforest.net/user/axilthemes/portfolio">MORE TEMPLATES</a></li>
                                            <li><a target="_blank" href="https://www.axilweb.com/privecy-policy.html">PRIVACY POLICY</a></li>
                                        </ul>
                                    </div>
                                    <div class="inner-right">
                                        <ul class="social-share style-rounded bg-color--white flex-nowrap">
                                            <li><a target="_blank" href="https://www.facebook.com/axilwebltd/"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a target="_blank" href="https://dribbble.com/axilweb"><i class="fas fa-basketball-ball"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Copyright Area  -->
                <div class="shape-group">
                    <div class="shape shape-1">
                        <img src="/landing/images/shape/shape-07.svg" alt="Shape Images">
                    </div>
                    <div class="shape shape-2">
                        <img src="/landing/images/shape/shape-08.svg" alt="Shape Images">
                    </div>
                </div>
            </footer>
            <!-- End Footer Area  -->
        </main>
        <!-- end Page Wrapper  -->
    </div>
</div>

<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="/landing/js/vendor/modernizr.min.js"></script>
<!-- jQuery JS -->
<script src="/landing/js/vendor/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="/landing/js/vendor/bootstrap.min.js"></script>
<script src="/landing/js/waypoints.min.js"></script>
<script src="/landing/js/wow.js"></script>
<script src="/landing/js/counterup.js"></script>
<script src="/landing/js/imagesloaded.js"></script>
<script src="/landing/js/isotope.js"></script>
<script src="/landing/js/tilt.js"></script>
<script src="/landing/js/anime.js"></script>
<script src="/landing/js/tweenmax.js"></script>
<script src="/landing/js/slipting.js"></script>
<script src="/landing/js/scrollmagic.js"></script>
<script src="/landing/js/addindicators.js"></script>
<script src="/landing/js/slick.js"></script>
<script src="/landing/js/youtube.js"></script>
<script src="/landing/js/countdown.js"></script>
<script src="/landing/js/scrollup.js"></script>
<script src="/landing/js/stickysidebar.js"></script>
<script src="/landing/js/contactform.js"></script>
<!-- Plugins JS -->
<script src="/landing/js/plugins/plugins.min.js"></script>
<!-- Main JS -->
<script src="/landing/js/main.js"></script>

@yield('js_after')

</body>

</html>
