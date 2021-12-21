@extends('front.layout.index')
@section('meta')
    
<title>VIDEOS | CASH WE CAN</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')

<!--=======Banner-Section Starts Here=======-->
<section class="bg_img hero-section-2" data-background="front/assets/images/about/hero-bg3.jpg">
    <div class="container">
        <div class="hero-content text-white">
            <h1 class="title">VIDEO's</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    VIDEO's
                </li>
            </ul>
        </div>
    </div>
    <div class="hero-shape">
        <img class="wow slideInUp" src="assets/images/about/hero-shape1.png" alt="about" data-wow-duration="1s">
    </div>
</section>
<!-- ==========How-Section Starts Here========== -->
<section class="how-section bg_img padding-top padding-bottom pt-max-md-0" data-background="assets/images/affiliate/affiliate-bg.png">
    <div class="container">
        <div class="row justify-content-center mb-30-none">
            @foreach (App\Models\Ad::video() as $ad)
            <div class="col-md-6 col-lg-6 col-sm-10">
                <div class="how-item">
                    <div class="how-content">
                        <h5 class="title">{{$ad->name}}</h5>
                        <iframe height="auto" width="100%" src="{{$ad->link}}"></iframe>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ==========How-Section Ends Here========== -->
@endsection