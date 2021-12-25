<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta')
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="{{asset('front/image/favicon.png')}}">
    <!--icofont icon css-->
    <link rel="stylesheet" href="{{asset('front/css/icofont.min.css')}}">
    <!--magnific popup css-->
    <link rel="stylesheet" href="{{asset('front/css/magnific-popup.css')}}">
    <!--magnific popup css-->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <!--magnific popup css-->
    <link rel="stylesheet" href="{{asset('front/css/slick.css')}}">
    <!--google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;display=swap" rel="stylesheet">
    <!--main css-->
    <link rel="stylesheet" href="{{asset('front/css/app.css')}}">
    @toastr_css
</head>
<body>

<!--Start Preloader-->
<div class="preloader" id="preloader"></div>
<!--End Preloader-->

<!-- scroll To top begin -->
<a href="#header-section" class="scrollToTop"><img src="{{asset('front/image/rocket.png')}}" alt="#"></a>
<!-- scroll To top end -->

<!-- header top begin -->
<header class="header-section" id="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 d-flex justify-content-start travula-content-center">
                    <div class="header-left">
                        <ul>
                            <li class="header-left-list">
                                <p class="header-left-text">
                                    <span class="header-left-icon">
                                        <i class="icofont-headphone-alt"></i>
                                        <a href="mailto:info@cashwecan.com">Support</a>
                                    </span>
                                </p>
                            </li>
                            <li class="header-left-list">
                                <p class="header-left-text">
                                    <span class="header-left-icon">
                                        <i class="icofont-email"></i>
                                        <a href="mailto:info@cashwecan.com">info@cashwecan.com</a>
                                    </span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-content-end travula-content-center">
                    <div class="header-right">
                        <ul>
                            <li class="header-right-list">
                                
                                <p class="header-right-text">
                                    <span class="header-right-icon carticon">
                                        <img src="{{asset('front/image/user.png')}}" alt="user-img">
                                    </span>
                                    <a href="{{route('user.login')}}">Login</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- nav top begin -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light travula-navbar">
        <div class="container">

            <div class="logo-section">
                <a class="logo-title navbar-brand" href="{{url('/')}}"><img src="{{asset('front/image/logo.png')}}" alt="logo">Cash We Can</a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icofont-navigation-menu"></i>
            </button>
            <div class="collapse navbar-collapse nav-main justify-content-end" id="navbarNav">
                <ul class="navbar-nav" id="primary-menu">
                    <li class="nav-item active">
                        <a class="nav-link active" href="{{url('/')}}">HOME
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('about_us')}}">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('packages')}}">PACKAGES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('withdraw')}}">WITHDRAW</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('contact_us')}}">CONTACT US</a>
                    </li>
                </ul>
            </div>
            <div class="right-side-box">
                <a class="join-btn global-btn" href="#">JOIN US</a>
            </div>
        </div>
    </nav>
    <!-- nav top end -->
</header>
<!-- header top end -->

<!-- banner top begin -->
<section class="banner-section">
    <div class="myVideo">
        <img src="{{asset('front/image/video-hero.png')}}" alt="#">
    </div>
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-area">
                        <div class="banner-text">
                            <h2>Cash We Can</h2>
                            <h3 style="font-weight:bold;">FREEDOM OF SALE AND PURCHASE</h3>
                            <h3 class="font-regular">A Profitable Platform For High-Margin</h3>
                        </div>
                        <div class="get-start">
                            <a class="global-btn" href="#">GET STARTED NOW!</a>
                        </div>

                        <div class="arrow-bottom">
                            <a href="#about-section"><i class="icofont-thin-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <img class="smart-plane" src="{{asset('front/image/plane.png')}}" alt="#">
        </div>
    </div>
</section>
<!-- banner top end -->
@yield('content')

