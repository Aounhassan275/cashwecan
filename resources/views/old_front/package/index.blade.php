@extends('front.layout.index')
@section('meta')
    
<title>PACKAGES | {{App\Models\Setting::siteName()}}</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
<!-- investment section begin -->
<section class="investment-section" id="investment-section">
    <div class="overlay">
        <div class="container text-center">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="section-text">
                        <h5 class="section-subtitle">INVESTMENT OFFER</h5>
                        <h2 class="section-title">Our Investment Plans</h2>
                        <p class="section-description">{{App\Models\Setting::siteName()}} provides a straightforward and transparent mechanism to attract investments and make more profits.</p>
                    </div>
                </div>
            </div>

            <div class="investment-section-items">

                <div class="row d-flex justify-content-sm-center">
                    @foreach (App\Models\Package::all()->take(8) as $package)
                        <div class="col-lg-4 col-md-4 col-sm-6 text-center">
                            <div class="single-item">    
                                <div class="title-box">
                                    <h3>{{$package->name}}</h3>
                                </div>    
                                <div class="icon-box">
                                    <img src="{{asset('front/image/places-icon-1.png')}}" alt="#">
                                </div>
                                <div class="part-prize">
                                    <span class="percentage"><b>$ {{$package->price}}</b></span>
                                    <h4 class="min-max">
                                        {{-- <span class="left">Max Income Till Upline : <b>$ {{$package->direct_income}}</b></span> --}}
                                        {{-- <br> --}}
                                        {{-- <br> --}}
                                        {{-- <span class="right">Community Income: <b>$ {{$package->community_income}}</b></span> --}}
                                    </h4>
                                </div>
                                <div class="single-image">
                                    <img src="{{asset('front/image/investment-curveshape.png')}}" alt="#">
                                </div>
                                <div class="part-cart">
                                    <a href="{{route('user.login')}}" class="global-btn">Make Deposit</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-lg-7 col-md-5 col-sm-12 travula-content-center">
                    <div class="row d-flex justify-content-start">
                        <div class="col-lg-12">
                            <div class="payment-methods-outer">
                                <div class="payment-methods">
                                    <h3>WE ACCEPTED PAYMENT METHOD</h3>
                                    <div class="icon-gallery">
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <img src="{{asset('front/image/card-icon.png')}}" alt="#">
                                            </div>
                                            <h5 class="icon-title">Credit Card</h5>
                                        </div>
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <img src="{{asset('front/image/paypal.png')}}" alt="#">
                                            </div>
                                            <h5 class="icon-title">Paypal</h5>
                                        </div>
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <img src="{{asset('front/image/bitcoin.png')}}" alt="#">
                                            </div>
                                            <h5 class="icon-title">Bitcoin</h5>
                                        </div>
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <img src="{{asset('front/image/litecoin.png')}}" alt="#">
                                            </div>
                                            <h5 class="icon-title">Litecoin</h5>
                                        </div>
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <img src="{{asset('front/image/ethereum.png')}}" alt="#">
                                            </div>
                                            <h5 class="icon-title">Ethereum</h5>
                                        </div>
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <img src="{{asset('front/image/ripple.png')}}" alt="#">
                                            </div>
                                            <h5 class="icon-title">Ripple</h5>
                                        </div>
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
<!-- investment section end -->
@endsection