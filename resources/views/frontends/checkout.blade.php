<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demo.devitems.com/uniqlo//checkout by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Nov 2018 04:40:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout || AS Leather</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/img/logo.png')}}">
    <link rel="apple-touch-icon" href="{{ asset('/assets/frontend/uniqlo/apple-touch-icon.png')}}">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/uniqlo/css/bootstrap.min.css')}}">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/uniqlo/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/frontend/uniqlo/css/owl.theme.default.min.css')}}">
    <!-- This core.css')}} file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/uniqlo/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/uniqlo/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/uniqlo/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/uniqlo/css/responsive.css')}}">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/uniqlo/css/custom.css')}}">


    <!-- Modernizr JS -->
    <script src="{{ asset('/assets/frontend/uniqlo/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ asset('/assets/img/logo.png')}}" height="60" width="80" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- Start MAinmenu Ares -->
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li class="drop"><a href="/">Beranda</a>

                                    </li>
                                    <li><a href="/about">Tentang</a></li>
                                    <li class="drop"><a href="/blog">Artikel</a>
                                        <ul class="dropdown">
                                        </ul>
                                    </li>
                                    <li class="drop"><a href="/shop">Produk</a>

                                    </li>

                                    <li><a href="/contact">Kontak</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="/">Beranda</a>

                                        </li>
                                        <li><a href="/about">Tentang</a></li>
                                        <li><a href="/blog">Artikel</a>
                                            <ul>
                                                    </ul>
                                        </li>

                                        <li><a href="/contact">Kontak</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- End MAinmenu Ares -->
                        <div class="col-md-2 col-sm-4 col-xs-3">
                            <ul class="menu-extra">
                                <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                                <li class="cart__menu"><span class="ti-shopping-cart"></span></li>
                                @php
              if(\Auth::check()){
                $carts = \App\carts::where('id_users', \Auth::user()->id);
              }
            @endphp


                <li>
                @if(Auth::check())
                <a href="{{url('cart', Auth::user()->id)}}"></i></a>
                @endif
                </li>

            @if(Auth::check() && $carts->count() > 0)
            <span class="cart_count" data-notify="">
              {{$carts->count()}}
            </span>
            @endif
                                @guest
												<li class="nav-item">
													<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
												</li>
												<li class="nav-item">
													@if (Route::has('register'))
													<a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a>
													@endif
												</li>
												@else
												<li class="nav-item dropdown">
													<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
														{{ Auth::user()->name }} <span class="caret"></span>
													</a>

													<div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
														<a class="dropdown-item" href="{{ route('logout') }}"
														onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
														{{ __('Logout') }}
													</a>

													<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
														@csrf
													</form>
												</div>
											</li>
											@endguest
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Offset MEnu -->
            <div class="offsetmenu">
                <div class="offsetmenu__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="off__contact">
                        <div class="logo">
                            <a href="/">
                                <img src="{{ asset('/assets/frontend/uniqlo/images/logo/uniqlo.png')}}" alt="logo">
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetu adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
                    </div>
                    <ul class="sidebar__thumd">
                        <li><a href="#"><img src="{{ asset('/assets/frontend/uniqlo/images/sidebar-img/1.jpg')}}" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="{{ asset('/assets/frontend/uniqlo/images/sidebar-img/2.jpg')}}" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="{{ asset('/assets/frontend/uniqlo/images/sidebar-img/3.jpg')}}" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="{{ asset('/assets/frontend/uniqlo/images/sidebar-img/4.jpg')}}" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="{{ asset('/assets/frontend/uniqlo/images/sidebar-img/5.jpg')}}" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="{{ asset('/assets/frontend/uniqlo/images/sidebar-img/6.jpg')}}" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="{{ asset('/assets/frontend/uniqlo/images/sidebar-img/7.jpg')}}" alt="sidebar images"></a></li>
                        <li><a href="#"><img src="{{ asset('/assets/frontend/uniqlo/images/sidebar-img/8.jpg')}}" alt="sidebar images"></a></li>
                    </ul>
                    <div class="offset__widget">
                        <div class="offset__single">
                            <h4 class="offset__title">Language</h4>
                            <ul>
                                <li><a href="#"> Engish </a></li>
                                <li><a href="#"> French </a></li>
                                <li><a href="#"> German </a></li>
                            </ul>
                        </div>
                        <div class="offset__single">
                            <h4 class="offset__title">Currencies</h4>
                            <ul>
                                <li><a href="#"> USD : Dollar </a></li>
                                <li><a href="#"> EUR : Euro </a></li>
                                <li><a href="#"> POU : Pound </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="offset__sosial__share">
                        <h4 class="offset__title">Follow Us On Social</h4>
                        <ul class="off__soaial__link">
                            <li><a class="bg--twitter" href="https://twitter.com/devitemsllc" target="_blank" title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>

                            <li><a class="bg--instagram" href="https://www.instagram.com/devitems/" target="_blank" title="Instagram"><i class="zmdi zmdi-instagram"></i></a></li>

                            <li><a class="bg--facebook" href="https://www.facebook.com/devitems/?ref=bookmarks" target="_blank" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>

                            <li><a class="bg--googleplus" href="https://plus.google.com/" target="_blank" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a></li>

                            <li><a class="bg--google" href="#" target="_blank" title="Google"><i class="zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Offset MEnu -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                    <div class="shopping__cart__inner">
                        <div class="offsetmenu__close__btn">
                            <a href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                        @if(Auth::check())
                        @php
                        $total_all = 0;
                        @endphp
                        <div class="shp__cart__wrap">
                            <div class="shp__single__product">
                                    @foreach(\App\carts::with('produks')->get() as $data)
                                <div class="shp__pro__thumb">
                                    <a href="#">
                                        <img src="{{asset('assets/img/barang/' . $data->produks->cover)}}" alt="product images">
                                    </a>
                                </div>
                                <div class="shp__pro__details">
                                    <h2><a href="/detailproduk">{{$data->produks->title}}</a></h2>
                                    <span class="quantity">{{$data->produks->stock}}</span>
                                    <span class="shp__price">Rp. {{ number_format($data->produks->price,2,',','.')}}</span>
                                </div>
                                <div class="remove__btn">
                                    <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                                </div>
                                <span class="header-cart-item-info">
                                        {{$data->jumlah_brg}} x Rp. {{ number_format($data->produks->price,2,',','.')}}
                                        @php
                                            $t_s = $data->jumlah_brg * $data->produks->price;
                                            $total_all = $total_all + $t_s;
                                        @endphp
                                    </span>

                            </div>

                        <ul class="shoping__total">
                            <li class="subtotal">Subtotal:</li>
                            <li class="total__price">Rp. {{number_format($total_all,2,',','.')}}</li>
                        </ul>
                        <ul class="shopping__btn">
                            <li><a href="{{url('cart', Auth::user()->id)}}">View Cart</a></li>
                            <li class="shp__checkout"><a href="{{url('cart', Auth::user()->id)}}">Checkout</a></li>
                        </ul>
                        @endforeach
                                    @endif
                    </div>
                </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{ asset('/assets/frontend/uniqlo/images/bg/2.jpg')}}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Checkout</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="/">Beranda</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Checkout Area -->
        <section class="our-checkout-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <div class="ckeckout-left-sidebar">
                            <!-- Start Checkbox Area -->
                            <div class="checkout-form">
                                <h2 class="section-title-3">Billing details</h2>
                                <div class="checkout-form-inner">
                                    <div class="single-checkout-box">
                                        <input type="text" placeholder="First Name*">
                                        <input type="text" placeholder="Last Name*">
                                    </div>
                                    <div class="single-checkout-box">
                                        <input type="email" placeholder="Emil*">
                                        <input type="text" placeholder="Phone*">
                                    </div>
                                    <div class="single-checkout-box">
                                        <textarea name="message" placeholder="Message*"></textarea>
                                    </div>
                                    <div class="single-checkout-box select-option mt--40">
                                        <select>
                                            <option>Country*</option>
                                            <option>Bangladesh</option>
                                            <option>Bangladesh</option>
                                            <option>Bangladesh</option>
                                            <option>Bangladesh</option>
                                        </select>
                                        <input type="text" placeholder="Company Name*">
                                    </div>
                                    <div class="single-checkout-box">
                                        <input type="email" placeholder="State*">
                                        <input type="text" placeholder="Zip Code*">
                                    </div>
                                    <div class="single-checkout-box checkbox">
                                        <input id="remind-me" type="checkbox">
                                        <label for="remind-me"><span></span>Create a Account ?</label>
                                    </div>
                                </div>
                            </div>
                            <!-- End Checkbox Area -->
                            <!-- Start Payment Box -->
                            <div class="payment-form">
                                <h2 class="section-title-3">payment details</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur kgjhyt</p>
                                <div class="payment-form-inner">
                                    <div class="single-checkout-box">
                                        <input type="text" placeholder="Name on Card*">
                                        <input type="text" placeholder="Card Number*">
                                    </div>
                                    <div class="single-checkout-box select-option">
                                        <select>
                                            <option>Date*</option>
                                            <option>Date</option>
                                            <option>Date</option>
                                            <option>Date</option>
                                            <option>Date</option>
                                        </select>
                                        <input type="text" placeholder="Security Code*">
                                    </div>
                                </div>
                            </div>
                            <!-- End Payment Box -->
                            <!-- Start Payment Way -->
                            <div class="our-payment-sestem">
                                <h2 class="section-title-3">We  Accept :</h2>
                                <ul class="payment-menu">
                                    <li><a href="#"><img src="{{ asset('/assets/frontend/uniqlo/images/payment/1.jpg')}}" alt="payment-img"></a></li>
                                    <li><a href="#"><img src="{{ asset('/assets/frontend/uniqlo/images/payment/2.jpg')}}" alt="payment-img"></a></li>
                                    <li><a href="#"><img src="{{ asset('/assets/frontend/uniqlo/images/payment/3.jpg')}}" alt="payment-img"></a></li>
                                    <li><a href="#"><img src="{{ asset('/assets/frontend/uniqlo/images/payment/4.jpg')}}" alt="payment-img"></a></li>
                                    <li><a href="#"><img src="{{ asset('/assets/frontend/uniqlo/images/payment/5.jpg')}}" alt="payment-img"></a></li>
                                </ul>
                                <div class="checkout-btn">
                                    <a class="ts-btn btn-light btn-large hover-theme" href="#">CONFIRM & BUY NOW</a>
                                </div>
                            </div>
                            <!-- End Payment Way -->
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="checkout-right-sidebar">
                            <div class="our-important-note">
                                <h2 class="section-title-3">Note :</h2>
                                <p class="note-desc">Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut laborekf et dolore magna aliqua.</p>
                                <ul class="important-note">
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet, consectetur nipabali</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet, consectetur nipabali</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet, consectetur nipabali</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet</a></li>
                                </ul>
                            </div>
                            <div class="puick-contact-area mt--60">
                                <h2 class="section-title-3">Quick Contract</h2>
                                <a href="phone:+8801722889963">+88 01900 939 500</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Checkout Area -->
        <!-- Start Footer Area -->
        <footer class="htc__foooter__area" style="background: rgba(0, 0, 0, 0) url({{ asset('/assets/frontend/uniqlo/images/bg/1.jpg')}}) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row">
                    <div class="footer__container clearfix">
                         <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-lg-3 col-sm-6">
                            <div class="ft__widget">
                                <div class="ft__logo">
                                    <a href="/">
                                        <img src="{{ asset('/assets/img/logo.png')}}" height="60" width="80" alt="footer logo">
                                    </a>
                                </div>
                                <div class="footer__details">
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-lg-3 col-lg-offset-1 col-sm-6 smb-30 xmt-30">
                            <div class="ft__widget">
                                <h2 class="ft__title">Masukan</h2>
                                <div class="newsletter__form">
                                    <div class="input__box">
                                        <div id="mc_embed_signup">
                                            <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                                <div id="mc_embed_signup_scroll" class="htc__news__inner">
                                                    <div class="news__input">
                                                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
                                                    </div>
                                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                                    <div class="clearfix subscribe__btn"><input type="submit" value="Send" name="subscribe" id="mc-embedded-subscribe" class="bst__btn btn--white__color">

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-lg-3 col-sm-6 smt-30 xmt-30">
                            <div class="ft__widget contact__us">
                                <h2 class="ft__title">Kontak Kita</h2>
                                <div class="footer__inner">
