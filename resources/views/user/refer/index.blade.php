@extends('user.layout.index')
@section('title')
REFERRALS
@endsection
@section('contents')
<div class="row " >
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card bg-warning">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Share Your Referral Link</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a href="{{route('user.tree.show')}}" class="btn btn-dark" >See Your Tree</a>
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
                {{-- <div class="text-right">
                </div> --}}
            </div>
 
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Copy Link For Referral</label>
                        <input type="text" class="form-control" id="{{url('user/register',$user->code)}}"  value="{{url('user/register',$user->code)}}"  readonly>    
                    </div> 
                </div>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>
<div class="card">
    <div class="card-header header-elements-inline bg-primary">
        <h5 class="card-title">View Your Direct Referral</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table  datatable-basic datatable-row-basic">
        <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Refer By</th>
                <th>User Placement</th>
                <th>User Status</th>
                <th>User Earning</th>
            </tr> 
        </thead>
        <tbody>
            @foreach (Auth::user()->mrefers() as $key => $user)
                <tr> 
                    <td>{{$key + 1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    
                    <td>
                        @if($user->refer_by)
                        {{$user->refer_by_name($user->refer_by)}}
                        @endif
                    </td>
                    <td>{{$user->placement()}}</td>
                    <td>
                    @if ($user->checkstatus())
                        <span class="badge badge-success">Active</span>  
                        @else
                        <span class="badge badge-danger">Pending</span>                                                      
                        @endif</td>
                    <td>{{$user->balance}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
@endsection