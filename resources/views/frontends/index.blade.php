<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demo.devitems.com/uniqlo// by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Nov 2018 04:34:43 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AS Leather</title>
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
                                                <li><a href="/blog">Artikel</a></li>
                                                <li><a href="/blogdetails">blog details</a></li>
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
													<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
                                <img src="{{ asset('images/logo/uniqlo.png')}}" alt="logo">
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
                                <h2><a href="">{{$data->produks->title}}</a></h2>
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
        <!-- Start Slider Area -->
        <div class="slider__container slider--one">
            <div class="slider__activation__wrap owl-carousel owl-theme">
                <!-- Start Single Slide -->
                <div class="slide slider__full--screen" style="background: rgba(0, 0, 0, 0) url({{ asset('/assets/frontend/uniqlo/images/slider/bg/10.png')}}) no-repeat scroll center center / cover ;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                <div class="slider__inner">
                                    <h1>Koleksi<span class="text--theme">Produk Baru</span></h1>
                                    <div class="slider__btn">
                                        <a class="htc__btn" href="/shop">Belanja Sekarang!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <!-- Start Single Slide -->
                <div class="slide slider__full--screen" style="background: rgba(0, 0, 0, 0) url(/assets/frontend/uniqlo/images/slider/bg/10.png) no-repeat scroll center center / cover ;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                <div class="slider__inner">
                                    <h1>Koleksi<span class="text--theme">Produk Baru</span></h1>
                                    <div class="slider__btn">
                                        <a class="htc__btn" href="/shop">Belanja Sekarang!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
            </div>
        </div>

@php
$produks =App\Produk::paginate(4);
$categoris =App\Category::all();
@endphp
<section class="htc__product__area ptb--130 bg__white">
    <div class="container">
        <div class="htc__product__container">
            <!-- Start Product MEnu -->
            <div class="row">
                <div class="col-md-12">
                    <div class="product__menu">
                        <button data-filter="*"  class="is-checked"><a href="{{url('/index')}}">Semua</a></button>
                                @foreach($categoris as $data)
                                <button data-filter=".painting{{$data->id}}"><a href="{{url('/produk_category/',$data->id)}}">{{$data->name}}</a></button>
                                @endforeach
                    </div>
                </div>
            </div>
            <!-- End Product MEnu -->
            <div class="row">
                <div class="product__list">
                    <!-- Start Single Product -->
                    @foreach($produks as $data)
                    <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12 painting{{$data->categories->id}}">
                        <div class="product foo">
                            <div class="product__inner">
                                <div class="pro__thumb">

                                        <img src="{{asset('assets/img/barang/' . $data->cover)}}" alt="product images">

                                </div>
                                <div class="product__hover__info">
                                    <ul class="product__action">
                                        <li><a data-toggle="modal" data-target="#productModal{{$data->id}}" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                        <li><a title="Add TO Cart" href="{{url('add-cart',$data->id)}}"><span class="ti-shopping-cart"></span></a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="product__details">
                                <h2><a href="/detailproduk">{{$data->title}}</a></h2>
                                        <ul class="product__price">
                                            <li class="">Rp.{{$data->price}}</li>
                                        </ul>
                            </div>
                        </div>
                    </div>
                    @include('frontends.modalproduk')
                            @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row mt--60">
                            <div class="col-md-12">
                                <div class="htc__loadmore__btn">
                                    <a href="/shop">Lebih Banyak</a>
                                </div>
                            </div>
                        </div>
</section>
        <!-- Start Slider Area -->
        <!-- Start Our Product Area -->
        <section class="htc__store__area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section__title section__title--2 text-center">
                            <h2 class="title__line">Selamat Datang Di AS Leather!</h2>
                            <p>Disini kami mengutamakan kepuasan dari pelanggan.Maka dari itu,kami akan bekerja sebaik mungkin untuk bisa memuaskan pelanggan</p>
                        </div>
                        <div class="store__btn">
                            <a href="/contact">Kontak</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>



