@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW PRODUCT | CASH WE CAN</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Product Table</h5>
        </div>
        <div class="table-responsive">
            <table id="datatables-buttons" class="table table-striped ">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr#</th>
                        <th style="width:auto;">Product Name</th>
                        <th style="width:auto;">Product Price</th>
                        <th style="width:auto;">User Name</th>
                        <th style="width:auto;">User Address</th>
                        <th style="width:auto;">Product Owner</th>
                        <th style="width:auto;">Delivery Status</th>
                        <th style="width:auto;">Action</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Order::whereNull('owner_id')->get() as $key => $order)
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
                            <a href="{{route('admin.order.onHold',$order->id)}}" data-toggle="tooltip" data-placement="top" title="On Hold"><i class="align-middle" data-feather="shopping-bag"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('admin.order.completed',$order->id)}}" data-toggle="tooltip" data-placement="top" title="Completed"><i class="align-middle" data-feather="home"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function() {
        // Datatables with Buttons
        var datatablesButtons = $("#datatables-buttons").DataTable({
            // responsive: true,
            // lengthChange: !1,
            buttons: ["copy", "print"]
        });
        datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
    });
</script>
@endsection