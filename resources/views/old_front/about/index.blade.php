@extends('front.layout.index')
@section('meta')
    
<title>ABOUT US | CASH WE CAN</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
<!-- about section begin -->
<section class="about-section navigation" id="about-section">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-left">
                        <div class="section-text">
                            <h5 class="section-subtitle">Who we are</h5>
                            <h2 class="section-title">About Cash We Can</h2>
                            <h5 class="about-details">To meet <span>today's challenges</span>, we've created a unique fund management system</h5>
                            <p class="section-description">Cash We Can - a private financial company specializing in travel investment. Our system is risk-free thanks to the development and improvement of semi-automatic system of rates. We upgraded our automatic system so that the last step before the rate is now done by our operators.</p>
                        </div>

                        <div class="about-box">
                            <div class="row text-center">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-about-box">
                                        <div class="icon-box-outer bg-eff">
                                            <div class="icon-box">
                                                <i class="ren-efficiency"></i>
                                            </div>
                                        </div>
                                        <h3>Efficiency</h3>
                                        <div class="hover-box hover-left">
                                            <a href="#">READ MORE<i class="ren-arrowright"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-about-box">
                                        <div class="icon-box-outer bg-ex">
                                            <div class="icon-box">
                                                <img src="{{asset('front/image/expierence.svg')}}" alt="#">
                                            </div>
                                        </div>
                                        <h3>Expierence</h3>
                                        <div class="hover-box hover-top">
                                            <a href="#">READ MORE<i class="ren-arrowright"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-about-box">
                                        <div class="icon-box-outer bg-security">
                                            <div class="icon-box">
                                                <i class="ren-security"></i>
                                            </div>
                                        </div>
                                        <h3>Security</h3>
                                        <div class="hover-box hover-right">
                                            <a href="#">READ MORE<i class="ren-arrowright"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-about-box">
                                        <div class="icon-box-outer bg-trans">
                                            <div class="icon-box">
                                                <i class="ren-transparent"></i>
                                            </div>
                                        </div>
                                        <h3>Transparent</h3>
                                        <div class="hover-box hover-left">
                                            <a href="#">READ MORE<i class="ren-arrowright"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-about-box">
                                        <div class="icon-box-outer bg-simple">
                                            <div class="icon-box">
                                                <i class="ren-simple"></i>
                                            </div>
                                        </div>
                                        <h3>Simple</h3>
                                        <div class="hover-box hover-bottom">
                                            <a href="#">READ MORE<i class="ren-arrowright"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-about-box">
                                        <div class="icon-box-outer bg-com">
                                            <div class="icon-box">
                                                <i class="ren-compliant"></i>
                                            </div>
                                        </div>
                                        <h3>Compliant</h3>
                                        <div class="hover-box hover-right">
                                            <a href="#">READ MORE<i class="ren-arrowright"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="about-right-area">
                        <img src="{{asset('front/image/about-right-bg.png')}}" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about section end -->

@endsection