@extends('user.layout.index')
@section('title')
    PIN
@endsection
@section('contents')
<div class="row" >
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline bg-info">
                <h5 class="card-title">Add New PIN</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
 
            <div class="card-body">
                <form action="{{route('user.pin.store')}}"  method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control text-violet" name="amount" required>
                        </div>  
                    </div>
                    <div class="row float-right">
                        <button type="submit" class="btn btn-primary">Create Pin Now 
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
    <div class="card-header header-elements-inline bg-secondary">
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
                <th>Pin</th>
                <th>Pin Amount</th>
                <th>Used By</th>
            </tr> 
        </thead>
        <tbody>
            @foreach (Auth::user()->pins as $key => $pin)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$pin->name}}</td>
                <td>{{$pin->amount}}</td>
                <td class="text-center">
                    <div class="list-icons">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('user.pin.show',$pin->id)}}" class="dropdown-item"><i class="icon-file-pdf"></i> Show Pin</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection