@extends('user.layout.index')
@section('title')
    Referral Tree
@endsection
@section('contents')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 ">
        <div class="card">
            <div class="card-body text-center">
                <div class="card-img-actions d-inline-block mb-3">
                    <img class="img-fluid rounded-circle" src="{{asset($user->image)}}" width="170" height="170" alt="">
                </div>

                <h6 class="font-weight-semibold mb-0">{{$user->name}}</h6>
                <span class="d-block text-muted">$ {{$user->balance}}</span>
            </div>

            <div class="card-footer d-flex justify-content-around text-center p-0">
                <a href="{{@$user->whatsapp}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" title="Whatsapp">
                    <i class="icon-phone2 top-0"></i>
                </a>
                <a href="{{@$user->twitter}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Twitter">
                    <i class="icon-twitter top-0"></i>
                </a>
                <a href="{{@$user->facebook}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Facebook">
                    <i class="icon-facebook2 top-0"></i>
                </a>
                <a href="{{@$user->instagram}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Instagram">
                    <i class="icon-instagram top-0"></i>
                </a>
                <a href="{{@$user->linkedin}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Linkedin">
                    <i class="icon-linkedin top-0"></i>
                </a>
                <a href="{{@$user->youtube}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Youtube">
                    <i class="icon-youtube top-0"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<div class="row">
    <div class="col-md-6">      
        <div class="card card-body">
            <div class="media">

                <div class="media-body text-center">
                    <h6 class="mb-0">Upline Members</h6>
                </div>
            </div>
        </div>
        @foreach ($upline as $up)

        <div class="card">
            <div class="card-body text-center">
                <div class="card-img-actions d-inline-block mb-3">
                    <img class="img-fluid rounded-circle" src="{{asset($up->image)}}" width="170" height="170" alt="">
                </div>

                <h6 class="font-weight-semibold mb-0">{{$up->name}}</h6>
                <span class="d-block text-muted">$ {{$up->balance}}</span>
            </div>

            <div class="card-footer d-flex justify-content-around text-center p-0">
                <a href="{{@$up->whatsapp}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" title="Whatsapp">
                    <i class="icon-phone2 top-0"></i>
                </a>
                <a href="{{@$up->twitter}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Twitter">
                    <i class="icon-twitter top-0"></i>
                </a>
                <a href="{{@$up->facebook}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Facebook">
                    <i class="icon-facebook2 top-0"></i>
                </a>
                <a href="{{@$up->instagram}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Instagram">
                    <i class="icon-instagram top-0"></i>
                </a>
                <a href="{{@$up->linkedin}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Linkedin">
                    <i class="icon-linkedin top-0"></i>
                </a>
                <a href="{{@$up->youtube}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Youtube">
                    <i class="icon-youtube top-0"></i>
                </a>
            </div>
        </div>
        @endforeach

    </div>
    <div class="col-md-6">        
        <div class="card card-body">
            <div class="media">

                <div class="media-body text-center">
                    <h6 class="mb-0">Down Line Members</h6>
                </div>
            </div>
        </div>
        @foreach ($downline as $down)
        <div class="card">
            <div class="card-body text-center">
                <div class="card-img-actions d-inline-block mb-3">
                    <img class="img-fluid rounded-circle" src="{{asset($down->image)}}" width="170" height="170" alt="">
                </div>

                <h6 class="font-weight-semibold mb-0">{{$down->name}}</h6>
                <span class="d-block text-muted">$ {{$down->balance}}</span>
            </div>

            <div class="card-footer d-flex justify-content-around text-center p-0">
                <a href="{{@$down->whatsapp}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" title="Whatsapp">
                    <i class="icon-phone2 top-0"></i>
                </a>
                <a href="{{@$down->twitter}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Twitter">
                    <i class="icon-twitter top-0"></i>
                </a>
                <a href="{{@$down->facebook}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Facebook">
                    <i class="icon-facebook2 top-0"></i>
                </a>
                <a href="{{@$down->instagram}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Instagram">
                    <i class="icon-instagram top-0"></i>
                </a>
                <a href="{{@$down->linkedin}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Linkedin">
                    <i class="icon-linkedin top-0"></i>
                </a>
                <a href="{{@$down->youtube}}" class="list-icons-item flex-fill p-2" data-popup="tooltip" data-container="body" title="Youtube">
                    <i class="icon-youtube top-0"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
@endsection