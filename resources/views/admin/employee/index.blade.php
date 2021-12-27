@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Add NEW EMPLOYEE | CASH WE CAN</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add New Employee</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.admin.store')}}" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Employee Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Employee Name" required>
                            <input type="hidden" name="type" class="form-control" value="2" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Employee Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Employee Email" required>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="form-label">Employee Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Employee Password" required>
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-6">
                             <label class="form-label">Employee Community Income</label>
                             <input type="number" name="community_income" class="form-control" placeholder="Enter Employee Community Income" required>
                         </div>
                         <div class="form-group col-6">
                             <label class="form-label">Employee New Arrival Income</label>
                             <input type="number" name="new_arrival_income" class="form-control" placeholder="Enter Employee New Arrival Income" required>
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
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Employee Detail</h5>
        </div>
        <table class="table" id="datatables-reponsive">
            <thead>
                <tr>
                    <th style="width:auto;">Sr#</th>
                    <th style="width:auto;">Employee Name</th>
                    <th style="width:auto;">Employee Email</th>
                    <th style="width:auto;">Employee Balance</th>
                    <th style="width:auto;">Employee Community Income</th>
                    <th style="width:auto;">Employee New Arrival Income</th>
                    <th style="width:auto;">Action</th>
                    <th style="width:auto;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\Admin::employee() as $key => $admin)
                <tr> 
                    <td>{{$key+1}}</td>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>$ {{number_format($admin->balance, 2)}}</td>
                    <td>{{$admin->community_income}} %</td>
                    <td>{{$admin->new_arrival_income}} %</td>
                    <td class="table-action">
                        <button data-toggle="modal" data-target="#edit_modal" name="{{$admin->name}}" 
                            email="{{$admin->email}}" community_income="{{$admin->community_income}}" 
                            new_arrival_income="{{$admin->new_arrival_income}}" id="{{$admin->id}}" class="edit-btn btn"><i class="align-middle" data-feather="edit-2"></i></button>
                    </td>
                    <td class="table-action">
                        {{-- <a href="{{url('poll/delete',$package->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                        <form action="{{route('admin.admin.destroy',$admin->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn"><i class="align-middle" data-feather="trash"></i></button>
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
                        <label for="title">Employee Name</label>
                        <input class="form-control" type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label>Employee Email</label>
                        <input class="form-control" type="email" id="email" name="email" required>
                    </div>  
                    <div class="form-group">
                        <label>Employee Password</label>
                        <input class="form-control" type="password" id="password" name="password">
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Employee Community Income</label>
                            <input type="number" name="community_income" id="community_income" class="form-control" placeholder="Enter Employee Community Income" >
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Employee New Arrival Income</label>
                            <input type="number" name="new_arrival_income" id="new_arrival_income" class="form-control" placeholder="Enter Employee New Arrival Income">
                        </div>
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
            let id = $(this).attr('id');
            let name = $(this).attr('name');
            let email = $(this).attr('email');
            let method = $(this).attr('method');
            let new_arrival_income = $(this).attr('new_arrival_income');
            let community_income = $(this).attr('community_income');
            $('#name').val(name);
            $('#email').val(email);
            $('#id').val(id);
            $('#community_income').val(community_income);
            $('#new_arrival_income').val(new_arrival_income);
            $('#updateForm').attr('action','{{route('admin.admin.update','')}}' +'/'+id);
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