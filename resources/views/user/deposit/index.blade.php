@extends('user.layout.index')
@section('title')
Deposit
@endsection
@section('contents')
@if(@$payment->image)
<div class="row">
    <div class="col-12 text-center">
        <img src="{{asset($payment->image)}}" width="250px;" height="250px;">
    </div>
</div>
@endif
<div class="row"  style="margin-top:5px;">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add New Deposit</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
 
            <div class="card-body">
                <form action="{{route('user.deposit.store')}}"  method="post">
                    @csrf
                    <input type="hidden" name="pakage_id" value="{{$package}}">
                    <input type="hidden" name="method" value="{{$payment}}">
                    <input type="hidden" class="form-control text-violet" name="package_id" value="{{$package->id}}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Amount To Pay:</label>
                            <input type="number" class="form-control" name="amount" value="{{$package->price}}" readonly>
                        </div> 
                        <div class="form-group col-md-6">
                            <label >Trancation id# <span>*</span></label>
                            <input type="number" class="form-control" name="t_id" value="" required>
                        </div>      
                        <div class="form-group col-md-6">
                            <label >Payment Gateway: <span>*</span></label>
                            <input type="text" class="form-control" name="payment" value="{{$payment->method}}" readonly>                      
                        </div>   
                    </div>
                    <div class="row float-right">
                        <button type="submit" class="btn btn-primary">Deposit Now 
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