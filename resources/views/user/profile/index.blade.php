@extends('user.layout.index')

@section('title')
UPDATE YOUR OWN PROFILE
@endsection

@section('styles')
<!-- Theme JS files -->
<script src="{{asset('user_asset/global_assets/js/plugins/editors/summernote/summernote.min.js')}}"></script>
<script src="{{asset('user_asset/global_assets/js/demo_pages/editor_summernote.js')}}"></script>
@endsection
@section('contents')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Profile</h5>
            </div>
            <div class="card-body">
                <form action="{{route('user.user.update',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="row">
                    <input type="hidden" name="id" class="form-control" value="{{Auth::user()->id}}">
                        <div class="form-group col-6">
                            <label class="form-label">User Name</label>
                            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" >
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" >

                        </div>
                   </div>
                   <p><strong>Social Links:</strong></p>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Facebook</label>
                            <input type="text" name="facebook" class="form-control" value="{{Auth::user()->facebook}}" >
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Instagram</label>
                            <input type="text" name="instagram" class="form-control" value="{{Auth::user()->instagram}}" >
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Whatsapp</label>
                            <input type="text" name="whatsapp" class="form-control" value="{{Auth::user()->whatsapp}}" >
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Youtube</label>
                            <input type="text" name="youtube" class="form-control" value="{{Auth::user()->youtube}}" >
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Linkedin</label>
                            <input type="text" name="linkedin" class="form-control" value="{{Auth::user()->linkedin}}" >
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Twitter</label>
                            <input type="text" name="twitter" class="form-control" value="{{Auth::user()->twitter}}" >
                        </div>
                        <p><strong>Personal Informations:</strong></p>
                        <div class="form-group col-12">  
                            <label class="form-label">
                                Banner Image 
                                @if(Auth::user()->banner())
                                <a href="{{asset(Auth::user()->banner())}}" target="_blank">
                                    <i class="icon-eye text-indigo-400 opacity-75"></i>
                                </a>
                                @endif
                            </label>
                            <input type="file" name="banner" class="form-control" >
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">CNIC Front
                                @if(Auth::user()->cnicFront())
                                <a href="{{asset(Auth::user()->cnicFront())}}" target="_blank">
                                    <i class="icon-eye text-indigo-400 opacity-75"></i>
                                </a>
                                @endif
                            </label>
                            <input type="file" name="cnic_front" class="form-control"  >
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">CNIC Back
                                @if(Auth::user()->cnicBack())
                                <a href="{{asset(Auth::user()->cnicBack())}}" target="_blank">
                                    <i class="icon-eye text-indigo-400 opacity-75"></i>
                                </a>
                                @endif
                            </label>
                            <input type="file" name="cnic_back" class="form-control"  >
                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <textarea class="form-control summernote"   name="description">{{Auth::user()->description}}</textarea>
                        </div>
                   </div>
                    
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection