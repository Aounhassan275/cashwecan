@extends('front.layout.index')
@section('meta')
    
<title>WITHDRAW HISTORY | CASH WE CAN</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
<section class="transaction-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-text text-center">
                    <h5 class="section-subtitle">What You’ll Get As</h5>
                    <h2 class="section-title">Latest Withdraw</h2>
                    <p class="section-description">Our goal is to simplify investing so that anyone can be an investor.Withthis in mind, we hand-pick the investments we offer on our platform.</p>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-7 col-md-11">

                <ul class="nav nav-pills mb-3 justify-content-center transaction-bnt-outline" id="transaction-pills-tab" role="tablist">
                    <li class="nav-item transaction-nav-item">
                        <a class="nav-link transaction-nav-link active" id="transaction-pills-deposits-tab" data-toggle="pill" href="#pills-deposits" role="tab" aria-controls="pills-deposits" aria-selected="true">
                            <span class="d-flex align-items-center"><i class="ren-deposits d-flex align-items-center"></i>LASTEST<br>WITHDRAWALS</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item transaction-nav-item">
                        <a class="nav-link transaction-nav-link" id="transaction-pills-withdrawal-tab" data-toggle="pill" href="#pills-withdrawals" role="tab" aria-controls="pills-withdrawal" aria-selected="false">
                            <span class="d-flex align-items-center"><i class="ren-investo d-flex align-items-center"></i>TOP<br>WITHDRAWALS</span>
                        </a>
                    </li>
                    <li class="nav-item transaction-nav-item">
                        <a class="nav-link transaction-nav-link" id="transaction-pills-investing-tab" data-toggle="pill" href="#pills-invest" role="tab" aria-controls="pills-invest" aria-selected="false">
                            <span class="d-flex align-items-center"><i class="ren-people3 d-flex align-items-center"></i>LAST<br>INVESTORS</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content transaction-tab-content" id="transaction-pills-tabContent">
                    <div class="tab-pane fade show active transaction-tab-pane" id="pills-deposits" role="tabpanel" aria-labelledby="transaction-pills-deposits-tab">
                        <table class="table table-responsive transaction-table" style="width:91% !important;">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amounts</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Withdraw::all() as $key => $withdraw)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <th scope="row" class="d-flex">
                                        <div class="user-img">
                                            <img src="{{asset('front/image/table-img1.png')}}" alt="#">
                                        </div>
                                        <span>{{$withdraw->user->name}}</span>
                                    </th>
                                    <td>$ {{$withdraw->payment}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">

                <div class="btn-area">
                    <a class="start-now-btn global-btn" href="#">Browse More</a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection