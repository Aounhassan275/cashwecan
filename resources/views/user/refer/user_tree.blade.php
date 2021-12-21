@extends('user.layout.index')
@section('title')
    Referral Tree
@endsection
@section('contents')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 ">
        <div class="card bg-slate-600" style="background-image: url({{asset('user_asset/global_assets/images/backgrounds/panel_bg.png')}}); background-size: contain;">
            <div class="card-body text-center">
                <div class="card-img-actions d-inline-block mb-3">
                    <img class="img-fluid rounded-circle" src="{{asset($user->image)}}" width="170" height="170" alt="">
                    <div class="card-img-actions-overlay card-img rounded-circle">
                        <a href="{{route('user.refer.index')}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                            <i class="icon-plus3"></i>
                        </a>
                    </div>
                </div>

                <h6 class="font-weight-semibold mb-0">{{$user->name}}</h6>
                <span class="d-block opacity-75">$ {{$user->balance}}</span>

                {{-- <div class="list-icons list-icons-extended mt-3">
                    <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="Google Drive" data-container="body"><i class="icon-google-drive"></i></a>
                    <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="Twitter" data-container="body"><i class="icon-twitter"></i></a>
                    <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="Github" data-container="body"><i class="icon-github"></i></a>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="col-xl-12 col-sm-12">
            <div class="card bg-pink-400" style="background-image: url({{asset('user_asset/global_assets/images/backgrounds/panel_bg.png')}}); background-size: contain;">
                <div class="card-body text-center">
                    <h6 class="font-weight-semibold mb-0">Upline Members</h6>
                </div>
            </div>
        </div>
        @foreach ($upline as $up)
            
        <div class="col-xl-12 col-sm-12">
            <div class="card bg-indigo-400" style="background-image: url({{asset('user_asset/global_assets/images/backgrounds/panel_bg.png')}}); background-size: contain;">
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid rounded-circle" src="{{asset($up->image)}}" width="170" height="170" alt="">
                        <div class="card-img-actions-overlay card-img rounded-circle">
                            <a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                <i class="icon-plus3"></i>
                            </a>
                            <a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                <i class="icon-link"></i>
                            </a>
                        </div>
                    </div>
    
                    <h6 class="font-weight-semibold mb-0">{{$up->name}}</h6>
                    <span class="d-block opacity-75">$ {{$up->balance}}</span>
    
                    {{-- <div class="list-icons list-icons-extended mt-3">
                        <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="Google Drive" data-container="body"><i class="icon-google-drive"></i></a>
                        <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="Twitter" data-container="body"><i class="icon-twitter"></i></a>
                        <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="Github" data-container="body"><i class="icon-github"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="col-md-6">
        <div class="col-xl-12 col-sm-12">
            <div class="card bg-warning-400" style="background-image: url({{asset('user_asset/global_assets/images/backgrounds/panel_bg.png')}}); background-size: contain;">
                <div class="card-body text-center">
                    <h6 class="font-weight-semibold mb-0">Down Line Members</h6>
                </div>
            </div>
        </div>
        @foreach ($downline as $down)
        <div class="col-xl-12 col-sm-12">
            <div class="card bg-teal-400" style="background-image: url({{asset('user_asset/global_assets/images/backgrounds/panel_bg.png')}}); background-size: contain;">
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid rounded-circle" src="{{asset($down->image)}}" width="170" height="170" alt="">
                        <div class="card-img-actions-overlay card-img rounded-circle">
                            <a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                <i class="icon-plus3"></i>
                            </a>
                            <a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                <i class="icon-link"></i>
                            </a>
                        </div>
                    </div>
    
                    <h6 class="font-weight-semibold mb-0">{{$down->name}}</h6>
                    <span class="d-block opacity-75">$ {{$down->balance}}</span>
    
                    {{-- <div class="list-icons list-icons-extended mt-3">
                        <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="Google Drive" data-container="body"><i class="icon-google-drive"></i></a>
                        <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="Twitter" data-container="body"><i class="icon-twitter"></i></a>
                        <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="Github" data-container="body"><i class="icon-github"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
@endsection