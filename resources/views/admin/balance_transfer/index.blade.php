@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>Balance Tranfer | CASH WE CAN</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Balance Transfer Request</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.transcation.store')}}" >
                   @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Transfer Payment</label>
                            <input type="number"    name="amount" class="form-control"  required>                        
                            <input type="hidden"  name="admin_id" class="form-control" value="{{Auth::user()->id}}" required>                        
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Members</label>
                            <select name="receiver_id" class="form-control select2" required>
                                <option selected disabled>Select</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
              
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
<script>
    $(function() {
        // Select2
        $(".select2").each(function() {
            $(this)
                .wrap("<div class=\"position-relative\"></div>")
                .select2({
                    placeholder: "Select value",
                    dropdownParent: $(this).parent()
                });
        })
    });
</script>
@endsection