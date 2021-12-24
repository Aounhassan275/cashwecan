@extends('user.layout.index')
@section('title')
SELECT PACKAGE PAYMENT
@endsection
@section('contents')

<div class="row">
    @foreach (App\Models\Payment::all() as $payment)
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-img-actions">
                @if($payment->image)
                <img class="card-img-top img-fluid" src="{{asset($payment->image)}}" alt="">
                @else
                <img class="card-img-top img-fluid" src="{{asset('user_asset/global_assets/images/placeholders/placeholder.jpg')}}" alt="">
                @endif
            </div>

            <div class="card-body text-center">
                <h6 class="font-weight-semibold mb-0">{{$payment->method}}</h6>
                <span class="d-block text-muted">{{$payment->name}}</span>

                <div class="list-icons list-icons-extended mt-3">
                    <button type="button" class="copy-button btn btn-info  btn-xs" data-clipboard-action="copy" data-clipboard-target="#link_area">Copy to clipboard</button>
                    {{-- <input id="link_area"  class="form-control" value="{{$payment->number}}" >
                    <p hidden="" class="text-success" id="coppied">Copied!</p> --}}
                 </div>
                  <div class="list-icons list-icons-extended mt-3" >
                    <input id="link_area"  class="form-control" value="{{$payment->number}}" >
                    <p hidden="" style="color:black;" id="coppied">Copied!</p>
                 </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

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
                <form action="{{route('user.deposit.store')}}"  method="post" enctype="multipart/form-data">
                    @csrf
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
                            <select name="payment" class="form-control" required>
                                <option disabled>Select</option>
                                @foreach (App\Models\Payment::all() as $payment)
                                <option value="{{$payment->method}}">{{$payment->method}}</option>
                                @endforeach
                            </select>
                        </div>   
                        <div class="form-group col-md-6">
                            <label >Image <span>*</span></label>
                            <input type="file" class="form-control" name="image" value="" required>
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
@section('scripts')
<script type="text/javascript" src="{{asset('clipboard.js')}}"></script>
<script type="text/javascript">
	var clipboard = new Clipboard('.copy-button');
        clipboard.on('success', function(e) {
            copyText.select();
            var $div2 = $("#coppied");
            console.log($div2);
            console.log($div2.is(":visible"));
            if ($div2.is(":visible")) { return; }
            $div2.show();
            setTimeout(function() {
                $div2.fadeOut();
            }, 800);
        });
</script>
@endsection