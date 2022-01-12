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
                        {{-- <a href="{{route('user.tree.show')}}" class="btn btn-dark" >See Your Tree</a> --}}
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
                        <label class="form-label">Copy Link For Referral </label>
                        <input type="text" class="form-control" id="link_area"  value="{{url('user/register',$user->code)}}"  readonly>    
                        <br>
                        <button type="button" class="copy-button btn btn-dark  btn-sm" data-clipboard-action="copy" data-clipboard-target="#link_area">Copy to clipboard</button>

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
    <div class="table-responsive">
        <table class="table datatable-basic datatable-row-basic">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Refer By</th>
                    <th>Placement</th>
                    <th>Status</th>
                    <th>Temp Income</th>
                    <th>Cash Wallet</th>
                    <th>Community Pool</th>
                    <th>Total Earning</th>
                    <th>Total Referral</th>
                    <th>Active Referral</th>
                    <th>Inactive Referral</th>
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
                        <td>{{$user->total_income}}</td>
                        <td>{{$user->cash_wallet}}</td>
                        <td>{{$user->community_pool}}</td>
                        <td>{{$user->totalEarning()}}</td>
                        <td>{{$user->mrefers()->count()}}</td>
                        <td>{{$user->mrefers()->where('status','active')->count()}}</td>
                        <td>{{$user->mrefers()->where('status','pending')->count()}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('clipboard.js')}}"></script>
<script type="text/javascript">
	var clipboard = new Clipboard('.copy-button');
        clipboard.on('success', function(e) {
            copyText.select();
            var $div2 = $("#coppied");
            console.log($div2);
            console.log($div2.is(":visible"));
            if ($div2.is(":visible")) { return; }
            $div2.show();
            setTimeout(function() {
                $div2.fadeOut();
            }, 800);
        });
</script>
@endsection