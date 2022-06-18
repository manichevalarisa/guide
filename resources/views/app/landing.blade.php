@extends('layouts.landing')
@section('css_after')

@endsection
@section('content')
<!-- Start Banner Area  -->
<div class="pv-banner-wrapper theme-gradient-4">
    <div class="pv-banner-area paralax-area">
        <div class="container wrapper">
            <div class="row">
                <div class="col-lg-7">
                    <div class="inner pt--200 pt_sm--0 pt_md--0">
                        <h1 class="title wow slideFadeInUp" >
                            Creative agency, corporate and portfolio HTML Template</h1>

                        <a class="sveetlo-button btn-large btn-transparent wow slideFadeInUp" href="#" @guest data-toggle="modal" data-target="#buy-product-modal" @else onclick="document.getElementById('buy-form').submit()" @endguest><span
                                class="button-text">Pay</span>
                            <span class="far fa-shopping-cart"> </span>
                        </a> <br><br><br>

                        <a class="scroll-down-btn smoth-animation" href="#demos"><i
                                class="fal fa-arrow-down"></i><span>Explore Template</span></a>

                    </div>
                </div>
            </div>
            <div class="theme-brief">

                <!-- Start Single Counter  -->
                <div class="single-counter">
                    <span class="subtile">Demo Website</span>
                    <h2 class="title">05</h2>
                </div>
                <!-- End Single Counter  -->

                <!-- Start Single Counter  -->
                <div class="single-counter">
                    <span class="subtile">Inner Page</span>
                    <h2 class="title">20</h2>
                </div>
                <!-- End Single Counter  -->

                <!-- Start Single Counter  -->
                <div class="single-counter">
                    <span class="subtile">Elements</span>
                    <h2 class="title">15</h2>
                </div>
                <!-- End Single Counter  -->
            </div>
        </div>

        <div class="shape-group">
            <div class="shape shape-1">
                <img src="/landing/images/shape/shape-01.svg" alt="Shape Images">
            </div>
            <div class="shape shape-2">
                <img src="/landing/images/shape/shape-02.svg" alt="Shape Images">
            </div>
            <div class="shape shape-3">
                <img src="/landing/images/shape/shape-03.svg" alt="Shape Images">
            </div>
            <div class="shape shape-4">
                <img src="/landing/images/shape/shape-04.svg" alt="Shape Images">
            </div>
            <div class="shape shape-5">
                <img src="/landing/images/shape/shape-05.svg" alt="Shape Images">
            </div>
            <div class="shape shape-6">
                <img src="/landing/images/shape/shape-06.svg" alt="Shape Images">
            </div>
        </div>

        <div class="mokup-group">
            <div class="single-mokup mokup-1">
                <img class="paralax--1" src="/landing/images/phone.png" alt="Mokup Images">
            </div>
            <div class="single-mokup mokup-2">
                <img class="paralax--2" src="/landing/images/large-mockup.png" alt="Mokup Images">
            </div>
            <div class="single-mokup mokup-3">
                <img class="paralax--3" src="/landing/images/small-mockup.png" alt="Mokup Images">
            </div>
        </div>
    </div>
</div>
<!-- End Banner Area  -->

<!-- Start Page Demo Area  -->
<div class="page-demo-area ax-section-gap theme-gradient-9 position-relative" id="demos">
    <div class="container wrapper">
        <div class="row align-items-center row--40">
            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                <div class="pv-section-title">
                    <h2>Our Template Are Just <br /> Ready to Use</h2>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt_sm--20">
                <div class="pv-subtitle-title">
                    <p>You will love all of the features in our template. <br /> 100% guaranteed
                        satisfaction.
                    </p>
                </div>
            </div>
        </div>
        <div class="row row--40">
            <!-- Start Single Demo  -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-demo">
                    <a target="_blank" href="home-01.html">
                        <div class="thumb box paralax-image">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <img src="/landing/images/home-01.png" alt="Creative Agency">
                        </div>
                        <h5 class="title">Digital Agency</h5>
                    </a>
                </div>
            </div>
            <!-- End Single Demo  -->

            <!-- Start Single Demo  -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-demo">
                    <a target="_blank" href="home-02.html">
                        <div class="thumb box paralax-image">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <img src="/landing/images/home-02.png" alt="Creative Agency">
                        </div>
                        <h5 class="title">Creative Agency </h5>
                    </a>
                </div>
            </div>
            <!-- End Single Demo  -->

            <!-- Start Single Demo  -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-demo">
                    <a target="_blank" href="home-03.html">
                        <div class="thumb box paralax-image">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <img src="/landing/images/home-03.png" alt="Creative Agency">
                        </div>
                        <h5 class="title">Personal Portfolio</h5>
                    </a>
                </div>
            </div>
            <!-- End Single Demo  -->

            <!-- Start Single Demo  -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-demo">
                    <a target="_blank" href="home-04.html">
                        <div class="thumb box paralax-image">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <img src="/landing/images/home-05.png" alt="Creative Agency">
                        </div>
                        <h5 class="title">Startup</h5>
                    </a>
                </div>
            </div>
            <!-- End Single Demo  -->

            <!-- Start Single Demo  -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-demo">
                    <a target="_blank" href="home-05.html">
                        <div class="thumb box paralax-image">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <img src="/landing/images/home-04.png" alt="Creative Agency">
                        </div>
                        <h5 class="title">Corporate Agency</h5>
                    </a>
                </div>
            </div>
            <!-- End Single Demo  -->

            <!-- Start Single Demo  -->
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-demo commin">
                    <a href="#">
                        <div class="thumb box paralax-image">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <img src="/landing/images/comming-soon.png" alt="Creative Agency">
                        </div>
                    </a>
                </div>
            </div>
            <!-- End Single Demo  -->

        </div>
        <div class="shape-group">
            <div class="shape shape-1">
                <img src="/landing/images/shape/shape-11.svg" alt="Shape Images">
            </div>
            <div class="shape shape-2">
                <img src="/landing/images/shape/shape-11.svg" alt="Shape Images">
            </div>
        </div>
    </div>