<!-- contact-us section begin -->
<section class="contact-us-section" id="contact-us-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-text">
                    <h5 class="section-subtitle">Contact Us</h5>
                    <h2 class="section-title">Get in Touch</h2>
                    <p class="section-description">Please feel free to contact us through our support center.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-form">
                    <form method="post" action="{{route('admin.message.store')}}" class="contact-form-aqua">
                        @csrf
                        <h2 class="contact-head">Send Us a Massage</h2>
                        <input type="text" name="name" required="" placeholder="Name *" class="contact-frm active">
                        <input type="email" name="email" required="" placeholder="Email *" class="contact-frm">
                        <input type="text" name="subject" required="" placeholder="Subject *" class="contact-frm">
                        <textarea name="message" id="message" placeholder="Message *" class="contact-msg"></textarea>
                        <input type="submit" value="SUBMIT NOW" class="global-btn">
                        <br>
                        <br>
                        <span class="msgSubmit"></span>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-img">
                    <img src="{{asset('front/image/contact-bg.png')}}" alt="#">
                </div>
            </div>

        </div>
    </div>
</section>
<!-- contact-us section end -->

<!-- questions section begin -->
<section class="questions-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <div class="section-text">
                    <h5 class="section-subtitle">Got Any Questions</h5>
                    <h2 class="section-title">We've Got Answers</h2>
                    <p class="section-description">Choose a category below for immediate investmwnt help! If our FAQ section has not answered your inquiry, please contact us via email, live chat, or telephone, and our Customer Support team will be happy to assist you further!</p>
                 </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <ul class="nav nav-pills mb-3 justify-content-center questions-nav-pills" id="questions-pills-tab" role="tablist">
                    <li class="nav-item questions-nav-item">
                        <a class="nav-link questions-nav-link active" id="questions-pills-basic-tab" data-toggle="pill" href="#pills-basic" role="tab" aria-controls="questions-pills-basic-tab" aria-selected="true">Basic Question</a>
                    </li>
                    <li class="nav-item questions-nav-item">
                        <a class="nav-link questions-nav-link" id="questions-pills-investing-tab" data-toggle="pill" href="#pills-investing" role="tab" aria-controls="questions-pills-investing-tab" aria-selected="false">Investing Question</a>
                    </li>
                    <li class="nav-item questions-nav-item">
                        <a class="nav-link questions-nav-link" id="questions-pills-withdrawal-tab" data-toggle="pill" href="#pills-withdrawal" role="tab" aria-controls="questions-pills-withdrawal-tab" aria-selected="false">Withdrawal Question</a>
                    </li>
                    <li class="nav-item questions-nav-item">
                        <a class="nav-link questions-nav-link" id="questions-pills-referral-tab" data-toggle="pill" href="#pills-referral" role="tab" aria-controls="questions-pills-referral-tab" aria-selected="false">Referral Program</a>
                    </li>
                </ul>
                <div class="tab-content questions-tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active questions-tab-pane" id="pills-basic" role="tabpanel" aria-labelledby="questions-pills-basic-tab">
                        <div class="questions-accordion" id="withdrawal-accordion">
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="withdrawal-headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link questions-btn-link" data-toggle="collapse" data-target="#withdrawal-collapseOne" aria-expanded="true" aria-controls="questions-pills-basic-tab">
                                            What Are The Main Advantages Of Cash We Can?
                                        </button>
                                    </h5>
                                </div>

                                <div id="withdrawal-collapseOne" class="collapse show questions-show" aria-labelledby="withdrawal-headingOne" data-parent="#withdrawal-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="withdrawal-headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#withdrawal-collapseTwo" aria-expanded="false" aria-controls="questions-pills-investing-tab">
                                            Is It Free Of Charge To Open An Account?
                                        </button>
                                    </h5>
                                </div>
                                <div id="withdrawal-collapseTwo" class="collapse questions-show" aria-labelledby="withdrawal-headingTwo" data-parent="#withdrawal-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="withdrawal-headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#withdrawal-collapseThree" aria-expanded="false" aria-controls="questions-pills-withdrawal-tab">
                                            How Secure User Accounts And Personal Data?
                                        </button>
                                    </h5>
                                </div>
                                <div id="withdrawal-collapseThree" class="collapse questions-show" aria-labelledby="withdrawal-headingThree" data-parent="#withdrawal-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="withdrawal-headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#withdrawal-collapseFour" aria-expanded="false" aria-controls="questions-pills-referral-tab">
                                            How Many Accounts Can I Open On The Site?
                                        </button>
                                    </h5>
                                </div>
                                <div id="withdrawal-collapseFour" class="collapse questions-show" aria-labelledby="withdrawal-headingFour" data-parent="#withdrawal-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade questions-tab-pane" id="pills-investing" role="tabpanel" aria-labelledby="questions-pills-investing-tab">
                        <div class="questions-accordion" id="investing-accordion">
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="investing-headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link questions-btn-link" data-toggle="collapse" data-target="#investing-collapseOne" aria-expanded="true" aria-controls="questions-pills-basic-tab">
                                            What Are The Main Advantages Of Cash We Can?
                                        </button>
                                    </h5>
                                </div>

                                <div id="investing-collapseOne" class="collapse show questions-show" aria-labelledby="investing-headingOne" data-parent="#investing-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="investing-headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#investing-collapseTwo" aria-expanded="false" aria-controls="questions-pills-investing-tab">
                                            Is It Free Of Charge To Open An Account?
                                        </button>
                                    </h5>
                                </div>
                                <div id="investing-collapseTwo" class="collapse questions-show" aria-labelledby="investing-headingTwo" data-parent="#investing-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="investing-headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#investing-collapseThree" aria-expanded="false" aria-controls="questions-pills-withdrawal-tab">
                                            How Secure User Accounts And Personal Data?
                                        </button>
                                    </h5>
                                </div>
                                <div id="investing-collapseThree" class="collapse questions-show" aria-labelledby="investing-headingThree" data-parent="#investing-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="investing-headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#investing-collapseFour" aria-expanded="false" aria-controls="questions-pills-referral-tab">
                                            How Many Accounts Can I Open On The Site?
                                        </button>
                                    </h5>
                                </div>
                                <div id="investing-collapseFour" class="collapse questions-show" aria-labelledby="investing-headingFour" data-parent="#investing-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade questions-tab-pane" id="pills-withdrawal" role="tabpanel" aria-labelledby="questions-pills-withdrawal-tab">
                        <div class="questions-accordion" id="basic-accordion">
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="basic-headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link questions-btn-link" data-toggle="collapse" data-target="#basic-collapseOne" aria-expanded="true" aria-controls="questions-pills-basic-tab">
                                            What Are The Main Advantages Of Cash We Can?
                                        </button>
                                    </h5>
                                </div>

                                <div id="basic-collapseOne" class="collapse show questions-show" aria-labelledby="basic-headingOne" data-parent="#basic-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="basic-headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#basic-collapseTwo" aria-expanded="false" aria-controls="questions-pills-investing-tab">
                                            Is It Free Of Charge To Open An Account?
                                        </button>
                                    </h5>
                                </div>
                                <div id="basic-collapseTwo" class="collapse questions-show" aria-labelledby="basic-headingTwo" data-parent="#basic-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="basic-headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#basic-collapseThree" aria-expanded="false" aria-controls="questions-pills-withdrawal-tab">
                                            How Secure User Accounts And Personal Data?
                                        </button>
                                    </h5>
                                </div>
                                <div id="basic-collapseThree" class="collapse questions-show" aria-labelledby="basic-headingThree" data-parent="#basic-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="basic-headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#basic-collapseFour" aria-expanded="false" aria-controls="questions-pills-referral-tab">
                                            How Many Accounts Can I Open On The Site?
                                        </button>
                                    </h5>
                                </div>
                                <div id="basic-collapseFour" class="collapse questions-show" aria-labelledby="basic-headingFour" data-parent="#basic-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade questions-tab-pane" id="pills-referral" role="tabpanel" aria-labelledby="questions-pills-referral-tab">
                        <div class="questions-accordion" id="referral-accordion">
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="referral-headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link questions-btn-link" data-toggle="collapse" data-target="#referral-collapseOne" aria-expanded="true" aria-controls="questions-pills-basic-tab">
                                            What Are The Main Advantages Of Cash We Can?
                                        </button>
                                    </h5>
                                </div>

                                <div id="referral-collapseOne" class="collapse show questions-show" aria-labelledby="referral-headingOne" data-parent="#referral-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="referral-headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#referral-collapseTwo" aria-expanded="false" aria-controls="questions-pills-investing-tab">
                                            Is It Free Of Charge To Open An Account?
                                        </button>
                                    </h5>
                                </div>
                                <div id="referral-collapseTwo" class="collapse questions-show" aria-labelledby="referral-headingTwo" data-parent="#referral-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="referral-headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#referral-collapseThree" aria-expanded="false" aria-controls="questions-pills-withdrawal-tab">
                                            How Secure User Accounts And Personal Data?
                                        </button>
                                    </h5>
                                </div>
                                <div id="referral-collapseThree" class="collapse questions-show" aria-labelledby="referral-headingThree" data-parent="#referral-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                            <div class="card questions-card">
                                <div class="card-header questions-card-header" id="referral-headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed questions-btn-link" data-toggle="collapse" data-target="#referral-collapseFour" aria-expanded="false" aria-controls="questions-pills-referral-tab">
                                            How Many Accounts Can I Open On The Site?
                                        </button>
                                    </h5>
                                </div>
                                <div id="referral-collapseFour" class="collapse questions-show" aria-labelledby="referral-headingFour" data-parent="#referral-accordion">
                                    <div class="card-body questions-card-body">
                                        All stored data on our servers remains protected via encryption technology all the time. All account related transactions done by our clients are mediated exclusively via secured internet connections.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- questions section end -->

