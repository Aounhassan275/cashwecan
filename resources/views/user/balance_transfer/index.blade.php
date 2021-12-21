@extends('user.layout.index')
@section('title')
Balance Transfer
@endsection
@section('contents')

<div class="row" >
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline bg-dark">
                <h5 class="card-title">Add Balance Transfer Request</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
 
            <div class="card-body">
                <form action="{{route('user.transcation.store')}}"  method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Transfer Payment</label>
                            <input type="number"    name="amount" class="form-control"  required>                        
                            <input type="hidden"  name="sender_id" class="form-control" value="{{Auth::user()->id}}" required>                        
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Members</label>
                            <select name="receiver_id" class="form-control select2" s required>
                                <option selected disabled>Select</option>
                                @foreach($users as $user)
                                <option  value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
              
                        </div>    
                    </div>
                    <div class="row float-right">
                        <button type="submit" class="btn btn-primary">Transfer Balance Now 
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