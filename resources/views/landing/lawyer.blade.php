@extends('landing.layouts.app')

@section('title', 'About')

@section('css')

        <!-- Web Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">

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

        <!-- Theme Skins -->
        <link href="{{ asset('landing') }}/css/theme/gold.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('') }}/nihusubu.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="{{ asset('landing') }}/img/apple-touch-icon.png">
@endsection()
@section('content')
        <!--========== PROMO BLOCK ==========-->
        <div class="g-fullheight--xs js__parallax-window" style="background: url({{ asset('landing') }}/img/1920x1080/11.jpg) 50% 0 no-repeat fixed; background-size: cover;">
            <div class="g-container--md g-ver-center--xs g-text-center--xs">
                <div class="g-margin-b-70--xs">
                    <h1 class="g-font-size-55--sm g-font-size-70--lg g-font-family--playfair g-color--primary g-margin-b-20--xs g-margin-b-40--sm">High Quality Law</h1>
                    <p class="g-font-size-18--xs g-font-size-20--sm g-font-size-24--lg g-color--white g-margin-b-0--xs">Whether your case involves a complex divorce, child custody, domestic violence or DUI, we are dedicated to vigorously protecting your future.</p>
                </div>
                <a href="#js__scroll-to-section" class="text-uppercase s-btn s-btn-icon--md s-btn--primary-brd g-radius--50 g-padding-x-60--xs">Hire Us</a>
            </div>
            <a href="http://keenthemes.com/" class="s-scroll-to-section-v1--bc g-margin-b-15--xs">
                <span class="g-font-size-18--xs g-color--white ti-angle-double-down"></span>
                <p class="text-uppercase g-font-family--playfair g-color--white g-letter-spacing--3 g-margin-b-0--xs">Learn More</p>
            </a>
        </div>
        <!--========== END PROMO BLOCK ==========-->

        <!--========== PAGE CONTENT ==========-->
        <!-- About -->
        <div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-125--sm g-margin-b-25--xs">
            <div class="row g-hor-centered-row--md">
                <div class="col-md-8 g-hor-centered-row__col g-margin-b-60--xs g-margin-b-0--md">
                    <div class="g-width-100-percent--xs g-width-400--md g-margin-b-40--xs">
                        <h2 class="g-font-size-32--xs g-font-size-36--md g-font-family--playfair g-margin-b-20--xs">We are <br>Leaders in Law</h2>
                        <p class="g-font-size-16--sm">Now that we've aligned the details, it's time to get things mapped out and organized. This part is really crucial in keeping the project in line to completion.</p>
                        <p class="g-font-size-16--sm">The time has come to bring those ideas and plans to life. This is where we really begin to visualize your napkin sketches and make them into beautiful pixels.</p>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".5s">
                        <div class="g-position--overlay g-text-left--xs g-text-right--md g-margin-t-o-50--lg">
                            <span class="g-font-size-60--xs g-font-size-80--sm g-font-size-105--lg g-font-family--playfair g-color--primary g-line-height--xs">15</span>
                            <span class="text-uppercase g-display-block--xs g-font-size-34--xs g-font-size-40--sm g-font-size-50--lg g-font-weight--700 g-font-family--playfair g-color--primary g-line-height--xs">Years</span>
                            <p class="g-font-size-18--xs g-font-size-20--lg">of Experience</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6 col-xs-offset-3 g-full-width--xs g-full-width-offset-0--xs g-hor-centered-row__col">
                    <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                        <img class="img-responsive" src="{{ asset('landing') }}/img/450x700/01.jpg" alt="Image">
                    </div>
                </div>
            </div>
        </div>
        <!-- End About -->

        <!-- Service -->
        <div class="clearfix">
            <div class="g-container--sm g-text-center--xs g-margin-b-125--xs">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Multidisciplinary Approach</p>
                <p class="g-font-size-20--xs">High quality support and results for your legal issues. We take care of our clients. We are your lawyers.</p>
            </div>
            <div class="g-container--sm center-block g-margin-b-125--xs">
                <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                    <img class="img-responsive" src="{{ asset('landing') }}/img/mockups/items-01.png" alt="Mockup Image">
                </div>
            </div>
            <div class="row g-row-col--0">
                <div class="col-sm-4">
                    <div class="g-text-center--xs g-padding-x-30--xs g-padding-x-50--lg g-padding-y-70--xs">
                        <i class="g-display-block--xs g-font-size-40--sm g-color--primary g-margin-b-30--xs ti-heart-broken"></i>
                        <span class="g-display-block--xs g-font-size-13--sm g-letter-spacing--3 g-margin-b-25--xs">01</span>
                        <h2 class="g-font-size-26--xs g-font-family--playfair">Family Law</h2>
                        <ul class="list-unstyled g-ul-li-tb-3--xs">
                            <li><a href="http://keenthemes.com/">Divorce</a></li>
                            <li><a href="http://keenthemes.com/">Asse Distribution</a></li>
                            <li><a href="http://keenthemes.com/">Alimony &amp; Child Support</a></li>
                            <li><a href="http://keenthemes.com/">Grandparent &amp; Relative Custody</a></li>
                            <li><a href="http://keenthemes.com/">Custody &amp; Timesharing</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="g-bg-color--sky-light g-text-center--xs g-padding-x-30--xs g-padding-x-50--lg g-padding-y-70--xs">
                        <i class="g-display-block--xs g-font-size-40--sm g-color--primary g-margin-b-30--xs ti-package"></i>
                        <span class="g-display-block--xs g-font-size-13--sm g-letter-spacing--3 g-margin-b-25--xs">02</span>
                        <h2 class="g-font-size-26--xs g-font-family--playfair">Criminal Law</h2>
                        <ul class="list-unstyled g-ul-li-tb-3--xs">
                            <li><a href="http://keenthemes.com/">Drug Offenses</a></li>
                            <li><a href="http://keenthemes.com/">Weapons Offense</a></li>
                            <li><a href="http://keenthemes.com/">Criminal Domestic Violence</a></li>
                            <li><a href="http://keenthemes.com/">Sexual Offenses</a></li>
                            <li><a href="http://keenthemes.com/">Misdemeanors</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="g-text-center--xs g-padding-x-30--xs g-padding-x-50--lg g-padding-y-70--xs">
                        <i class="g-display-block--xs g-font-size-40--sm g-color--primary g-margin-b-30--xs ti-blackboard"></i>
                        <span class="g-display-block--xs g-font-size-13--sm g-letter-spacing--3 g-margin-b-25--xs">03</span>
                        <h2 class="g-font-size-26--xs g-font-family--playfair">Corporate Law</h2>
                        <ul class="list-unstyled g-ul-li-tb-3--xs">
                            <li><a href="http://keenthemes.com/">Articles of association</a></li>
                            <li><a href="http://keenthemes.com/">Financial assistance</a></li>
                            <li><a href="http://keenthemes.com/">Reconstruction (law)</a></li>
                            <li><a href="http://keenthemes.com/">Say on pay</a></li>
                            <li><a href="http://keenthemes.com/">Industrial democracy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Service -->

        <!-- Parallax -->
        <div class="js__parallax-window" style="background: url({{ asset('landing') }}/img/1920x1080/12.jpg) 50% 0 no-repeat fixed;">
            <div class="container g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-margin-b-100--xs">
                    <div class="g-text-center--xs g-margin-b-50--xs">
                        <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs">Identity &amp; Categories</p>
                        <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-font-family--playfair g-color--white">You are in Good Hands</h2>
                    </div>
                    <a href="http://keenthemes.com/" class="text-uppercase s-btn s-btn-icon--md s-btn--primary-brd g-radius--50 g-padding-x-60--xs">Hire Us</a>
                </div>
            </div>
        </div>
        <!-- End Parallax -->

        <!-- Tab -->
        <div class="container g-margin-t-o-100--xs g-margin-b-125--xs">
            <div class="row g-row-col--0">
                <div class="col-sm-6">
                    <!-- Filter -->
                    <div class="g-bg-position--center g-padding-x-30--xs g-padding-x-40--sm g-padding-y-30--xs g-padding-y-40--sm js__tab-eqaul-height-v1" style="background: url('{{ asset('landing') }}/img/970x970/04.jpg') no-repeat;">
                        <div class="g-hor-border-1__solid--primary g-padding-x-40--xs g-padding-x-50--sm g-padding-y-100--xs g-padding-y-120--sm js__filters-tabs">
                            <div data-filter=".-is-active" class="s-tab__filter-v1 g-font-family--playfair cbp-filter-item-active cbp-filter-item">
                                <span class="text-uppercase g-display-block--xs g-font-size-24--xs g-color--primary">01</span>
                                Family Law
                            </div>
                            <div data-filter=".service" class="s-tab__filter-v1 g-font-family--playfair cbp-filter-item">
                                <span class="text-uppercase g-display-block--xs g-font-size-24--xs g-color--primary">02</span>
                                Criminal Law
                            </div>
                            <div data-filter=".pages" class="s-tab__filter-v1 g-font-family--playfair cbp-filter-item">
                                <span class="text-uppercase g-display-block--xs g-font-size-24--xs g-color--primary">03</span>
                                Corporate Law
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Filter -->

                <!-- Grid -->
                <div class="col-sm-6">
                    <div class="g-bg-color--white g-box-shadow__dark-lightest-v2 g-padding-x-30--xs g-padding-x-60--sm g-padding-y-60--xs g-padding-y-80--sm js__tab-eqaul-height-v1">
                        <div class="cbp js__grid-tabs">
                            <div class="s-tab__grid-v1-item cbp-item -is-active">
                                <div class="g-margin-b-20--xs">
                                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Family Law</p>
                                    <h2 class="g-font-size-32--xs g-font-family--playfair">How Family Law Attorneys Tend to Think, Final Part</h2>
                                </div>
                                <p>The only answer that I have found is to get the case BEFORE any of these attorneys gets involved and do everything possible to make sure that neither party brings them on-board. This is VERY difficult and requires reaching the couple BEFORE either of them has retained counsel.???</p>
                                <p>As luck would have it, this same attorney attended a program I gave on June 23, 2015 on ???How to Resolve Conflict.??? During the Question and Answer portion of the program, he asked me that same question.</p>
                            </div>
                            <div class="s-tab__grid-v1-item cbp-item service">
                                <div class="g-margin-b-20--xs">
                                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Criminal Law</p>
                                    <h2 class="g-font-size-32--xs g-font-family--playfair">A Criminal Defense Attorney is Any Good</h2>
                                </div>
                                <p>As luck would have it, this same attorney attended a program I gave on June 23, 2015 on ???How to Resolve Conflict.??? During the Question and Answer portion of the program, he asked me that same question.</p>
                                <p>I responded by telling him that I currently address the issue by attempting to have a joint consultation with both parties, wherein we only discuss the various processes available for handling family law matters in California and the strengths and weaknesses of each.</p>
                            </div>
                            <div class="s-tab__grid-v1-item cbp-item pages">
                                <div class="g-margin-b-20--xs">
                                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Corporate Law</p>
                                    <h2 class="g-font-size-32--xs g-font-family--playfair">InterLaw Diversity Forum launches BAME &amp; Allies Network</h2>
                                </div>
                                <p>I responded by telling him that I currently address the issue by attempting to have a joint consultation with both parties, wherein we only discuss the various processes available for handling family law matters in California and the strengths and weaknesses of each.</p>
                                <p>The only answer that I have found is to get the case BEFORE any of these attorneys gets involved and do everything possible to make sure that neither party brings them on-board. This is VERY difficult and requires reaching the couple BEFORE either of them has retained counsel.???</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Grid -->
                </div>
            </div>
        </div>
        <!-- End Tab -->

        <!-- Counter -->
        <div class="js__parallax-window" style="background: url({{ asset('landing') }}/img/1920x1080/12.jpg) 50% 0 no-repeat fixed;">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-text-center--xs g-margin-b-80--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs g-color--white-opacity">Facts in Numbers</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md g-font-family--playfair g-letter-spacing--1 g-color--white">You Can Make Us Better</h2>
                </div>
                <div class="row">
                    <div class="col-md-3 col-xs-6 g-full-width--xs g-margin-b-70--xs g-margin-b-0--lg">
                        <div class="g-text-center--xs">
                            <div class="g-margin-b-10--xs">
                                <span class="g-font-size-40--xs g-font-family--playfair g-color--primary">$</span>
                                <figure class="g-display-inline-block--xs g-font-size-70--xs g-font-family--playfair g-color--primary js__counter">500</figure>
                            </div>
                            <div class="center-block g-hor-divider__solid--white g-width-40--xs g-margin-b-25--xs"></div>
                            <h4 class="g-font-size-18--xs g-color--white">Millions Claimed</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6 g-full-width--xs g-margin-b-70--xs g-margin-b-0--lg">
                        <div class="g-text-center--xs">
                            <figure class="g-display-block--xs g-font-size-70--xs g-font-family--playfair g-color--primary g-margin-b-10--xs js__counter">25</figure>
                            <div class="center-block g-hor-divider__solid--white g-width-40--xs g-margin-b-25--xs"></div>
                            <h4 class="g-font-size-18--xs g-color--white">Award Winners</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6 g-full-width--xs g-margin-b-70--xs g-margin-b-0--sm">
                        <div class="g-text-center--xs">
                            <figure class="g-display-block--xs g-font-size-70--xs g-font-family--playfair g-color--primary g-margin-b-10--xs js__counter">205</figure>
                            <div class="center-block g-hor-divider__solid--white g-width-40--xs g-margin-b-25--xs"></div>
                            <h4 class="g-font-size-18--xs g-color--white">Cases Settled</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6 g-full-width--xs">
                        <div class="g-text-center--xs">
                            <div class="g-margin-b-10--xs">
                                <figure class="g-display-inline-block--xs g-font-size-70--xs g-font-family--playfair g-color--primary js__counter">92</figure>
                                <span class="g-font-size-40--xs g-font-family--playfair g-color--primary">%</span>
                            </div>
                            <div class="center-block g-hor-divider__solid--white g-width-40--xs g-margin-b-25--xs"></div>
                            <h4 class="g-font-size-18--xs g-color--white">Success Rate</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Counter -->

        <!-- Testimonials -->
        <div class="g-padding-y-80--xs g-padding-y-125--sm">
            <div class="container g-text-center--xs">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-50--xs">Testimonials</p>
                <div class="s-swiper js__swiper-testimonials">
                    <!-- Swiper Wrapper -->
                    <div class="swiper-wrapper g-margin-b-50--xs">
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <img class="g-width-70--xs g-height-70--xs g-hor-border-4__solid--white g-box-shadow__primary-v1 g-radius--circle g-margin-b-30--xs" src="{{ asset('landing') }}/img/400x400/04.jpg" alt="Image">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-font-family--playfair g-color--heading"><i>" I have purchased many great templates over the years but this product and this company have taken it to the next level. Exceptional customizability. "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--heading-light g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-font-weight--400 g-font-family--primary g-color--primary g-margin-b-5--xs">Jake Richardson / Google</h4>
                            </div>
                        </div>
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <img class="g-width-70--xs g-height-70--xs g-hor-border-4__solid--white g-box-shadow__primary-v1 g-radius--circle g-margin-b-30--xs" src="{{ asset('landing') }}/img/400x400/05.jpg" alt="Image">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-font-family--playfair g-color--heading"><i>" I have purchased many great templates over the years but this product and this company have taken it to the next level. Exceptional customizability. "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--heading-light g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-font-weight--400 g-font-family--primary g-color--primary g-margin-b-5--xs">Jake Richardson / Google</h4>
                            </div>
                        </div>
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <img class="g-width-70--xs g-height-70--xs g-hor-border-4__solid--white g-box-shadow__primary-v1 g-radius--circle g-margin-b-30--xs" src="{{ asset('landing') }}/img/400x400/06.jpg" alt="Image">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-font-family--playfair g-color--heading"><i>" I have purchased many great templates over the years but this product and this company have taken it to the next level. Exceptional customizability. "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--heading-light g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-font-weight--400 g-font-family--primary g-color--primary g-margin-b-5--xs">Jake Richardson / Google</h4>
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

        <!-- News -->
        <div class="g-bg-color--sky-light">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-text-center--xs g-margin-b-60--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">Active News</p>
                </div>
                <div class="row">
                    <div class="col-sm-4 g-margin-b-30--xs g-margin-b-0--md">
                        <!-- News -->
                        <article>
                            <img class="img-responsive" src="{{ asset('landing') }}/img/970x970/01.jpg" alt="Image">
                            <div class="g-bg-color--white g-box-shadow__dark-lightest-v2 g-text-center--xs g-padding-x-40--xs g-padding-y-40--xs">
                                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">Family Law</p>
                                <h2 class="g-font-size-26--xs g-font-family--playfair g-letter-spacing--1"><a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes">Asset Distribution</a></h2>
                                <p>The time has come to bring those ideas and plans to life.</p>
                            </div>
                        </article>
                        <!-- End News -->
                    </div>
                    <div class="col-sm-4 g-margin-b-30--xs g-margin-b-0--md">
                        <!-- News -->
                        <article>
                            <img class="img-responsive" src="{{ asset('landing') }}/img/970x970/02.jpg" alt="Image">
                            <div class="g-bg-color--white g-box-shadow__dark-lightest-v2 g-text-center--xs g-padding-x-40--xs g-padding-y-40--xs">
                                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">Criminal Law</p>
                                <h2 class="g-font-size-26--xs g-font-family--playfair g-letter-spacing--1"><a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes">Juvenile Cases</a></h2>
                                <p>The time has come to bring those ideas and plans to life.</p>
                            </div>
                        </article>
                        <!-- End News -->
                    </div>
                    <div class="col-sm-4">
                        <!-- News -->
                        <article>
                            <img class="img-responsive" src="{{ asset('landing') }}/img/970x970/03.jpg" alt="Image">
                            <div class="g-bg-color--white g-box-shadow__dark-lightest-v2 g-text-center--xs g-padding-x-40--xs g-padding-y-40--xs">
                                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">Criminal Law</p>
                                <h2 class="g-font-size-26--xs g-font-family--playfair g-letter-spacing--1"><a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes">Appellate Law</a></h2>
                                <p>The time has come to bring those ideas and plans to life.</p>
                            </div>
                        </article>
                        <!-- End News -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End News -->

        <!-- Feedback Form -->
        <div class="g-position--relative g-bg-color--primary">
            <div class="g-container--md g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-text-center--xs g-margin-b-80--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs">Contact Us</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md g-font-family--playfair g-color--white">Get in Touch</h2>
                </div>
                <div class="row g-row-col--5 g-margin-b-80--xs">
                    <div class="col-xs-4 g-full-width--xs g-margin-b-30--xs g-margin-b-0--sm">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".3s">
                            <div class="g-text-center--xs">
                                <i class="g-display-block--xs g-font-size-40--xs g-color--white-opacity g-margin-b-30--xs ti-email"></i>
                                <h4 class="g-font-size-18--xs g-font-family--playfair g-color--white g-margin-b-5--xs">Email</h4>
                                <p class="g-color--white-opacity">support@keenthemes.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 g-full-width--xs g-margin-b-30--xs g-margin-b-0--sm">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                            <div class="g-text-center--xs">
                                <i class="g-display-block--xs g-font-size-40--xs g-color--white-opacity g-margin-b-30--xs ti-map-alt"></i>
                                <h4 class="g-font-size-18--xs g-font-family--playfair g-color--white g-margin-b-5--xs">Address</h4>
                                <p class="g-color--white-opacity">277 Bedford Avenue, Brooklyn</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4 g-full-width--xs">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".3s">
                            <div class="g-text-center--xs">
                                <i class="g-display-block--xs g-font-size-40--xs g-color--white-opacity g-margin-b-30--xs ti-headphone-alt"></i>
                                <h4 class="g-font-size-18--xs g-font-family--playfair g-color--white g-margin-b-5--xs">Call at</h4>
                                <p class="g-color--white-opacity">+ (1) 001 389 3720</p>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="center-block g-width-500--sm g-width-550--md">
                    <div class="g-margin-b-30--xs">
                        <input type="text" class="form-control s-form-v3__input" placeholder="* Name">
                    </div>
                    <div class="row g-row-col-5 g-margin-b-50--xs">
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
                        <button type="submit" class="text-uppercase s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-70--xs g-margin-b-20--xs">Submit</button>
                    </div>
                </form>
            </div>
            <img class="s-mockup-v2" src="{{ asset('landing') }}/img/mockups/pencil-01.png" alt="Mockup Image">
        </div>
        <!-- End Feedback Form -->
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
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/swiper/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/waypoint.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/counterup.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/jquery.parallax.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/jquery.equal-height.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/vendor/jquery.wow.min.js"></script>

    <!-- General Components and Settings -->
    <script type="text/javascript" src="{{ asset('landing') }}/js/global.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/js/components/header-sticky.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/js/components/scrollbar.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/js/components/swiper.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/js/components/counter.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/js/components/parallax.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/js/components/tab.min.js"></script>
    <script type="text/javascript" src="{{ asset('landing') }}/js/components/equal-height.min.js"></script>
    <script type="text/javascript" src="js/components/wow.min.js"></script>
    <!--========== END JAVASCRIPTS ==========-->
@endsection
