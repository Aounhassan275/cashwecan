@extends('user.layout.index')
@section('title')
VIEW TRANSCATIONS 
@endsection
@section('contents')

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Transcations</h5>
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
                <th>Sender Name</th>
                <th>Receiver Name</th>
                <th>Amount</th>
                <th>Detail</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($transcations as $key => $transcation)
                <tr>
                    <td>{{$key+1}}</td>
                    @if($transcation->sender)
                    <td>{{$transcation->sender->name}}</td>
                    @else 
                    <td>Admin</td>
                    @endif
                    <td>{{$transcation->receiver->name}}</td>
                    <td>{{$transcation->amount}}</td>
                    <td>{{$transcation->detail}}</td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
@endsection