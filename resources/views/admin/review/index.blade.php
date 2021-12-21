@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add Review | CASH WE CAN</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Review</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.review.store')}}" enctype="multipart/form-data" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">User Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter User Name" required>
                        </div>
                        <div class="form-group col-6">
                            <label>Enter User Package Name</label>
                            <select name="p_name" class="form-control">
                            <option value="">Select</option>
                            @foreach (App\Models\Package::all() as $package)
                            <option value="{{$package->name}}">{{$package->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>         
                    {{-- <div class="row">
                        <div class="form-group col-6">
                            <label>Enter User Package Amount</label>
                            <input type="number" name="amount" placeholder="Enter User Package Amount" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label>Select User Review Star</label>
                            <select name="star" class="form-control">
                                <option value="">Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>  
                        </div>
                    </div>             --}}
                    <div class="row">
                      <div class="form-group col-6">
                            <label>Upload User Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label>Enter User Review Message</label>
                            <textarea name="message" id="" cols="30" rows="2" class="form-control"></textarea>
                        </div>
                    </div>   
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Accounts Detail</h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>User Package Name</th>
                    {{-- <th>User Package Amount</th> --}}
                    {{-- <th>User Review Star</th> --}}
                    <th>User Review Message</th>
                    <th>User Image</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Review::all() as $key => $review)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$review->name}}</td>
                    <td>{{$review->p_name}}</td>
                    {{-- <td>{{$review->amount}}</td>
                    <td>{{$review->star}}</td> --}}
                    <td>{{$review->message}}</td>
                    <td>{{$review->image}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_modal" name="{{$review->name}}" p_name="{{$review->p_name}}" image="{{$review->image}}" message="{{$review->message}}" 
                                id="{{$review->id}}" class="edit-btn btn btn-primary">Edit</button>
                        </td>
                    <td>
                        <form action="{{route('admin.review.destroy',$review->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                        <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Enter User Name</label>
                        <input type="text" name="name" id="name"  class="form-control" required>
                    </div>   
                    <div class="form-group ">
                        <label>Enter User Package Name</label>
                        <select name="p_name" id="p_name" class="form-control">
                            <option value="">Select</option>
                            @foreach (App\Models\Package::all() as $package)
                            <option value="{{$package->name}}">{{$package->name}}</option>
                            @endforeach
                            </select>
                    </div>  
                    {{-- <div class="form-group">
                        <label>Enter User Package Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" required>
                    </div> 
                    <div class="form-group">
                        <label>Select User Review Star</label>
                        <select name="star" id="star" class="form-control">
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>                        
                    </div>       --}}
                    <div class="form-group">
                        <label>Enter User Review Message</label>
                        <textarea name="message" id="message" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-6">
                        <label>Upload User Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
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
            let name = $(this).attr('name');
            let p_name = $(this).attr('p_name');
            // let amount = $(this).attr('amount');
            // let star = $(this).attr('star');
            let message = $(this).attr('message');
            let image = $(this).attr('image');
            let id = $(this).attr('id');
            $('#name').val(name);
            $('#p_name').val(p_name);
            // $('#star').val(star);
            // $('#amount').val(amount);
            $('#message').val(message);
            $('#id').val(id);
            $('#image').val(image);
            $('#updateForm').attr('action','{{route('admin.review.update','')}}' +'/'+id);
        });
    });
</script>
<script>
    $(function() {
        // Datatables Responsive
        $("#datatables-reponsive").DataTable({
            responsive: true
        });
    });
</script>
@endsection