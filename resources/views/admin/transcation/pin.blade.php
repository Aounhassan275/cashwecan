@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW PIN HISTORY | CASH WE CAN</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Pin History </h5>
        </div>
        <table id="datatables-buttons" class="table table-striped">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Pin Used By</th>
                    <th>Pin Created By</th>
                    <th>Pin Amount</th>
                    <th>Pin Used At</th>
                </tr>
            </thead>
            <tbody>
                @foreach (App\Models\PinUsed::all() as $key => $pin)
                <tr>
                    <td>{{$key+1}}</td>
                    <td><a href="{{route('admin.user.detail',$pin->user->id)}}"> {{$pin->user->name}}</a></td>
                    <td><a href="{{route('admin.user.detail',$pin->pin->user_id)}}">{{$pin->pin->user->name}}</a></td>
                    <td>{{$pin->pin->amount}}</td>
                    <td>{{$pin->created_at->format('M d,Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(function() {
        // Datatables with Buttons
        var datatablesButtons = $("#datatables-buttons").DataTable({
            responsive: true,
            lengthChange: !1,
            buttons: ["copy", "print"]
        });
        datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
    });
</script>
@endsection