</div>
<!-- End Page Demo Area  -->

<!-- Start Feature Area  -->
<div class="pv-feature-area ax-section-gap theme-gradient-4 position-relative" id="feature">
    <div class="container wrapper">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                <div class="pv-section-title">
                    <h2>We have Impressive <br />Template Features</h2>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt_sm--20">
                <div class="pv-subtitle-title">
                    <p>You will love all of the features in our template.<br /> 100% guaranteed
                        satisfaction.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">

            <!-- Start Single Feature  -->
            <div class="col-lg-4 col-md-6 col-12 mt--85 mt_md--30 mt_sm--30">
                <div class="pv-feature paralax-image">
                    <div class="inner">
                        <div class="icon">
                            <img src="/landing/images/feature-icon-01.png" alt="creative Agency">
                        </div>
                        <div class="content">
                            <h5 class="title">Fully Responsive Layout</h5>
                            <p>All the pages of this template are responsive. We used Bootstrap framework to build the website. It’s the best in class. </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Feature  -->

            <!-- Start Single Feature  -->
            <div class="col-lg-4 col-md-6 col-12 mt--85 mt_md--30 mt_sm--30">
                <div class="pv-feature paralax-image">
                    <div class="inner">
                        <div class="icon">
                            <img src="/landing/images/feature-icon-02.png" alt="creative Agency">
                        </div>
                        <div class="content">
                            <h5 class="title">21+ Resourceful Pages</h5>
                            <p>All the pages are created based on real contents that you will need to
                                run
                                your business. Change image and text and you’re good to go!</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Feature  -->

            <!-- Start Single Feature  -->
            <div class="col-lg-4 col-md-6 col-12 mt--85 mt_md--30 mt_sm--30">
                <div class="pv-feature paralax-image">
                    <div class="inner">
                        <div class="icon">
                            <img src="/landing/images/feature-icon-03.png" alt="creative Agency">
                        </div>
                        <div class="content">
                            <h5 class="title">Font Awesome 5 Pro Icons</h5>
                            <p>This template comes with licensed premium quality icons from FontAwesome. All the icons are font based and ready to match the quality of any HQ screen.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Feature  -->

            <!-- Start Single Feature  -->
            <div class="col-lg-4 col-md-6 col-12 mt--85 mt_md--30 mt_sm--30">
                <div class="pv-feature paralax-image">
                    <div class="inner">
                        <div class="icon">
                            <img src="/landing/images/feature-icon-04.png" alt="creative Agency">
                        </div>
                        <div class="content">
                            <h5 class="title">Google Font</h5>
                            <p>A vast collection of Google fonts are integrated with the template. You can use any of them that goes with your branding.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Feature  -->

            <!-- Start Single Feature  -->
            <div class="col-lg-4 col-md-6 col-12 mt--85 mt_md--30 mt_sm--30">
                <div class="pv-feature paralax-image">
                    <div class="inner">
                        <div class="icon">
                            <img src="/landing/images/feature-icon-08.png" alt="creative Agency">
                        </div>
                        <div class="content">
                            <h5 class="title">Lifetime Update</h5>
                            <p>Purchase our template only once and get lifetime updates. We keep updating our products to stay up to date with latest trends and technology.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Feature  -->
        </div>
        <div class="shape-group">
            <div class="shape shape-1">
                <img src="/landing/images/shape/shape-09.svg" alt="Shape Images">
            </div>
            <div class="shape shape-2">
                <img src="/landing/images/shape/shape-10.svg" alt="Shape Images">
            </div>
        </div>

    </div>
