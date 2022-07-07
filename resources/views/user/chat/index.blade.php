@extends('user.layout.index')
@section('contents')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Your Chat With User</h5>
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
                <th>Sr#</th>
                <th>User Image</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Unread Messages</th>
                <th>Action</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($chats as $key => $chat)
            @if($chat->other_user_id == Auth::user()->id)
            <tr> 
                <td>{{$key+1}}</td>
                <td><img src="{{asset($chat->user->image)}}" style="width:100px;height:auto;"></td>
                <td>{{$chat->user->name}}</td>
                <td>{{$chat->user->email}}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm">{{$chat->messages->where('status','Unread')->count()}}</button>
                </td>
                <td>
                    <a href="{{route('user.chat.show',$chat->id)}}">
                        <button type="button" class="btn btn-success btn-sm">View</button>
                    </a> 
                </td>
            </tr>
            @else 
            <tr> 
                <td>{{$key+1}}</td>
                <td><img src="{{asset(@$chat->member->image)}}" style="width:100px;height:auto;"></td>
                <td>{{$chat->member->name}}</td>
                <td>{{$chat->member->email}}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm">{{$chat->messages->where('status','Unread')->count()}}</button>
                </td>
                <td>
                    <a href="{{route('user.chat.show',$chat->id)}}">
                        <button type="button" class="btn btn-success btn-sm">View</button>
                    </a> 
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
@endsection