<!-- footer section begin -->
<footer class="footer-section">
    <div class="overlay">

        <div class="footer-content">
            <div class="container">
                <div class="footer-top-content">
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <div class="social-icon">
                                <ul class="icon-area">
                                    <li class="social-nav">
                                        <a href="#"><i class="icofont-facebook"></i></a>
                                    </li>
                                    <li class="social-nav">
                                        <a href="#"><i class="icofont-twitter"></i></a>
                                    </li>
                                    <li class="social-nav">
                                        <a href="#"><i class="icofont-pinterest"></i></a>
                                    </li>
                                    <li class="social-nav">
                                        <a href="#"><i class="icofont-rss"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="section-text">
                                <h5 class="section-subtitle">Subscribe to Cash We Can</h5>
                                <h2 class="section-title">To Get Exclusive benefits</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-7">
                            <div class="subscribe">
                                <input type="email" name="email" autocomplete="off" placeholder="Your Email Address" class="input-subscribe">
                                <button class="subscribe-btn global-btn">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="footer-bottom">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 col-md-12 d-flex justify-content-start travula-content-center">
                            <div class="footer-bottom-left">
                                <p>Copyright © 2020. All Rights Reserved By <a href="#">Cash We Can</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 d-flex justify-content-end travula-content-center">
                            <div class="footer-bottom-right">
                                <ul>
                                    <li>
                                        <a href="#">Privacy & Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Term Of Service</a>
                                    </li>
                                    <li>
                                        <a href="#">Affilate</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer section end -->

<script src="{{asset('front/js/jquery.js')}}"></script>
<script src="{{asset('front/js/slick.js')}}"></script>
<script src="{{asset('front/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('front/js/animated-headline.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/app.js')}}"></script>
@toastr_js
@toastr_render
@yield('javascript')
</body>

<!-- Mirrored from pixner.net/travula/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 30 Apr 2020 07:37:18 GMT -->
</html>