@php
$artikels =App\artikels::paginate(3);
@endphp
        <!-- End Choose Us Area -->
        <!-- Start Our Blog Area -->
        <section class="htc__blog__area bg__white pb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title text-center">
                            <h2 class="title__line">Kabar Terbaru</h2>
                        </div>
                    </div>
                </div>
                <div class="htc__blog__area bg__white ptb--120">
                    <div class="container">
                        <div class="row">
                            <div class="blog__wrap blog--page clearfix">
                                <!-- Start Single Blog -->
                                @foreach($artikels as $data)
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="blog foo">
                                        <div class="blog__inner">
                                            <div class="blog__thumb">
                                                <a href="/blogdetails">
                                                    <img src="{{ asset ('assets/img/artikel/' .$data->gambar. '' ) }}" alt="blog images">
                                                </a>
                                                <div class="blog__post__time">
                                                    <div class="post__time--inner">
                                                        <span class="date">{{ $data->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="blog__hover__info">
                                                <div class="blog__hover__action">
                                                    <ul class="bl__meta">
                                                        <li style="color:black">By :<a style="color:black" >Admin</a></li>
                                                        <li style="color:black">{{$data->judul}}</li>
                                                    </ul>
                                                    <div class="blog__btn">
                                                        <a style="color:black" class="read__more__btn" href="/blogdetails/{{$data->slug}}">Tampilkan Lebih Banyak</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>@endforeach
                                <!-- End Single Blog -->
                                <!-- End Single Blog -->
                            </div>
                        </div>

                        <!-- Start Load More BTn -->
                        <div class="row mt--60">
                            <div class="col-md-12">
                                <div class="htc__loadmore__btn">
                                    <a href="/blog">Lebih Banyak</a>
                                </div>
                            </div>
                        </div>

        </section>
        <!-- End Blog Us Area -->
        <!-- Start Our Team Area -->

        <!-- End Our Team Area -->
        <!-- Start Testimonial Area -->
        <div class="htc__testimonial__area ptb--120" style="background: rgba(0, 0, 0, 0) url({{ asset('/assets/frontend/uniqlo/images/bg/4.jpg')}}) no-repeat scroll center center / cover ;" data--black__overlay="6">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="testimonial__wrap owl-carousel owl-theme clearfix">
                            <!-- Start Single Testimonial -->
                            <div class="testimonial">
                                <div class="testimonial__thumb">
                                    <img src="{{ asset('/assets/img/IMG.jpg')}}" height="300" width="400" alt="testimonial images">
                                </div>
                                <div class="testimonial__details">
                                    <p>Pengrajin Dompet berbahan kulit asal Cibaduyut.Produk yang terbatas di dalam komunitas pecinta sepeda motor,kini mampu menembus pesanan seperti Singapura, Malaysia, Brunei Darussalaam dan Australia.</p>
                                    <div class="test__info">
                                        <span><a href="#">Agung Gani</a></span>
                                        <span> - </span>
                                        <span>Pendiri Usaha</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Testimonial -->
                            <!-- Start Single Testimonial -->
                            <div class="testimonial">
                                <div class="testimonial__thumb">
                                    <img src="{{ asset('/assets/frontend/uniqlo/images/test/client/2.png')}}" alt="testimonial images">
                                </div>
                                <div class="testimonial__details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod teincidi dunt ut labore et dolore gna aliqua. Ut enim ad minim veniam,</p>
                                    <div class="test__info">
                                        <span><a href="#">Robiul siddikee</a></span>
                                        <span> - </span>
                                        <span>Customer</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Testimonial -->
                            <!-- Start Single Testimonial -->
                            <div class="testimonial">
                                <div class="testimonial__thumb">
                                    <img src="{{ asset('/assets/frontend/uniqlo/images/test/client/.png')}}" alt="testimonial images">
                                </div>
                                <div class="testimonial__details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod teincidi dunt ut labore et dolore gna aliqua. Ut enim ad minim veniam,</p>
                                    <div class="test__info">
                                        <span><a href="#">Robiul siddikee</a></span>
                                        <span> - </span>
                                        <span>Customer</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Testimonial -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Testimonial Area -->
        <!-- Start brand Area -->

    </section>
        <!-- End Our Product Area -->
        <!-- Start Footer Area -->
        <section>
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
        </footer></section>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header modal__header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <!-- Start product images -->
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="big images" src="images/product/big-img/1.jpg">
                                </div>
                            </div>
                            <!-- end product images -->
                            <div class="product-info">
                                <h1>Simple Fabric Bags</h1>
                                <div class="rating__and__review">
                                    <ul class="rating">
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                        <li><span class="ti-star"></span></li>
                                    </ul>
                                    <div class="review">
                                        <a href="#">4 customer reviews</a>
                                    </div>
                                </div>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price">$17.20</span>
                                        <span class="old-price">$45.00</span>
                                    </div>
                                </div>
                                <div class="quick-desc">
                                    Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
                                </div>
                                <div class="select__color">
                                    <h2>Select color</h2>
                                    <ul class="color__list">
                                        <li class="red"><a title="Red" href="#">Red</a></li>
                                        <li class="gold"><a title="Gold" href="#">Gold</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                    </ul>
                                </div>
                                <div class="select__size">
                                    <h2>Select size</h2>
                                    <ul class="color__list">
                                        <li class="l__size"><a title="L" href="#">L</a></li>
                                        <li class="m__size"><a title="M" href="#">M</a></li>
                                        <li class="s__size"><a title="S" href="#">S</a></li>
                                        <li class="xl__size"><a title="XL" href="#">XL</a></li>
                                        <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
                                    </ul>
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons">
                                            <li><a target="_blank" title="rss" href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
                                            <li><a target="_blank" title="Linkedin" href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                            <li><a target="_blank" title="Tumblr" href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
                                            <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="addtocart-btn">
                                    <a href="#">Add to cart</a>
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
    <!-- END QUICKVIEW PRODUCT -->
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


<!-- Mirrored from demo.devitems.com/uniqlo// by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Nov 2018 04:35:55 GMT -->
</html>
