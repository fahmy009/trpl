<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>onFATIM </title>
    <meta content="" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="width=device-width" name="viewport">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <link href="img/favicon.png" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script%7CLato:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap-dark.css')}}">
    <link id="pagestyle" href="{{url('css/theme-dark.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
</head>

<body data-offset="50" data-spy="scroll" data-target=".navbar" class="dark-theme">
    <nav class="navbar navbar-fixed-top shadow" id="js-nav">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-target="#myNavbar" data-toggle="collapse" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#"> <h3 class="home-slider-title-main white-color">on-Fatimah</h3> </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#home">Rumah</a></li>
                    <li><a href="#products">Produk</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#news">Berita</a></li>
                    <li><a href="#history">Sejarah</a></li>
                    <li><a href="#contact">Kontak</a></li>
                <!-- </ul> -->
                <!-- <ul class="nav navbar-nav navbar-right"> -->
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}"><button class="btn btn-default add-item" type="button">LOGIN</button></a></li>
                        <li><a href="{{ route('register') }}"><button class="btn btn-default add-item" type="button">Register</button></a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <section class="home section image-slider" id="home">
        <div class="home-slider text-center">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background: url(img/slider/slide2.jpg);">
                    <img src="img/logo.png" alt="store logo" id="logo">
                    <h2 class="home-slider-title-main white-color">Roti Online</h2>
                    <div class="home-buttons text-center"> <a href="#products" class="btn btn-lg  btn-primary">Produk Kita</a> </div>
                    <a class="arrow bounce text-center" href="#products"> <span class="ti-mouse"></span> <span class="ti-angle-double-down"></span> </a>
                </div>

                <div class="swiper-slide" style="background: url(img/slider/slide1.jpg);">
                    <img src="img/logo.png" alt="store logo" id="logo">
                    <h2 class="home-slider-title-main white-color">Roti Online</h2>
                    <div class="home-buttons text-center"> <a href="#products" class="btn btn-lg  btn-primary">Produk Kita</a> </div>
                    <a class="arrow bounce text-center" href="#about"> <span class="ti-mouse"></span> <span class="ti-angle-double-down"></span> </a>
                </div>

            </div>
            <div class="home-pagination"></div>
            <div class="home-slider-next right-arrow-negative"> <span class="ti-arrow-right"></span> </div>
            <div class="home-slider-prev left-arrow-negative"> <span class="ti-arrow-left"></span> </div>
        </div>
    </section>

    <!-- INTERAVTIVE CART ITEM COUNTER -->
    <span id="items-counter" class="h3 cart-items-counter" style="display: none">0</span>
    <!-- / INTERAVTIVE CART ITEM COUNTER -->

    <!-- CART WIDGET -->
    <div class="cart-widget-container">
        <div class="cart-widget text-center">
            <a class="close" id="cart-widget-close">
                <span class="ti-close"></span>
            </a>

            <img class="cart-logo" src="img/logo-white.png" width="200" alt="store logo">
            <h3 class="section-heading">Your cart</h3>
            <!-- EMPTY CART MESSAGE -->
            <div id="cart-empty" class="cart-empty">
                <h4>is empty <span class="ti-face-sad icon"></span></h4>
            </div>
            <!-- / EMPTY CART MESSAGE -->

            <!-- CONTAINER FOR JS INJECT CART ITEMS, DON'T CHANGE ID AND CLASS -->
            <div class="items-container" id="items"></div>
            <!-- / CONTAINER FOR JS INJECT CART ITEMS, DON'T CHANGE ID AND CLASS -->

            <!-- CART DELIVERY OPTIONS -->
            <div class="cart-delivery" id="cart-delivery">
                <h4 class="section-heading">Delivery option</h4>
                <div class="custom-radio">
                    <input id="radio1" type="radio" name="delivery" value="10.00" checked>
                    <label for="radio1">domestic delivery ($10)</label>
                </div>

                <div class="custom-radio">
                    <input id="radio2" type="radio" name="delivery" value="15.00">
                    <label for="radio2">express domestic delivery ($15) </label>
                </div>

                <div class="custom-radio">
                    <input id="radio3" type="radio" name="delivery" value="20.00">
                    <label for="radio3">worldwide delivery ($20)</label>
                </div>
            </div>
            <!-- / CART DELIVERY OPTIONS -->

            <!-- CART SUMMARY CALCULATION -->
            <div class="cart-summary" id="cart-summary">
            <h4 class="section-heading">Summary</h4>
                <div class="cart-summary-row" id="cart-total">Total products <span class="cart-value">$<span id="cost_value">0.00</span></span></div>
                <div class="cart-summary-row">Shipping <span class="cart-value">$<span id="cost_delivery"></span></span></div>
                <div class="cart-summary-row cart-summary-row-total">Total <span class="cart-value">$<span id="total-total"></span></span></div>
            </div>
            <!-- / CART SUMMARY CALCULATION -->

            <!-- HIDDEN PAYPAL FORM -->
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" class="cart-form" id="cart-form">
                <!-- Identify your business so that you can collect the payments. -->
                <input type="hidden" name="business" value="yourpaypal@email.com">
                <!-- Specify a Buy Now button. -->
                <input type="hidden" name="cmd" value="_xclick">
                <!-- Specify details about the item that buyers will purchase. -->
                <input type="hidden" name="item_name" value="Choco - checkout">
                <input type="hidden" name="amount" id="amount" value="">
                <input type="hidden" name="currency_code" value="USD">
                <!-- Display the payment button. -->
                <button type="submit" name="submit" class="btn btn-default btn-lg">
                pay pal checkout <span class="ti-arrow-right"></span>
                </button>
            </form>
            <!-- / HIDDEN PAYPAL FORM -->
        </div>
        <div class="cart-widget-close-overlay"></div>
    </div>
    <!-- / CART WIDGET -->

    <section class="section-min section product" id="products">
        <div class="container overflow-hidden">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-heading">Products</h3>
                </div>
                <div class="col-md-12">
                    <div class="product-list-slider">
                        <ul class="swiper-wrapper product-list product-list-vertical">
                            <!-- SINGLE ITEM -->
                            <li class="swiper-slide wow fadeInUp text-center" data-wow-delay=".2s">
                                <span class="product-list-left pull-left">
                                    <a href="#" data-target="#product-01" data-toggle="modal">
                                        <img alt="product image" class="product-list-primary-img" src="img/product3.png">
                                        <img alt="product image" class="product-list-secondary-img" src="img/product4.png">
                                    </a>
                                </span>

                                <a href="#" data-target="#product-01" data-toggle="modal">
                                    <span class="product-list-right pull-left">
                                        <span class="product-list-name h3">Chocolate desire</span>
                                        <span class="product-list-price">$400.00</span>
                                    </span>
                                </a>

                                <button type="button" class="btn btn-default add-item" data-image="img/product3.png" data-name="Chocolate desire" data-cost="400.00" data-id="1" >
                                    <span class="ti-shopping-cart"></span>add to cart
                                </button>
                            </li>
                            <!-- / SINGLE ITEM -->

                            <!-- SINGLE ITEM -->
                            <li class="swiper-slide wow fadeInUp text-center" data-wow-delay=".4s">
                                <span class="product-list-left pull-left">
                                    <a href="#" data-target="#product-01" data-toggle="modal">
                                        <img alt="product image" class="product-list-primary-img" src="img/product3.png">
                                        <img alt="product image" class="product-list-secondary-img" src="img/product4.png">
                                    </a>
                                </span>

                                <a href="#" data-target="#product-01" data-toggle="modal">
                                    <span class="product-list-right pull-left">
                                        <span class="product-list-name h3">Chocolate desire</span>
                                        <span class="product-list-price">$300.00</span>
                                    </span>
                                </a>

                                <button type="button" class="btn btn-default add-item" data-image="img/product3.png" data-name="Chocolate desire" data-cost="300.00" data-id="2" >
                                    <span class="ti-shopping-cart"></span>add to cart
                                </button>
                            </li>
                            <!-- / SINGLE ITEM -->

                            <!-- SINGLE ITEM -->
                            <li class="swiper-slide wow fadeInUp text-center" data-wow-delay=".6s">
                                <span class="product-list-left pull-left">
                                    <a href="#" data-target="#product-01" data-toggle="modal">
                                        <img alt="product image" class="product-list-primary-img" src="img/product3.png">
                                        <img alt="product image" class="product-list-secondary-img" src="img/product4.png">
                                    </a>
                                </span>

                                <a href="#" data-target="#product-01" data-toggle="modal">
                                    <span class="product-list-right pull-left">
                                        <span class="product-list-name h3">Chocolate desire no. 2</span>
                                        <span class="product-list-price">$600.00</span>
                                    </span>
                                </a>

                                <button type="button" class="btn btn-default add-item" data-image="img/product3.png" data-name="Chocolate desire no. 2" data-cost="600.00" data-id="3" >
                                    <span class="ti-shopping-cart"></span>add to cart
                                </button>
                            </li>
                            <!-- / SINGLE ITEM -->

                            <!-- SINGLE ITEM -->
                            <li class="swiper-slide wow fadeInUp text-center" data-wow-delay=".8s">
                                <span class="product-list-left pull-left">
                                    <a href="#" data-target="#product-01" data-toggle="modal">
                                        <img alt="product image" class="product-list-primary-img" src="img/product3.png">
                                        <img alt="product image" class="product-list-secondary-img" src="img/product4.png">
                                    </a>
                                </span>

                                <a href="#" data-target="#product-01" data-toggle="modal">
                                    <span class="product-list-right pull-left">
                                        <span class="product-list-name h3">Chocolate desire no. 2</span>
                                        <span class="product-list-price">$500.00</span>
                                    </span>
                                </a>

                                <button type="button" class="btn btn-default add-item" data-image="img/product3.png" data-name="Chocolate desire no. 2" data-cost="500.00" data-id="4" >
                                    <span class="ti-shopping-cart"></span>add to cart
                                </button>
                            </li>
                            <!-- / SINGLE ITEM -->

                            <!-- SINGLE ITEM -->
                            <li class="swiper-slide text-center">
                                <span class="product-list-left pull-left">
                                    <a href="#" data-target="#product-01" data-toggle="modal">
                                        <img alt="product image" class="product-list-primary-img" src="img/product3.png">
                                        <img alt="product image" class="product-list-secondary-img" src="img/product4.png">
                                    </a>
                                </span>

                                <a href="#" data-target="#product-01" data-toggle="modal">
                                    <span class="product-list-right pull-left">
                                        <span class="product-list-name h3">Chocolate desire no. 3</span>
                                        <span class="product-list-price">$600.00</span>
                                    </span>
                                </a>

                                <button type="button" class="btn btn-default add-item" data-image="img/product3.png" data-name="Chocolate desire no. 3" data-cost="600.00" data-id="5" >
                                    <span class="ti-shopping-cart"></span>add to cart
                                </button>
                            </li>
                            <!-- / SINGLE ITEM -->

                            <!-- SINGLE ITEM -->
                            <li class="swiper-slide text-center">
                                <span class="product-list-left pull-left">
                                    <a href="#" data-target="#product-01" data-toggle="modal">
                                        <img alt="product image" class="product-list-primary-img" src="img/product3.png">
                                        <img alt="product image" class="product-list-secondary-img" src="img/product4.png">
                                    </a>
                                </span>

                                <a href="#" data-target="#product-01" data-toggle="modal">
                                    <span class="product-list-right pull-left">
                                        <span class="product-list-name h3">Chocolate desire no. 3</span>
                                        <span class="product-list-price">$500.00</span>
                                    </span>
                                </a>

                                <button type="button" class="btn btn-default add-item" data-image="img/product3.png" data-name="Chocolate desire no. 3" data-cost="500.00" data-id="6" >
                                    <span class="ti-shopping-cart"></span>add to cart
                                </button>
                            </li>
                            <!-- / SINGLE ITEM -->
                        </ul>

                        <!-- CAROUSEL CONTROLS -->
                        <div class="product-list-pagination text-center"></div>
                        <div class="product-list-slider-next right-arrow-negative">
                            <span class="ti-arrow-right"></span>
                        </div>

                        <div class="product-list-slider-prev left-arrow-negative">
                            <span class="ti-arrow-left"></span>
                        </div>
                        <!-- CAROUSEL CONTROLS -->
                    </div>
                </div>
            </div>
            <!-- PRODUCT MODAL -->
            <div class="modal fade product-modal" id="product-01" role="dialog" tabindex="-1">
                <div class="modal-dialog">

                    <!-- MODAL CONTENT -->
                    <div class="modal-content shadow">
                        <a class="close" data-dismiss="modal"> <span class="ti-close"></span></a>
                        <div class="modal-body">
                            <!-- Wrapper for slides -->
                            <div class="carousel slide product-slide" id="product-carousel">
                                <!-- CAROSUEL SLIDER -->
                                <div class="carousel-inner cont-slider">
                                    <div class="item active"> <img alt="" src="img/product3.png" title=""> </div>
                                    <div class="item"> <img alt="" src="img/product4.png" title=""> </div>
                                    <div class="item"> <img alt="" src="img/product3.png" title=""> </div>
                                    <div class="item"> <img alt="" src="img/product4.png" title=""> </div>
                                </div>
                                <!-- / CAROSUEL SLIDER -->

                                <!-- CAROUSEL INDICATORS -->
                                <ol class="carousel-indicators">
                                    <li class="active" data-slide-to="0" data-target="#product-carousel">
                                        <img alt="" src="img/product3.png">
                                    </li>

                                    <li class="" data-slide-to="1" data-target="#product-carousel">
                                        <img alt="" src="img/product4.png">
                                    </li>

                                    <li class="" data-slide-to="2" data-target="#product-carousel">
                                        <img alt="" src="img/product3.png">
                                    </li>

                                    <li class="" data-slide-to="3" data-target="#product-carousel">
                                        <img alt="" src="img/product4.png">
                                    </li>
                                </ol>
                                <!-- / CAROUSEL INDICATORS -->
                            </div>

                            <!-- PRODUCT DESCRIPTION -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-md-push-2">
                                        <div class="row">
                                            <div class="col-md-12 product-modal-header">
                                                <h3 class="pull-left product-modal-title">Chocolate desire</h3>

                                                <span class="product-action-section">
                                                    <span class="price">$299.00</span>
                                                    <button type="button" class="btn btn-default add-item" data-image="img/product3.png" data-name="Chocolate desire" data-cost="299.00" data-id="8">
                                                    <span class="ti-shopping-cart"></span>add to cart </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 col-md-push-2 product-description">
                                        <h4 class="section-heading">Ut enim ad minim veniam</h4>
                                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>

                                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="img/product3.png" class="img-responsive" alt="product image">
                                            </div>

                                            <div class="col-md-6">
                                                <h4 class="section-heading">Ut enim ad minim veniam</h4>
                                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            </div>
                                        </div>

                                        <div class="product-tabs">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a data-toggle="tab" href="#tab1">Details</a></li>
                                                <li><a data-toggle="tab" href="#tab2">Info tab</a></li>
                                                <li><a data-toggle="tab" href="#tab3">Other info </a></li>
                                            </ul>

                                            <div class="tab-content">
                                                <div id="tab1" class="tab-pane fade in active">
                                                    <h4 class="section-heading">details</h4>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                </div>

                                                <div id="tab2" class="tab-pane fade">
                                                    <h4 class="section-heading">Info tab</h4>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                                                </div>

                                                <div id="tab3" class="tab-pane fade">
                                                    <h4 class="section-heading">other info</h4>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- / PRODUCT DESCRIPTION -->
                        </div>
                    </div>
                    <!-- / MODAL CONTENT -->
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid about white-color no-padding" id="about">
    <div class="about-background about-background-1 row no-margin">
        <div class="col-md-6 about-black-box">
            <h3 class="section-heading">Cocoa!</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="#" class="btn btn-default">click action</a>
        </div>
        <div class="col-md-6"></div>
    </div>

    <div class="about-background about-background-2 row no-margin">
        <div class="col-md-4 about-white-box col-md-offset-4">
            <h2 class="section-claim wow fadeInDown" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">
            the best quality
                <span>cocoa bean</span>
            </h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <a href="#" class="btn btn-default">click action</a>
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="about-background about-background-3 row no-margin">
        <div class="col-md-6 about-black-box col-md-offset-6">
            <h3 class="section-heading">Special!</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <a href="#" class="btn btn-default">click action</a>
        </div>
    </div>
  </section>

    <section class="countdown" id="special">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-heading">special!</h3>
                </div>

                <div class="col-md-5">
                    <ul class="product-list product-list-vertical">
                        <li class="wow fadeInUp" data-wow-delay=".2s">
                            <span class="product-list-left pull-left">
                                    <a href="#" data-target="#product-01" data-toggle="modal">
                                        <img alt="product image" class="product-list-primary-img" src="img/product3.png">
                                        <img alt="product image" class="product-list-secondary-img" src="img/product4.png">
                                    </a>
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="col-md-7 text-center">
                    <div class="countdown-container">
                        <h3 class="wow fadeInDown">Chocolate desire</h3>

                        <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                        <!-- DATA COUNDOWN INJECTED BY JS -->
                        <ul id="countdown" class="countdown-counter wow fadeInUp"></ul>
                        <!-- / DATA COUNDOWN INJECTED BY JS -->

                        <span class="countdown-price h3 wow fadeInUp">$420.00</span>
                        <button type="button" class="btn btn-default add-item wow swing" data-image="img/product3.png" data-name="Chocolate desire [promo]" data-cost="420.00" data-id="9">
                            <span class="ti-shopping-cart"></span>add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-heading">Testimonials</h3>
                </div>

                <div class="col-md-12 testimonials-slider text-center">
                    <!-- CAROUSEL WRAPPER -->
                    <div class="swiper-wrapper">

                        <!-- SINGLE TESTIMONIALS ITEM -->
                        <div class="swiper-slide">
                            <div class="testimonials-container shadow"> <img alt="user avatar" class="wow fadeInUp" src="img/user.png">
                                <h3 class="wow fadeInUp" data-wow-delay=".4s"> Martin Johe, Co-Founder / CEO <span>Fastcompany ltd.</span> </h3>
                                <p class="wow fadeInUp" data-wow-delay=".6s"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>
                        </div>
                        <!-- / SINGLE TESTIMONIALS ITEM-->

                        <!-- SINGLE TESTIMONIALS ITEM -->
                        <div class="swiper-slide">
                            <div class="testimonials-container shadow"> <img alt="user avatar" class="wow fadeInUp" src="img/user.png">
                                <h3 class="wow fadeInUp" data-wow-delay=".4s"> Martin Johe, Co-Founder / CEO <span>Fastcompany ltd.</span> </h3>
                                <p class="wow fadeInUp" data-wow-delay=".6s"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>
                        </div>
                        <!-- / SINGLE TESTIMONIALS ITEM-->

                        <!-- SINGLE TESTIMONIALS ITEM -->
                        <div class="swiper-slide">
                            <div class="testimonials-container shadow"> <img alt="user avatar" class="wow fadeInUp" src="img/user.png">
                                <h3 class="wow fadeInUp" data-wow-delay=".4s"> Martin Johe, Co-Founder / CEO <span>Fastcompany ltd.</span> </h3>
                                <p class="wow fadeInUp" data-wow-delay=".6s"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>
                        </div>
                        <!-- / SINGLE TESTIMONIALS ITEM-->
                    </div>
                    <!-- / CAROUSEL WRAPPER -->

                    <!-- CAROUSEL CONTROLS -->
                    <div class="testimonials-pagination"></div>
                    <div class="testimonials-slider-next right-arrow-negative">
                        <span class="ti-arrow-right"></span>
                    </div>
                    <div class="testimonials-slider-prev left-arrow-negative">
                        <span class="ti-arrow-left"></span>
                    </div>
                    <!-- / CAROUSEL CONTROLS -->
                </div>
            </div>
        </div>
    </section>

    <section class="text-center shadow section section-min">
        <div class="about-counter" id="about-counter">
            <div class="container">
                <div class="row">
                    <!-- SINGLE COUNTER ITEM -->
                    <div class="col-md-3 wow fadeInLeft about-counter-single" data-wow-delay="0.2s" data-wow-duration="1s" data-wow-offset="0">
                        <div class="counter"> <span class="ti-crown icon"></span>
                            <h2 class="timer">250</h2>
                            <p> Projects Finished </p>
                        </div>
                    </div>
                    <!-- / SINGLE COUNTER ITEM -->

                    <!-- SINGLE COUNTER ITEM -->
                    <div class="col-md-3 wow fadeInLeft about-counter-single" data-wow-delay="0.3s" data-wow-duration="1s" data-wow-offset="0">
                        <div class="counter"> <span class="ti-shortcode icon"></span>
                            <h2 class="timer">28256</h2>
                            <p> Line Of Coding </p>
                        </div>
                    </div>
                    <!-- / SINGLE COUNTER ITEM -->

                    <!-- SINGLE COUNTER ITEM -->
                    <div class="col-md-3 wow fadeInLeft about-counter-single" data-wow-delay="0.4s" data-wow-duration="1s" data-wow-offset="0">
                        <div class="counter"> <span class="ti-cup icon"></span>
                            <h2 class="timer">42</h2>
                            <p> Award Won </p>
                        </div>
                    </div>
                    <!-- / SINGLE COUNTER ITEM -->

                    <!-- SINGLE COUNTER ITEM -->
                    <div class="col-md-3 wow fadeInLeft" data-wow-delay="0.5s" data-wow-duration="1s" data-wow-offset="0">
                        <div class="counter"> <span class="ti-comments-smiley icon"></span>
                            <h2 class="timer">240</h2>
                            <p> Satisfied Clients </p>
                        </div>
                    </div>
                </div>
                <!-- / SINGLE COUNTER ITEM -->
            </div>
        </div>
    </section>

    <section class="post-list" id="news">
        <div class="container overflow-hidden">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-heading">news</h3>
                </div>

                <div class="post-slider col-md-12">
                    <!-- NEWS CAROSUEL -->
                    <div class="swiper-wrapper">
                        <!-- SINGLE NEWS ITEM -->
                        <div class="swiper-slide">
                            <div class="post-entry wow fadeInUp">
                                <a href="#" data-toggle="modal" data-target="#post-01">
                                    <span class="post-entry-cover" style="background-image:url(img/blog-cover.jpg);">
                                    </span>
                                </a>

                                <a class="h3" href="#" data-toggle="modal" data-target="#post-01">
                                    Estibulum ante ipsum primis lobortis
                                </a>
                                <a href="#" data-toggle="modal" data-target="#post-01" class="post-entry-more">
                                    read more
                                    <span class="ti-arrow-right icon"></span>
                                </a>
                            </div>
                        </div>
                        <!-- / SINGLE NEWS ITEM -->

                        <!-- SINGLE NEWS ITEM -->
                        <div class="swiper-slide">
                            <div class="post-entry wow fadeInUp">
                                <a href="#" data-toggle="modal" data-target="#post-01">
                                    <span class="post-entry-cover" style="background-image:url(img/blog-cover.jpg);">
                                    </span>
                                </a>

                                <a class="h3" href="#" data-toggle="modal" data-target="#post-01">
                                    Estibulum ante ipsum primis lobortis
                                </a>
                                <a href="#" data-toggle="modal" data-target="#post-01" class="post-entry-more">
                                    read more
                                    <span class="ti-arrow-right icon"></span>
                                </a>
                            </div>
                        </div>
                        <!-- / SINGLE NEWS ITEM -->

                        <!-- SINGLE NEWS ITEM -->
                        <div class="swiper-slide">
                            <div class="post-entry wow fadeInUp">
                                <a href="#" data-toggle="modal" data-target="#post-01">
                                    <span class="post-entry-cover" style="background-image:url(img/blog-cover.jpg);">
                                    </span>
                                </a>

                                <a class="h3" href="#" data-toggle="modal" data-target="#post-01">
                                    Estibulum ante ipsum primis lobortis
                                </a>
                                <a href="#" data-toggle="modal" data-target="#post-01" class="post-entry-more">
                                    read more
                                    <span class="ti-arrow-right icon"></span>
                                </a>
                            </div>
                        </div>
                        <!-- / SINGLE NEWS ITEM -->

                        <!-- SINGLE NEWS ITEM -->
                        <div class="swiper-slide">
                            <div class="post-entry wow fadeInUp">
                                <a href="#" data-toggle="modal" data-target="#post-01">
                                    <span class="post-entry-cover" style="background-image:url(img/blog-cover.jpg);">
                                    </span>
                                </a>

                                <a class="h3" href="#" data-toggle="modal" data-target="#post-01">
                                    Estibulum ante ipsum primis lobortis
                                </a>
                                <a href="#" data-toggle="modal" data-target="#post-01" class="post-entry-more">
                                    read more
                                    <span class="ti-arrow-right icon"></span>
                                </a>
                            </div>
                        </div>
                        <!-- / SINGLE NEWS ITEM -->

                        <!-- SINGLE NEWS ITEM -->
                        <div class="swiper-slide">
                            <div class="post-entry wow fadeInUp">
                                <a href="#" data-toggle="modal" data-target="#post-01">
                                    <span class="post-entry-cover" style="background-image:url(img/blog-cover.jpg);">
                                    </span>
                                </a>

                                <a class="h3" href="#" data-toggle="modal" data-target="#post-01">
                                    Estibulum ante ipsum primis lobortis
                                </a>
                                <a href="#" data-toggle="modal" data-target="#post-01" class="post-entry-more">
                                    read more
                                    <span class="ti-arrow-right icon"></span>
                                </a>
                            </div>
                        </div>
                        <!-- / SINGLE NEWS ITEM -->

                        <!-- SINGLE NEWS ITEM -->
                        <div class="swiper-slide">
                            <div class="post-entry wow fadeInUp">
                                <a href="#" data-toggle="modal" data-target="#post-01">
                                    <span class="post-entry-cover" style="background-image:url(img/blog-cover.jpg);">
                                    </span>
                                </a>

                                <a class="h3" href="#" data-toggle="modal" data-target="#post-01">
                                    Estibulum ante ipsum primis lobortis
                                </a>
                                <a href="#" data-toggle="modal" data-target="#post-01" class="post-entry-more">
                                    read more
                                    <span class="ti-arrow-right icon"></span>
                                </a>
                            </div>
                        </div>
                        <!-- / SINGLE NEWS ITEM -->
                    </div>
                    <!-- / NEWS CAROSUEL -->

                    <!-- CAROUSEL CONTROLS -->
                    <div class="post-pagination text-center"></div>
                    <div class="post-slider-next right-arrow-negative">
                        <span class="ti-arrow-right"></span>
                    </div>

                    <div class="post-slider-prev left-arrow-negative">
                        <span class="ti-arrow-left"></span>
                    </div>
                    <!-- / CAROUSEL CONTROLS -->
                </div>
            </div>

            <!-- NEWS MODAL -->
            <div class="modal fade" id="post-01" role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <!-- NEWS MODAL CONTENT -->
                    <div class="modal-content shadow">
                        <a class="close" data-dismiss="modal"> <span class="ti-close"></span></a>

                        <div class="modal-body">
                            <div class="post-entry post-entry-modal">
                                <h3 class="section-heading">Duis aute irure dolor in reprehenderit in voluptate.</h3>

                                <span class="post-entry-meta">
                                    <img alt="user avatar" class="post-entry-author pull-left" src="img/user.png">
                                    <span class="post-entry-author-name pull-left">Alex Example</span>
                                    <span class="post-entry-time pull-right">6 min read
                                        <span class="post-entry-category">interior, furnitures</span>
                                    </span>
                                </span>

                                <span class="post-entry-cover" style="background-image:url(img/blog-cover.jpg);"></span>

                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>

                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>

                                <p> quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>

                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                            </div>
                        </div>
                    </div>
                    <!-- / NEWS MODAL CONTENT -->
                </div>
            </div>
            <!-- / NEWS MODAL -->
        </div>
    </section>

    <section class="timeline" id="history">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-heading">Our history</h3>
                    <div id="timeline" class="timeline-container">
                         <!-- TIMELINE ITEM -->
                        <div class="timeline-block timeline-block-image-1">
                            <div class="timeline-point">
                            </div>

                            <div class="timeline-content wow fadeInLeft">
                                <span class="timeline-date">
                                <span class="timeline-month">May</span>
                                <span class="timeline-year">2016</span>
                                </span>
                                <h2>Envelope title</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                        </div>
                        <!-- / TIMELINE ITEM -->

                        <!-- TIMELINE ITEM -->
                        <div class="timeline-block timeline-block-image-2">
                            <div class="timeline-point">
                            </div>

                            <div class="timeline-content wow fadeInRight">
                                <span class="timeline-date">
                                <span class="timeline-month">March</span>
                                <span class="timeline-year">2016</span>
                                </span>
                                <h2>Lecce, Magnificat Lupiae</h2>
                                <p>Lorem ipsm dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                        </div>
                        <!-- / TIMELINE ITEM -->

                        <!-- TIMELINE ITEM -->
                        <div class="timeline-block timeline-block-image-3">
                            <div class="timeline-point">
                            </div>

                            <div class="timeline-content wow fadeInLeft">
                                <span class="timeline-date">
                                <span class="timeline-month">July</span>
                                <span class="timeline-year">2015</span>
                                </span>
                                <h2>Lecce, Magnificat Lupiae</h2>
                                <p>Lorem ipsm dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                        </div>
                        <!-- / TIMELINE ITEM -->

                        <!-- TIMELINE ITEM -->
                        <div class="timeline-block timeline-block-image-4">
                            <div class="timeline-point">
                            </div>

                            <div class="timeline-content wow fadeInRight">
                                <span class="timeline-date">
                                <span class="timeline-month">May</span>
                                <span class="timeline-year">2009</span>
                                </span>
                                <h2>Lecce, Magnificat Lupiae</h2>
                                <p>Lorem ipsm dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                        </div>
                        <!-- / TIMELINE ITEM -->

                        <!-- TIMELINE ITEM -->
                        <div class="timeline-block timeline-block-image-5">
                            <div class="timeline-point">
                            </div>

                            <div class="timeline-content wow fadeInLeft">
                                <span class="timeline-date">
                                <span class="timeline-month">August</span>
                                <span class="timeline-year">2008</span>
                                </span>
                                <h2>Envelope title</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                        </div>
                        <!-- / TIMELINE ITEM -->

                        <!-- TIMELINE ITEM -->
                        <div class="timeline-block timeline-block-image-6">
                            <div class="timeline-point">
                            </div>

                            <div class="timeline-content wow fadeInRight">
                                <span class="timeline-date">
                                <span class="timeline-month">October</span>
                                <span class="timeline-year">2006</span>
                                </span>
                                <h2>Lecce, Magnificat Lupiae</h2>
                                <p>Lorem ipsm dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                        </div>
                        <!-- / TIMELINE ITEM -->

                        <!-- TIMELINE ITEM -->
                        <div class="timeline-block timeline-block-image-7">
                            <div class="timeline-point">
                            </div>

                            <div class="timeline-content wow fadeInLeft">
                                <span class="timeline-date">
                                <span class="timeline-month">December</span>
                                <span class="timeline-year">2004</span>
                                </span>
                                <h2>Lecce, Magnificat Lupiae</h2>
                                <p>Lorem ipsm dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                        </div>
                        <!-- / TIMELINE ITEM -->

                        <!-- TIMELINE ITEM -->
                        <div class="timeline-block timeline-block-image-8">
                            <div class="timeline-point">
                            </div>

                            <div class="timeline-content wow fadeInRight">
                                <span class="timeline-date">
                                <span class="timeline-month">May</span>
                                <span class="timeline-year">2000</span>
                                </span>
                                <h2>Lecce, Magnificat Lupiae</h2>
                                <p>Lorem ipsm dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- / TIMELINE ITEM -->
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact contact-with-map">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-heading">contact</h3>
                </div>
                <div class="col-md-3">
                    <div class="contact-data">
                        <ul class="white-color">
                            <li><span class="ti-mobile icon"></span>+ 49 123 456 789</li>
                            <li><span class="ti-email icon"></span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ff929e9693bf9a879e928f939ad19c9092">[email&#160;protected]</a></li>
                            <li><span class="ti-skype icon"></span>@choco</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 col-md-push-1">
                    <!-- CONTACT FORM -->
                    <div class="contact-form">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="contact-email" name="contact-email" placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                            </div>

                            <button type="button" type="button" id="submit" name="submit" class="btn btn-primary btn-lg text-center float-right">Submit your message</button>
                        </form>
                    </div>
                    <!-- / CONTACT FORM -->
                </div>
            </div>
        </div>
        <!-- GOOGLE MAP CONTAINER -->
        <div class="google-maps">
            <div id="map-canvas"></div>
        </div>
        <!-- / GOOGLE MAP CONTAINER -->
    </section>

    <div class="section section-min">
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 col-md-push-4 text-center"> <img class="footer-logo" src="img/logo-white.png" alt="footer-logo">
                                <div class="social">
                                    <ul>
                                        <li><a href="http://facebook.com/" target="_blank"><span class="ti-facebook"></span></a></li>
                                        <li><a href="https://twitter.com/" target="_blank"><span class="ti-twitter-alt"></span></a></li>
                                        <li><a href="http://linkedin.com/" target="_blank"><span class="ti-linkedin"></span></a></li>
                                        <li><a href="https://vimeo.com/" target="_blank"><span class="ti-vimeo-alt"></span></a></li>
                                        <li><a href="http://youtube.com/" target="_blank"><span class="ti-youtube"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 col-sm-12">
                                <div class="footer-newsletter">
                                    <div class="center text-center">
                                        <h4>stay tuned</h4>
                                        <form action="#" method="post">
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="e-mail">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default" type="button"><span class="ti-arrow-right"></span></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </div>
     <script>!function(e,t,r,n,c,a,l){function i(t,r){return r=e.createElement('div'),r.innerHTML='<a href="'+t.replace(/"/g,'&quot;')+'"></a>',r.childNodes[0].getAttribute('href')}function o(e,t,r,n){for(r='',n='0x'+e.substr(t,2)|0,t+=2;t<e.length;t+=2)r+=String.fromCharCode('0x'+e.substr(t,2)^n);return i(r)}try{for(c=e.getElementsByTagName('a'),l='/cdn-cgi/l/email-protection#',n=0;n<c.length;n++)try{(t=(a=c[n]).href.indexOf(l))>-1&&(a.href='mailto:'+o(a.href,t+l.length))}catch(e){}for(c=e.querySelectorAll('.__cf_email__'),n=0;n<c.length;n++)try{(a=c[n]).parentNode.replaceChild(e.createTextNode(o(a.getAttribute('data-cfemail'),0)),a)}catch(e){}}catch(e){}}(document);</script><script src="js/bundle.js"></script>
<!--    <script src="js/vendor/wow.js"></script>
    <script src="js/vendor/jquery-1.11.2.min.js"></script>
    <script src="js/vendor/swiper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/jquery.countTo.js"></script>
    <script src="js/vendor/jquery.inview.js"></script>
    <script src="js/vendor/jquery.countdown.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_6m6Glf1-P7jvVdHZ00e3Ue_EoUNe39g"></script>
    <script src="js/tt-cart.js"></script>
    <script src="js/main.js"></script> -->
</body>
</html>
