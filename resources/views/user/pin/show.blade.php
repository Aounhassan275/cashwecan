@extends('user.layout.index')
@section('title')
   Pin 
@endsection
@section('contents')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Pin  Used By You</h5>
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
                <th>Pin Amount</th>
                <th>Pin Used At</th>
                <th>Pin Used By</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($pins as $key => $pin)
            <tr>
                <td>{{$key+1}}</td>
                <td>$ {{$pin->pin->amount}}</td>
                <td>{{$pin->user->name}}</td>
                <td>{{$pin->created_at->format('M d,Y')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection