@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3>VIEW PACKAGES | CASH WE CAN</h3>
    </div>
</div>
<div class="col-12 ">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View Package Table</h5>
        </div>
        <div class="table-responsive">
            <table id="datatables-buttons" class="table table-striped ">
                <thead>
                    <tr>
                        <th style="width:auto;">Sr#</th>
                        <th style="width:auto;">Package Name</th>
                        <th style="width:auto;">Package Price</th>
                        {{-- <th style="width:auto;">Direct Income</th>
                        <th style="width:auto;">Direct Team Income</th>
                        <th style="width:auto;">Upline Income</th>
                        <th style="width:auto;">Down Line Income</th>
                        <th style="width:auto;">Upline Placement Income</th>
                        <th style="width:auto;">Down Line Placement Income</th>
                        <th style="width:auto;">Trade Income</th>
                        <th style="width:auto;">Company Income</th> --}}
                        <th style="width:auto;">Image</th>
                        <th style="width:auto;">Max Limit</th>
                        <th style="width:auto;">Min Limit</th>
                        <th style="width:auto;">Action</th>
                        <th style="width:auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Package::all() as $key => $package)
                    <tr> 
                        <td>{{$key+1}}</td>
                        <td>{{$package->name}}</td>
                        <td>{{$package->price}}</td>
                        <td><a href="{{asset($package->image)}}"><i class="feather text-info" data-feather="eye"></i></a></td>
                        {{-- <td>{{$package->direct_income}}</td>
                        <td>{{$package->direct_team_income}}</td>
                        <td>{{$package->upline_income}}</td>
                        <td>{{$package->down_line_income}}</td>
                        <td>{{$package->upline_placement_income}}</td>
                        <td>{{$package->down_line_placement_income}}</td>
                        <td>{{$package->trade_income}}</td>
                        <td>{{$package->company_income}}</td> --}}
                        <td>{{$package->max_limit}}</td>
                        <td>{{$package->min_limit}}</td>
                        <td class="table-action">
                            <a href="{{route('admin.package.edit',$package->id)}}"><i class="align-middle" data-feather="edit-2"></i></a>
                        </td>
                        <td class="table-action">
                            {{-- <a href="{{url('poll/delete',$package->id)}}"><i class="align-middle" data-feather="trash"></i></a> --}}
                            <form action="{{route('admin.package.destroy',$package->id)}}" method="POST">
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