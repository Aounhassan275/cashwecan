@extends('user.layout.index')
@section('title')
Buy Products
@endsection
@section('contents')
<div class="row" >
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Search Products</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
 
            <div class="card-body">
                <form   method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="form-label">Category</label>
                                <select data-placeholder="Enter 'as'" name="category_id" id="category_id" class="form-control select-minimum " data-fouc>
                                    <option></option>
                                    <optgroup label="Categories">
                                        @foreach(App\Models\Category::all() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>   
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Brands</label>
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <option></option>
                                </select>
                            </div>   
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select data-placeholder="Enter 'as'" name="country_id" id="country_id" class="form-control select-minimum " data-fouc>
                                    <option></option>
                                    <optgroup label="Categories">
                                        @foreach(App\Models\Country::all() as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>   
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Cities</label>
                                <select name="city_id" id="city_id" class="form-control">
                                    <option></option>
                                </select>
                            </div>    
                        </div>
                    </div>
                    <div class="row float-right" >
                            <button type="submit" class="btn btn-primary">Search 
                                <i class="icon-plus22 ml-2"></i>
                            </button>
                    </div>
               
                </form>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>
<!-- Inner container -->
<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- List -->
        @foreach($products as $product)
        <div class="card card-body">
            <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                <div class="mr-lg-3 mb-3 mb-lg-0">
                    <a href="{{asset(@$product->images->first()->image)}}" data-popup="lightbox">
                        <img src="{{asset(@$product->images->first()->image)}}" width="96" alt="">
                    </a>
                </div>

                <div class="media-body">
                    <h6 class="media-title font-weight-semibold">
                        <a href="#">{{$product->name}}</a>
                    </h6>

                    <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                        <li class="list-inline-item"><strong>City :</strong> {{@$product->city->name}}</li>
                        <li class="list-inline-item"><strong>Country :</strong>{{@$product->country->name}}</li>
                        <li class="list-inline-item"><strong>Brand :</strong>{{@$product->brand->name}}</li>
                        <li class="list-inline-item"><strong>Category :</strong>{{@$product->category->name}}</li>
                    </ul>

                    <p class="mb-3">
                        {!! @$product->description !!}                    
                    </p>

                    <ul class="list-inline list-inline-dotted mb-0">
                        <li class="list-inline-item"><strong>Phone : </strong>  <a href="tel:{{@$product->phone}}">{{@$product->phone}}</a></li>
                    </ul>
                </div>

                <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                    <h3 class="mb-0 font-weight-semibold">$ {{@$product->price}}</h3>

                    <div>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                        <i class="icon-star-full2 font-size-base text-warning-300"></i>
                    </div>


                    <button type="button" class="btn bg-teal-400 mt-3"><i class="icon-cart-add mr-2"></i> Purchase Now</button>
                </div>
            </div>
        </div>
        @endforeach
        {!! @$products->links() !!}
        <!-- /list -->
    </div>
    <!-- /left content -->

</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        let id;
        $('#category_id').on('change', function() {
            id = this.value;
            $.ajax({
                url: "{{route('user.product.brands')}}",
                method: 'post',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(result){
                    $('#brand_id').empty();
                    $('#brand_id').append('<option disabled>Select Product Brands</option>');
                    for (i=0;i<result.length;i++){
                        $('#brand_id').append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }
                }
            });
        });
        
        $('#country_id').on('change', function() {
            id = this.value;
            $.ajax({
                url: "{{route('user.product.cities')}}",
                method: 'post',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(result){
                    $('#city_id').empty();
                    $('#city_id').append('<option disabled>Select Product Cities</option>');
                    for (i=0;i<result.length;i++){
                        $('#city_id').append('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    }
                }
            });
        });
    });
</script>
@endsection