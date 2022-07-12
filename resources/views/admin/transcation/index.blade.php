@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW TRANSCATIONS | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Transcations </h5>
        </div>
        <div class="table-responsive">
        <table id="datatables-buttons" class="table table-striped">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Receiver Name</th>
                    <th>Amount</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->transcations as $key => $transcation)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$transcation->receiver->name}}</td>
                    <td>{{$transcation->amount}}</td>
                    <td>{{$transcation->detail}}</td>
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