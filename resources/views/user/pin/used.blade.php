@extends('user.layout.index')
@section('title')
    PIN
@endsection
@section('contents')
<div class="row" >
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline bg-warning">
                <h5 class="card-title">Add Pin Balance</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
 
            <div class="card-body">
                <form action="{{route('user.pin_used.store')}}"  method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Enter Pin</label>
                            <input type="text" class="form-control text-violet" name="name" required>
                        </div>
                    </div>
                    <div class="row float-right">
                        <button type="submit" class="btn btn-primary">Get Balance Now 
                            <i class="icon-plus22 ml-2"></i>
                        </button>
                    </div>
               
                </form>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>
<div class="card">
    <div class="card-header header-elements-inline bg-success">
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
            </tr> 
        </thead>
        <tbody>
            @foreach (Auth::user()->pin_used as $key => $pinused)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>$ {{$pinused->pin->amount}}</td>
                    <td>{{$pinused->created_at->format('M d,Y')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection