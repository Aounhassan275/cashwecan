@extends('user.layout.index')
@section('title')
    {{$product->name}} Product Order
@endsection
@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="alert bg-info text-white alert-styled-right alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <span class="font-weight-semibold">Alert!</span>Your Purcashing product name {{$product->name}} which price is $ {{$product->price}}.This 
                amount will deduct from your cash wallet including delivery Charges $ 150.So,you must have $ {{$product->price + 150}} in your cash wallet to purchase this product.
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Create Order</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
        
            <div class="card-body">
                <form method="POST" action="{{route('user.order.store')}}" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Your Address</label>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="product_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="owner_id" value="{{@$product->user_id}}">
                            <input type="hidden" name="price" value="{{@$product->price+150}}">
                            <input type="text" name="address" class="form-control" placeholder="Enter Your Address">
                        </div>
                   </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
@endsection