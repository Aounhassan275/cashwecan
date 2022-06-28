@extends('user.layout.index')
@section('contents')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">View Your Orders</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table  datatable-basic datatable-row-basic table-responsive">
        <thead>
            <tr>
                <th>Sr#</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>User Name</th>
                <th>User Address</th>
                <th>Product Owner</th>
                <th>Delivery Status</th>
                <th>Action</th>
            </tr> 
        </thead>
        <tbody>
            @foreach (Auth::user()->orders as $key => $order)
            <tr> 
                <td>{{$key+1}}</td>
                <td>{{$order->product->name}}</td>
                <td>$ {{$order->product->price}}</td>
                <td>{{@$order->user->name}}</td>
                <td>{{@$order->address}}</td>
                <td>
                    @if(@$order->owner->name == Auth::user()->id)
                        Your Product
                    @else 
                        {{@$order->owner->name}}
                    @endif
                </td>
                <td>
                    @if($order->status == "Pending")
                        <span class="badge badge-danger">Pending</span>
                    @elseif($order->status == "Completed")
                        <span class="badge badge-success">Completed</span>
                    @else 
                        <span class="badge badge-warning">On Hold</span>
                    @endif
                </td>
                <td class="text-center">
                    @if(@$order->owner->name == Auth::user()->id)
                    <a href="{{route('user.order.onHold',$order->id)}}" data-toggle="tooltip" data-placement="top" title="On Hold"><i class="icon-warehouse"></i></a>
                    <a href="{{route('user.order.completed',$order->id)}}" data-toggle="tooltip" data-placement="top" title="Completed"><i class="icon-shipping-fast"></i></a>
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