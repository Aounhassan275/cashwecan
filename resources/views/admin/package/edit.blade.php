@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3> EDIT PACKAGE | {{App\Models\Setting::siteName()}} </h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Package</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.package.update',$package->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Name</label>
                            <input type="name" name="name" class="form-control" placeholder="Package Name" value="{{$package->name}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Price</label>
                            <input type="number" class="form-control" name="price"  placeholder="Package Price" value="{{$package->price}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Total Direct Income</label>
                            <input type="number" class="form-control" name="direct_income"  placeholder="Total Direct Income" value="{{$package->direct_income}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Direct Team Income</label>
                            <input type="number" class="form-control" name="direct_team_income"  placeholder="Direct Team Income" value="{{$package->direct_team_income}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Upline Income</label>
                            <input type="number" class="form-control" name="upline_income"  placeholder="Upline Income" value="{{$package->upline_income}}">
                        </div>
                    </div>
                   <div class="row">
                        <div class="form-group col-4">
                            <label class="form-label">Down Line Income</label>
                            <input type="number" class="form-control" name="down_line_income"  placeholder="Down Line Income" value="{{$package->down_line_income}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Upline Placement Income</label>
                            <input type="number" class="form-control" name="upline_placement_income"  placeholder="Upline Placement Income" value="{{$package->upline_placement_income}}">
                        </div>
                        <div class="form-group col-4">
                            <label class="form-label">Down Line Placement Income</label>
                            <input type="number" class="form-control" name="down_line_placement_income"  placeholder="Down Line Placement Income" value="{{$package->down_line_placement_income}}">
                        </div>
                        
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Trade Income</label>
                            <input type="number" class="form-control" name="trade_income"  placeholder="Trade Income" value="{{$package->trade_income}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Company Income</label>
                            <input type="number" class="form-control" name="company_income"  placeholder="Company Income" value="{{$package->company_income}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Max Limit</label>
                            <input type="number" class="form-control" name="max_limit"  placeholder="Max Limit" value="{{$package->max_limit}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Min Limit</label>
                            <input type="number" class="form-control" name="min_limit"  placeholder="Min Limit" value="{{$package->min_limit}}">
                        </div>
                   </div>
                   <div class="row">
                    <div class="form-group col-6">
                        <label class="form-label">Withdraw Limit</label>
                        <input type="number" class="form-control" name="withdraw_limit"  placeholder="Withdraw Limit" value="{{$package->withdraw_limit}}">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label">Fund Limit</label>
                        <input type="number" class="form-control" name="fund_limit"  placeholder="Fund Limit" value="{{$package->fund_limit}}">
                    </div>
               </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Product Limit</label>
                            <input type="number" class="form-control" name="product_limit"  placeholder="Product Limit" value="{{$package->product_limit}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image"  >
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