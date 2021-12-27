@extends('user.layout.index')
@section('title')
PACKAGE SUBSRIPTION
@endsection
@section('contents')
<div class="row">
    @foreach (App\Models\Package::all() as $key => $package)
    @if(Auth::user()->package)
        @if(Auth::user()->package->price < $package->price)
        <div class="col-xl-3 col-sm-6">
            <div class="card bg-slate-600" style="background-image: url({{asset('user_asset/global_assets/images/backgrounds/panel_bg.png')}}); background-size: contain;">
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        @if($package->image)
                            <img class="img-fluid rounded-circle" src="{{asset($package->image)}}" width="170" height="170" alt="">
                        @else
                            <img class="img-fluid rounded-circle" src="{{asset('user_asset/global_assets/images/placeholders/placeholder.jpg')}}" width="170" height="170" alt="">
                        @endif
                    </div>
                    <h6 class="font-weight-semibold mb-0">{{$package->name}}</h6>
                    <span class="d-block opacity-75">$ {{$package->price}} /-</span>
                    
                    <div class="list-icons list-icons-extended mt-3">
                        @if(Auth::user()->cash_wallet >= $package->price)
                            <a href="{{route('user.package.direct_deposit',$package->id)}}" onclick="$('.btn').text('Please Wait!!!').attr('disabled',true)" class="btn bg-teal-400 btn-lg text-uppercase font-size-sm font-weight-semibold">Active</a>  
                        @else 
                            <a href="{{route('user.deposit.index')}}" class="btn bg-teal-400 btn-lg text-uppercase font-size-sm font-weight-semibold">Charge Account</a>  
                            {{-- <a href="{{route('user.package.payment',$package->id)}}" class="btn bg-teal-400 btn-lg text-uppercase font-size-sm font-weight-semibold">Purchase</a>   --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
    @else  
    <div class="col-xl-3 col-sm-6">
        <div class="card bg-slate-600" style="background-image: url({{asset('user_asset/global_assets/images/backgrounds/panel_bg.png')}}); background-size: contain;">
            <div class="card-body text-center">
                <div class="card-img-actions d-inline-block mb-3">
                    @if($package->image)
                        <img class="img-fluid rounded-circle" src="{{asset($package->image)}}" width="170" height="170" alt="">
                    @else
                        <img class="img-fluid rounded-circle" src="{{asset('user_asset/global_assets/images/placeholders/placeholder.jpg')}}" width="170" height="170" alt="">
                    @endif
                </div>
                <h6 class="font-weight-semibold mb-0">{{$package->name}}</h6>
                <span class="d-block opacity-75">$ {{$package->price}} /-</span>
                
                <div class="list-icons list-icons-extended mt-3">
                    @if(Auth::user()->cash_wallet >= $package->price)
                        <a href="{{route('user.package.direct_deposit',$package->id)}}" onclick="$('.btn').text('Please Wait!!!').attr('disabled',true)" class="btn bg-teal-400 btn-lg text-uppercase font-size-sm font-weight-semibold">Active</a>  
                    @else 
                        <a href="{{route('user.deposit.index')}}" class="btn bg-teal-400 btn-lg text-uppercase font-size-sm font-weight-semibold">Charge Account</a>  
                        {{-- <a href="{{route('user.package.payment',$package->id)}}" class="btn bg-teal-400 btn-lg text-uppercase font-size-sm font-weight-semibold">Purchase</a>   --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection