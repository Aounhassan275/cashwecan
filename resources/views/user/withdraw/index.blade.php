@extends('user.layout.index')
@section('title')
  WITHDRAW HISTORY  
@endsection
@section('contents')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Your Pins</h5>
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
                <th>User Balance</th>
                <th>Amount Withdraw</th>
                <th>Account Name</th>
                <th>Account Number</th>
                <th>Method</th>
                <th>Status</th>
                <th>Action</th>
            </tr> 
        </thead>
        <tbody>
            @foreach (Auth::user()->withdraws as $key => $withdraw)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$withdraw->user->name}}</td>
                <td>{{$withdraw->user->email}}</td>
                <td>{{$withdraw->user->balance}}</td>
                <td>{{$withdraw->payment}}</td>
                <td>{{$withdraw->name}}</td>
                <td>{{$withdraw->account}}</td>
                <td>{{$withdraw->method}}</td>
                <td> @if($withdraw->status=="Completed")
                    <span class="badge badge-success">{{$withdraw->status}}</span>
                    @elseif($withdraw->status=="in process")
                    <span class="badge badge-danger">{{$withdraw->status}}</span>
                    @else
                    <span class="badge badge-primary">{{$withdraw->status}}</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@section('scripts')
@endsection