<p>Location : <br> Jln.Cibaduyut Dalam 1 <br>No.33</p>                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
                            <div class="ft__widget">
                                <h2 class="ft__title">Ikuti Kami</h2>
                                <ul class="social__icon">

                                    <li><a href="https://www.instagram.com/as_leather_accessories" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="https://www.facebook.com/profile.php?id=100007428854904&ref=br_rs" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>

                                </ul>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                    </div>
                </div>
                <!-- Start Copyright Area -->
                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">

                                </div>
                                <ul class="footer__menu">
                                    <li><a href="/">Beranda</a></li>
                                    <li><a href="/shop">Produk</a></li>
                                    <li><a href="/contact">Kontak Kami</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Copyright Area -->
            </div>
        </footer>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="{{ asset('/assets/frontend/uniqlo/js/vendor/jquery-1.12.0.min.js')}}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{ asset('/assets/frontend/uniqlo/js/bootstrap.min.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{ asset('/assets/frontend/uniqlo/js/plugins.js')}}"></script>
    <script src="{{ asset('/assets/frontend/uniqlo/js/slick.min.js')}}"></script>
    <script src="{{ asset('/assets/frontend/uniqlo/js/owl.carousel.min.js')}}"></script>
    <!-- Waypoints.min.js')}}. -->
    <script src="{{ asset('/assets/frontend/uniqlo/js/waypoints.min.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{ asset('/assets/frontend/uniqlo/js/main.js')}}"></script>

</body>


<!-- Mirrored from demo.devitems.com/uniqlo//checkout by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Nov 2018 04:40:56 GMT -->
</html>
