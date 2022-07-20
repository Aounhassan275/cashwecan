@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>PRODUCT ORDERS | {{App\Models\Setting::siteName()}}</h3>
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
                        <th style="width:auto;">User Email</th>
                        <th style="width:auto;">User Address</th>
                        <th style="width:auto;">Product Owner</th>
                        <th style="width:auto;">Delivery Status</th>
                        <th style="width:auto;">Delivery Screenshot</th>
                        <th style="width:auto;">Action</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Order::whereNot('user_id')->get() as $key => $order)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$order->product->name}}</td>
                        <td>$ {{$order->product->price}}</td>
                        <td><a href="{{route('admin.user.detail',$order->user->id)}}"> {{@$order->user->name}} </a></td>
                        <td>{{@$order->user->email}}</td>
                        <td>{{@$order->address}}</td>
                        <td>
                            @if(@$order->owner->id == Auth::user()->id)
                                Your Product
                            @else 
                                @if($order->owner_id)
                                    <a href="{{route('product.user',$order->owner->id)}}">  {{@$order->owner->name}}</a>
                                @endif
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
                            @if($order->image)
                            <a href="{{asset($order->image)}}" data-toggle="tooltip" data-placement="top" title="Delivery Screenshot" target="_blank"><i class="align-middle" data-feather="eye"></i></a>
                            @else
                            <button data-toggle="modal" data-target="#edit_modal"
                                id="{{$order->id}}" class="edit-btn btn btn-primary">Upload</button>
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

<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Upload Delivery Screenshot</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>
                </div>
            </div>
        </form>
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

<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.order.update','')}}' +'/'+id);
        });
    });
</script>
@endsection