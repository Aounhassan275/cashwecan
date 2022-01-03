@extends('user.layout.index')
@section('title')
Withdraw
@endsection
@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="alert bg-info text-white alert-styled-right alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <span class="font-weight-semibold">Alert!</span>User Balance in cash wallet will be atleast $25 to get withdraw.
        </div>
    </div>
</div>
<div class="row" >
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add New Withdraw Request</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
 
            <div class="card-body">
                <form action="{{route('user.withdraw.store')}}"  method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Withdraw Payment</label>
                            <input type="number" name="payment" class="form-control" value="" required>                        
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Account Holder Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Account Holder Name" required>
                            <input type="hidden" name="status" class="form-control border-teal border-1" value="in process" required>
                        </div>
                    </div>   
                    <div class="row">
                      
                        <div class="form-group col-6">
                            <label class="form-label">Account Number</label>
                            <input type="text" name="account" class="form-control" placeholder="Enter Account Number Please" required>
                        </div> 
                        <div class="form-group col-6">
                            <label class="form-label">Payment Method</label>
                            <select name="method" class="form-control" required>
                                <option value="opt1">Select</option>
                                @foreach(App\Models\Source::all() as $source)
                                <option value="{{$source->name}}">{{$source->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row float-right">
                        <button type="submit" class="btn btn-primary">Create Withdraw Request Now 
                            <i class="icon-plus22 ml-2"></i>
                        </button>
                    </div>
               
                </form>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>
@endsection