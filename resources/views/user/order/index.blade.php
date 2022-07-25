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
                <th>Delivery Screenshot</th>
                <th>Action</th>
            </tr> 
        </thead>
        <tbody>
            @foreach (App\Models\Order::where('owner_id',Auth::user()->id)->get() as $key => $order)
            <tr> 
                <td>{{$key+1}}</td>
                <td>{{$order->product->name}}</td>
                <td>$ {{$order->product->price}}</td>
                <td><a href="{{route('product.user',$order->user_id)}}"> {{@$order->user->name}}</a></td>
                <td>{{@$order->address}}</td>
                <td>
                    @if(@$order->owner->name == Auth::user()->id)
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
                <td>
                    @if($order->image)
                    <a href="{{asset($order->image)}}" target="_blank"><i class="icon-eye"></i></a>
                    @else
                    @if(@$order->owner_id == Auth::user()->id)
                    <button data-toggle="modal" data-target="#edit_modal"
                           id="{{$order->id}}" class="edit-btn btn btn-primary">Upload</button>
                    @endif
                    @endif
                </td>
                <td class="text-center">
                    @if(@$order->owner_id == Auth::user()->id)
                    <a href="{{route('user.order.onHold',$order->id)}}" data-toggle="tooltip" data-placement="top" title="On Hold"><i class="icon-pencil7"></i></a>
                     @else 
                     <a href="{{route('user.order.completed',$order->id)}}" data-toggle="tooltip" data-placement="top" title="Completed"><i class="icon-check"></i></a>
                     @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let id = $(this).attr('id');
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('user.order.update','')}}' +'/'+id);
        });
    });
</script>
@endsection