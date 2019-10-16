@extends('landing.layouts.app')

@section('title', 'Welcome')

@section('css')
        <!-- Web Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">

        <!-- Vendor Styles -->
        <link href="{{ asset('landing') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('landing') }}/css/animate.css" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('landing') }}/vendor/themify/themify.css" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('landing') }}/vendor/scrollbar/scrollbar.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('landing') }}/vendor/swiper/swiper.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('landing') }}/vendor/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css"/>

        <!-- Theme Styles -->
        <link href="{{ asset('landing') }}/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('landing') }}/css/global/global.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('') }}/nihusubu.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="{{ asset('landing') }}/img/apple-touch-icon.png">
@endsection()
@section('content')
        <!--========== PROMO BLOCK ==========-->
        <div class="s-promo-block-v1 g-bg-color--primary-to-blueviolet-ltr g-fullheight--md">
            <div class="container g-ver-center--md g-padding-y-100--xs">
                <div class="row g-hor-centered-row--md g-margin-t-30--xs g-margin-t-20--sm">
                    <div class="col-lg-6 col-sm-6 g-hor-centered-row__col g-text-center--xs g-text-left--md g-margin-b-60--xs g-margin-b-0--md">
                        <div class="s-promo-block-v1__square-effect g-margin-b-60--xs">
                            <h1 class="g-font-size-32--xs g-font-size-45--sm g-font-size-50--lg g-color--white">A Mobile Experience<br>That Inspires Travel</h1>
                            <p class="g-font-size-20--xs g-font-size-26--md g-color--white g-margin-b-0--xs">Reimagining the real app experience<br>and leading brands.</p>
                        </div>
                        <span class="g-display-block--xs g-display-inline-block--lg g-margin-b-10--xs g-margin-b-10--lg">
                            <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">
                                <span class="s-btn__element--left">
                                    <i class="g-font-size-32--xs ti-apple"></i>
                                </span>
                                <span class="s-btn__element--right g-padding-x-10--xs">
                                    <span class="g-display-block--xs g-font-size-11--xs">Download on the</span>
                                    <span class="g-font-size-16--xs">App Store</span>
                                </span>
                            </a>
                        </span>
                        <span class="g-padding-x-0--xs g-padding-x-10--lg">
                            <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">
                                <span class="s-btn__element--left">
                                    <i class="g-font-size-32--xs ti-android"></i>
                                </span>
                                <span class="s-btn__element--right g-padding-x-10--xs">
                                    <span class="g-display-block--xs g-font-size-11--xs">Download on</span>
                                    <span class="g-font-size-16--xs">Google Play</span>
                                </span>
                            </a>
                        </span>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4 col-sm-4 g-hor-centered-row__col">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                            <form class="center-block g-width-350--xs g-bg-color--white-opacity-lightest g-box-shadow__blueviolet-v1 g-padding-x-40--xs g-padding-y-60--xs g-radius--4">
                                <div class="g-text-center--xs g-margin-b-40--xs">
                                    <h2 class="g-font-size-30--xs g-color--white">Signup for Free</h2>
                                </div>
                                <div class="g-margin-b-30--xs">
                                    <input type="email" class="form-control s-form-v3__input" placeholder="* Email">
                                </div>
                                <div class="g-margin-b-30--xs">
                                    <input type="password" class="form-control s-form-v3__input" placeholder="* Password">
                                </div>
                                <div class="g-text-center--xs">
                                    <button type="submit" class="text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs">Signup</button>
                                    <a class="g-color--white g-font-size-13--xs" href="#">Forgot Password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--========== END PROMO BLOCK ==========-->

        <!--========== PAGE CONTENT ==========-->
        <!-- Mockup -->
        <div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-125--xsm">
            <div class="row g-hor-centered-row--md g-row-col--5 g-margin-b-80--xs g-margin-b-100--md">
                <div class="col-sm-5 g-hor-centered-row__col">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Culture</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">About Megakit</h2>
                    <p class="g-font-size-18--sm">We aim high at being focused on building relationships with our clients and community. Using our creative gifts drives this foundation.</p>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5 g-hor-centered-row__col">
                    <img class="img-responsive" src="{{ asset('landing') }}/img/mockups/iphone-03.png" alt="Mockup Image">
                </div>
            </div>
            <div class="row g-hor-centered-row--md g-row-col--5">
                <div class="col-sm-5 col-sm-push-7 g-hor-centered-row__col">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Production</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">Branding Work</h2>
                    <p class="g-font-size-18--sm">Working together on the daily requires each individual to let the greater good of the team’s work surface above their own ego.</p>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5 col-sm-pull-7 g-hor-centered-row__col g-text-left--xs g-text-right--md">
                    <img class="img-responsive" src="{{ asset('landing') }}/img/mockups/iphone-02.png" alt="Mockup Image">
                </div>
            </div>
        </div>
        <!-- End Mockup -->

        <!-- Video -->
        <section class="s-video__bg" data-vidbg-bg="mp4: include/media/mp4_video.mp4, webm: include/media/webm_video.webm, poster: include/media/fallback.jpg" data-vidbg-options="loop: true, muted: true, overlay: false">
            <div class="container g-position--overlay g-text-center--xs">
                <div class="g-padding-y-50--xs g-margin-t-50--xs g-margin-t-100--sm g-margin-b-100--xs g-margin-b-250--md">
                    <h2 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white">More Than a Look,</h2>
                    <h2 class="g-font-size-36--xs g-font-size-50--sm g-font-size-60--md g-color--white">Design is Functional.</h2>
                </div>
            </div>
        </section>
        <!-- End Video -->

        <!-- Mockup -->
        <div class="container g-margin-t-o-100--xs g-margin-t-o-230--md">
            <div class="center-block s-mockup-v1">
                <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                    <img class="img-responsive" src="{{ asset('landing') }}/img/mockups/devices-01.png" alt="Mockup Image">
                </div>
            </div>
        </div>
        <!-- End Mockup -->

        <!-- Portfolio -->
        <div class="container g-padding-y-80--xs g-padding-y-125--xsm">
            <div class="row g-margin-b-30--xs">
                <div class="col-sm-4">
                    <div class="g-margin-t-20--md g-margin-b-40--xs">
                        <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Branding Work</p>
                        <h2 class="g-font-size-32--xs g-font-size-36--md">Projects</h2>
                        <p>We are masters of most current technologies.<br>Check us out and enjoy things that we know we're good at.</p>
                    </div>
                </div>

                <div class="col-sm-8">
                    <!-- Portfolio Gallery -->
                    <div id="js__grid-portfolio-gallery" class="s-portfolio__paginations-v1 cbp">
                        <!-- Item -->
                        <div class="s-portfolio__item cbp-item motion graphic">
                            <div class="s-portfolio__img-effect">
                                <img src="{{ asset('landing') }}/img/970x647/04.jpg" alt="Portfolio Image">
                            </div>
                            <div class="s-portfolio__caption-hover--cc">
                                <div class="g-margin-b-25--xs">
                                    <h3 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Portfolio Item</h3>
                                    <p class="g-color--white-opacity">by KeenThemes Inc.</p>
                                </div>
                                <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                                    <li>
                                        <a href="{{ asset('landing') }}/img/970x647/04.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle" data-title="Portfolio Item <br/> by KeenThemes Inc.">
                                            <i class="ti-fullscreen"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                            <i class="ti-link"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="s-portfolio__item cbp-item logos graphic">
                            <div class="s-portfolio__img-effect">
                                <img src="{{ asset('landing') }}/img/970x647/09.jpg" alt="Portfolio Image">
                            </div>
                            <div class="s-portfolio__caption-hover--cc">
                                <div class="g-margin-b-25--xs">
                                    <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Portfolio Item</h4>
                                    <p class="g-color--white-opacity">by KeenThemes Inc.</p>
                                </div>
                                <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                                    <li>
                                        <a href="{{ asset('landing') }}/img/970x647/09.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle" data-title="Portfolio Item <br/> by KeenThemes Inc.">
                                            <i class="ti-fullscreen"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                            <i class="ti-link"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="s-portfolio__item cbp-item logos motion">
                            <div class="s-portfolio__img-effect">
                                <img src="{{ asset('landing') }}/img/970x647/05.jpg" alt="Portfolio Image">
                            </div>
                            <div class="s-portfolio__caption-hover--cc">
                                <div class="g-margin-b-25--xs">
                                    <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Portfolio Item</h4>
                                    <p class="g-color--white-opacity">by KeenThemes Inc.</p>
                                </div>
                                <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                                    <li>
                                        <a href="{{ asset('landing') }}/img/970x647/05.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle" data-title="Portfolio Item <br/> by KeenThemes Inc.">
                                            <i class="ti-fullscreen"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                            <i class="ti-link"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="s-portfolio__item cbp-item graphic">
                            <div class="s-portfolio__img-effect">
                                <img src="{{ asset('landing') }}/img/970x647/06.jpg" alt="Portfolio Image">
                            </div>
                            <div class="s-portfolio__caption-hover--cc">
                                <div class="g-margin-b-25--xs">
                                    <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Portfolio Item</h4>
                                    <p class="g-color--white-opacity">by KeenThemes Inc.</p>
                                </div>
                                <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                                    <li>
                                        <a href="{{ asset('landing') }}/img/970x647/06.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle" data-title="Portfolio Item <br/> by KeenThemes Inc.">
                                            <i class="ti-fullscreen"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                            <i class="ti-link"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="s-portfolio__item cbp-item logos">
                            <div class="s-portfolio__img-effect">
                                <img src="{{ asset('landing') }}/img/970x647/07.jpg" alt="Portfolio Image">
                            </div>
                            <div class="s-portfolio__caption-hover--cc">
                                <div class="g-margin-b-25--xs">
                                    <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Portfolio Item</h4>
                                    <p class="g-color--white-opacity">by KeenThemes Inc.</p>
                                </div>
                                <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                                    <li>
                                        <a href="{{ asset('landing') }}/img/970x647/07.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle" data-title="Portfolio Item <br/> by KeenThemes Inc.">
                                            <i class="ti-fullscreen"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                            <i class="ti-link"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="s-portfolio__item cbp-item motion graphic">
                            <div class="s-portfolio__img-effect">
                                <img src="{{ asset('landing') }}/img/970x647/08.jpg" alt="Portfolio Image">
                            </div>
                            <div class="s-portfolio__caption-hover--cc">
                                <div class="g-margin-b-25--xs">
                                    <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Portfolio Item</h4>
                                    <p class="g-color--white-opacity">by KeenThemes Inc.</p>
                                </div>
                                <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                                    <li>
                                        <a href="{{ asset('landing') }}/img/970x647/08.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle" data-title="Portfolio Item <br/> by KeenThemes Inc.">
                                            <i class="ti-fullscreen"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                            <i class="ti-link"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Item -->
                    </div>
                    <!-- End Portfolio Gallery -->
                </div>
            </div>
        </div>
        <!-- End Portfolio -->

        <!-- Plan -->
        <div class="g-bg-color--sky-light">
            <div class="container g-padding-y-80--xs g-padding-y-125--xsm">
                <div class="g-text-center--xs g-margin-b-80--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Plan</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md">Finding your Plan</h2>
                </div>

                <div class="row g-row-col--5">
                    <!-- Plan -->
                    <div class="col-md-4 g-margin-b-10--xs g-margin-b-0--lg">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-100--xs">
                                <i class="g-display-block--xs g-font-size-40--xs g-color--primary g-margin-b-30--xs ti-archive"></i>
                                <h3 class="g-font-size-18--xs g-color--primary g-margin-b-30--xs">Individual</h3>
                                <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-40--xs">
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Mobile-Optimized Website</li>
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Powerful Documentation</li>
                                </ul>
                                <div class="g-margin-b-40--xs">
                                    <span class="s-plan-v1__price-mark">$</span>
                                    <span class="s-plan-v1__price-tag">39</span>
                                </div>
                                <button type="button" class="text-uppercase s-btn s-btn--sm s-btn--primary-bg g-radius--50 g-padding-x-50--xs">Signup</button>
                            </div>
                        </div>
                    </div>
                    <!-- End Plan -->

                    <!-- Plan -->
                    <div class="col-md-4 g-margin-b-10--xs g-margin-b-0--lg">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".2s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-100--xs">
                                <i class="g-display-block--xs g-font-size-40--xs g-color--primary g-margin-b-30--xs ti-package"></i>
                                <h3 class="g-font-size-18--xs g-color--primary g-margin-b-30--xs">Team</h3>
                                <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-40--xs">
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Mobile-Optimized Website</li>
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Powerful Documentation</li>
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Sell Unlimited Products</li>
                                </ul>
                                <div class="g-margin-b-40--xs">
                                    <span class="s-plan-v1__price-mark">$</span>
                                    <span class="s-plan-v1__price-tag">59</span>
                                </div>
                                <button type="button" class="text-uppercase s-btn s-btn--sm s-btn--primary-bg g-radius--50 g-padding-x-50--xs">Signup</button>
                            </div>
                        </div>
                    </div>
                    <!-- End Plan -->

                    <!-- Plan -->
                    <div class="col-md-4">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".3s">
                            <div class="s-plan-v1 g-text-center--xs g-bg-color--white g-padding-y-100--xs">
                                <i class="g-display-block--xs g-font-size-40--xs g-color--primary g-margin-b-30--xs ti-gift"></i>
                                <h3 class="g-font-size-18--xs g-color--primary g-margin-b-30--xs">Enterprise</h3>
                                <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-40--xs">
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Mobile-Optimized Website</li>
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Powerful Documentation</li>
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> Sell Unlimited Products</li>
                                    <li><i class="g-font-size-13--xs g-color--primary g-margin-r-10--xs ti-check"></i> 24/7 Customer Support</li>
                                </ul>
                                <div class="g-margin-b-40--xs">
                                    <span class="s-plan-v1__price-mark">$</span>
                                    <span class="s-plan-v1__price-tag">79</span>
                                </div>
                                <button type="button" class="text-uppercase s-btn s-btn--sm s-btn--primary-bg g-radius--50 g-padding-x-50--xs">Signup</button>
                            </div>
                        </div>
                    </div>
                    <!-- End Plan -->
                </div>
            </div>
        </div>
        <!-- End Plan -->

        <!-- Subscribe -->
        <div class="g-bg-color--primary-to-blueviolet-ltr">
            <div class="g-container--sm g-text-center--xs g-padding-y-80--xs g-padding-y-125--xsm">
                <div class="g-margin-b-60--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs">Subscribe</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md g-letter-spacing--1 g-color--white">Join Over 1000+ People</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <form class="input-group">
                            <input type="email" class="form-control s-form-v1__input g-radius--left-50" name="email" placeholder="Enter your email">
                            <span class="input-group-btn">
                                <button type="submit" class="s-btn s-btn-icon--md s-btn-icon--white-brd s-btn--white-brd g-radius--right-50"><i class="ti-arrow-right"></i></button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Subscribe -->

        <!-- Testimonials -->
        <div class="g-hor-divider__dashed--sky-light g-padding-y-80--xs g-padding-y-125--xsm">
            <div class="container g-text-center--xs">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-50--xs">Testimonials</p>
                <div class="s-swiper js__swiper-testimonials">
                    <!-- Swiper Wrapper -->
                    <div class="swiper-wrapper g-margin-b-50--xs">
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <img class="g-width-70--xs g-height-70--xs g-hor-border-4__solid--white g-box-shadow__dark-lightest-v4 g-radius--circle g-margin-b-30--xs" src="{{ asset('landing') }}/img/400x400/04.jpg" alt="Image">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-color--heading"><i>" I have purchased many great templates over the years but this product and this company have taken it to the next level. Exceptional customizability. "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--heading-light g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--primary g-margin-b-5--xs">Jake Richardson / Google</h4>
                            </div>
                        </div>
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <img class="g-width-70--xs g-height-70--xs g-hor-border-4__solid--white g-box-shadow__dark-lightest-v4 g-radius--circle g-margin-b-30--xs" src="{{ asset('landing') }}/img/400x400/05.jpg" alt="Image">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-color--heading"><i>" I have purchased many great templates over the years but this product and this company have taken it to the next level. Exceptional customizability. "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--heading-light g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--primary g-margin-b-5--xs">Anna Kusaikina / Apple</h4>
                            </div>
                        </div>
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <img class="g-width-70--xs g-height-70--xs g-hor-border-4__solid--white g-box-shadow__dark-lightest-v4 g-radius--circle g-margin-b-30--xs" src="{{ asset('landing') }}/img/400x400/06.jpg" alt="Image">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-color--heading"><i>" I have purchased many great templates over the years but this product and this company have taken it to the next level. Exceptional customizability. "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--heading-light g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--primary g-margin-b-5--xs">Lucas Richardson / Microsoft</h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Swipper Wrapper -->

                    <!-- Arrows -->
                    <div class="g-font-size-22--xs g-color--heading js__swiper-fraction"></div>
                    <a href="javascript:void(0);" class="g-display-none--xs g-display-inline-block--sm s-swiper__arrow-v1--right s-icon s-icon--md s-icon--primary-brd g-radius--circle ti-angle-right js__swiper-btn--next"></a>
                    <a href="javascript:void(0);" class="g-display-none--xs g-display-inline-block--sm s-swiper__arrow-v1--left s-icon s-icon--md s-icon--primary-brd g-radius--circle ti-angle-left js__swiper-btn--prev"></a>
                    <!-- End Arrows -->
                </div>
            </div>
        </div>
        <!-- End Testimonials -->

        <!-- Clients -->
        <div class="g-container--md g-padding-y-80--xs g-padding-y-100--sm">
            <!-- Swiper Clients -->
            <div class="s-swiper js__swiper-clients">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="s-clients-v1" src="{{ asset('landing') }}/img/clients/01-dark.png" alt="Clients Logo">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".2s">
                            <img class="s-clients-v1" src="{{ asset('landing') }}/img/clients/02-dark.png" alt="Clients Logo">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".3s">
                            <img class="s-clients-v1" src="{{ asset('landing') }}/img/clients/03-dark.png" alt="Clients Logo">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".4s">
                            <img class="s-clients-v1" src="{{ asset('landing') }}/img/clients/04-dark.png" alt="Clients Logo">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="wow fadeIn" data-wow-duration=".3" data-wow-delay=".5s">
                            <img class="s-clients-v1" src="{{ asset('landing') }}/img/clients/05-dark.png" alt="Clients Logo">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Swiper Clients -->
        </div>
        <!-- End Clients -->

        <!-- Contact -->
        <div class="s-promo-block-v7 g-bg-position--center g-bg-color--dark-light" style="background: url('src="{{ asset('landing') }}/img/1920x1080/05.jpg') no-repeat;">
            <div class="g-container--sm g-padding-y-80--xs g-padding-y-125--xsm">
                <div class="g-text-center--xs g-margin-b-60--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs">Contact Us</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md g-color--white">Get in Touch</h2>
                </div>
                <form class="center-block g-width-500--sm g-width-550--md">
                    <div class="g-margin-b-30--xs">
                        <input type="text" class="form-control s-form-v3__input" placeholder="* Name">
                    </div>
                    <div class="row g-margin-b-50--xs">
                        <div class="col-sm-6 g-margin-b-30--xs g-margin-b-0--md">
                            <input type="email" class="form-control s-form-v3__input" placeholder="* Email">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control s-form-v3__input" placeholder="* Phone">
                        </div>
                    </div>
                    <div class="g-margin-b-80--xs">
                        <textarea class="form-control s-form-v3__input" rows="5" placeholder="* Your message"></textarea>
                    </div>
                    <div class="g-text-center--xs">
                        <button type="submit" class="text-uppercase s-btn s-btn--md s-btn--white-brd g-radius--50 g-padding-x-70--xs g-margin-b-20--xs">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Contact -->
        <!--========== END PAGE CONTENT ==========-->
@endsection()
@section('js')
    <!-- Back To Top -->
    <a href="javascript:void(0);" class="s-back-to-top js__back-to-top"></a>

    <!--========== JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) ==========-->
    <!-- Vendor -->
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/jquery.migrate.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/jquery.smooth-scroll.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/jquery.back-to-top.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/vidbg.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/swiper/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/jquery.wow.min.js"></script>

    <!-- General Components and Settings -->
    <script type="text/javascript" src="{{ asset('landing') }}/js/global.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/js/components/header-sticky.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/js/components/scrollbar.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/js/components/swiper.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/js/components/portfolio-4-col-slider.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/js/components/wow.min.js"></script>
    <!--========== END JAVASCRIPTS ==========-->

@endsection()