</div>
<!-- End Feature Area  -->

<!-- Start Choose us Area  -->
<div class="choose-us-area bg-color-extra11 position-relative" id="chooseUs">
    <div class="ax-section-gap">
        <div class="container wrapper">

            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <div class="pv-section-title">
                        <h2>Why Buy Template <br /> From Us?</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt_sm--20">
                    <div class="pv-subtitle-title">
                        <p>Every template is built with such efforts <br /> that they are ready to meet all
                            of
                            our
                            <br /> clients’ expectations.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Start Single Choose Us Area  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="pv-choose-us paralax-image">
                        <div class="inner">
                            <div class="content">
                                <div class="icon">
                                    <img src="/landing/images/choose-us-01.png" alt="creative Agency">
                                </div>
                                <div class="title">
                                    <h5>A Complete Product for Your Business</h5>
                                </div>
                            </div>
                            <div class="description">
                                <p>We build Template that are rich in content and have good user interface
                                    to
                                    deliver premium user experience for your customers.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Choose Us Area  -->

                <!-- Start Single Choose Us Area  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="pv-choose-us bg-color-2 paralax-image">
                        <div class="inner">
                            <div class="content">
                                <div class="icon">
                                    <img src="/landing/images/choose-us-02.png" alt="creative Agency">
                                </div>
                                <div class="title">
                                    <h5>SEO & SMM Friendly</h5>
                                </div>
                            </div>
                            <div class="description">
                                <p>Our Template is SEO and SMM friendly that aligns with your digital
                                    marketing
                                    strategies to bring more organic traffic to your website.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Choose Us Area  -->

                <!-- Start Single Choose Us Area  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="pv-choose-us bg-color-3 paralax-image">
                        <div class="inner">
                            <div class="content">
                                <div class="icon">
                                    <img src="/landing/images/choose-us-03.png" alt="creative Agency">
                                </div>
                                <div class="title">
                                    <h5>Well Organized Codes</h5>
                                </div>
                            </div>
                            <div class="description">
                                <p>The coding structure of our items organized so other developers can
                                    easily
                                    recognize the pattern and make updates as needed.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Choose Us Area  -->
            </div>
            <div class="row mt--40 mb_md--5 md_sm--5">
                <!-- Start Single Choose Us Area  -->
                <div class="col-lg-4 col-md-6 col-12 offset-lg-2 mt--85 mt_lg--40 mt_md--5 mt_sm--5">
                    <div class="pv-feature paralax-image online-documentation">
                        <div class="inner">
                            <div class="icon">
                                <img src="/landing/images/feature-icon-06.png" alt="creative Agency">
                            </div>
                            <div class="content">
                                <h4 class="title primary-color">Online Documentation</h4>
                                <p>Well organized and up to date</p>
                                <a target="_blank" href="http://axilthemes.com/docs/keystroke-html/" class="arrow-icon">
                                    <i class="fal fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Choose Us Area  -->

                <!-- Start Single Choose Us Area  -->
                <div class="col-lg-4 col-md-6 col-12 mt--85 mt_lg--40 mt_md--5 mt_sm--5">
                    <div class="pv-feature paralax-image datecated-support">
                        <div class="inner">
                            <div class="icon">
                                <img src="/landing/images/feature-icon-08.png" alt="creative Agency">
                            </div>
                            <div class="content">
                                <h4 class="title extra08-color">Dadecated Support</h4>
                                <p>24/7 round the clock support</p>
                                <a target="_blank" href="http://support.axilthemes.com/support/" class="arrow-icon">
                                    <i class="fal fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Choose Us Area  -->
            </div>

            <div class="shape-group">
                <div class="shape shape-1">
                    <img src="/landing/images/shape/shape-12.svg" alt="Shape images">
                </div>
                <div class="shape shape-2">
                    <img src="/landing/images/shape/shape-13.svg" alt="Shape images">
                </div>
            </div>
        </div>
    </div>
    <!-- Start Call To Action  -->
    <div class="sveetlo-call-to-action callaction-style-2 variation--2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="inner align-items-center">
                        <div class="text">
                            <h2 class="title">Let’s Start Your Business Today!</h2>
                            <p>Missing something? Just tell us what you need by <a target="_blank" href="http://support.axilthemes.com/support/">requesting
                                    us
                                    here.</a></p>
                        </div>
                        <div class="button-wrapper">
                            <a class="sveetlo-button btn-large btn-solid btn-primary-color" href="#" @guest data-toggle="modal" data-target="#buy-product-modal" @else onclick="document.getElementById('buy-form').submit()" @endguest><span
                                    class="button-text">Buy Now</span><span class="button-icon-right"><i
                                        class="far fa-shopping-cart"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Call To Action  -->
</div>
<!-- End Choose us Area  -->
@endsection
@section('js_after')

@endsection
