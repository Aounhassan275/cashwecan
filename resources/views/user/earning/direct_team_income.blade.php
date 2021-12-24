@extends('user.layout.index')
@section('title')
VIEW DIRECT TEAM INCOME 
@endsection
@section('contents')

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Your Direct Team Income History</h5>
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
                <th>Due To</th>
                <th>Created At</th>
                <th>Amount</th>

            </tr> 
        </thead>
        <tbody>
            @foreach (Auth::user()->directTeamIncome as $key => $income)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$income->user->refer_by_name($income->due_to)}}</td>
                    <td>{{$income->created_at->format('d M,Y')}}</td>
                    <td>$ {{$income->price}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-center">Total Income : </td>
                    <td>$ {{Auth::user()->directTeamIncome->sum('price')}}</td>
                </tr>
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
@endsection