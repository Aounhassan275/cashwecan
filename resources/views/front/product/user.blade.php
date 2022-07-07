@extends('front.layout.index')
@section('meta')
    
<title>{{$user->name}} | CASH WE CAN</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
@if($user->banner())
<section><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
                <img src="{{asset($user->banner())}}" class="" style="height:400px!important;width:100%!important;" alt="" />
				
			</div>
		</div>
	</div>
</section><!--/slider-->
@endif
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
					
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{asset($user->image)}}" alt="" />
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2>{{$user->name}}                                
                                    <a href="{{route('user.chat.user',$user->id)}}" class="btn btn-success">Chat</a>

								</h2>
								<p>{!! @$user->description !!}</p>
								<p><b>Phone :</b> {{@$user->phone}}</p>
								<p><b>Address :</b> {{@$user->address}}</p>
                                <div class="col-sm-3">
                                    <a href="{{@$user->facebook}}" class="btn btn-info">Facebook</a>
                                </div>
                                <div class="col-sm-3" style="margin-top:5px;">
                                    <a href="{{@$user->whatsapp}}" class="btn btn-success">Whatsapp</a>
                                </div>
                                <div class="col-sm-3" style="margin-top:5px;">
                                    <a href="{{@$user->youtube}}" class="btn btn-danger">YouTube</a>
                                </div>
                                <div class="col-sm-3" style="margin-top:5px;">
                                    <a href="{{@$user->instagram}}" class="btn btn-warning">Instagram</a>
                                </div>
							</div><!--/product-information-->
                            
						</div>
					</div><!--/product-details-->
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">{{$user->name}} Products</h2>
						@foreach($user->products as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset(@$product->images->first()->image)}}" alt="" />
											<h2>PKR {{@$product->price}}</h2>
											<p>{{@$product->name}}</p>
											<a href="{{route('product.show',str_replace(' ', '_',$product->name))}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>PKR {{@$product->price}}</h2>
												<p>{{$product->name}}</p>
												<a href="{{route('product.show',str_replace(' ', '_',$product->name))}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy</a>
											</div>
										</div>
								</div>
							</div>
						</div>
						@endforeach
						
					</div><!--features_items-->
				</div>
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach(App\Models\Category::take(10)->get() as $category)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{route('category.show',str_replace(' ', '_',$category->name))}}">{{$category->name}}</a></h4>
								</div>
							</div>
							@endforeach
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{route('category.index')}}">All Categories</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach(App\Models\Brand::take(10)->get() as $brand)
									<li><a href="{{route('brand.show',str_replace(' ', '_',$brand->name))}}"> <span class="pull-right">({{$brand->products->count()}})</span>{{@$brand->name}}</a></li>
									@endforeach
									<li><a href="{{route('brand.index')}}"> <span class="pull-right">({{App\Models\Brand::count()}})</span>All Brands</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
						{{-- <div class="shipping text-center"><!--shipping-->
							<img src="{{asset('front/images/home/shipping.jpg')}}" alt="" />
						</div><!--/shipping--> --}}
					
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection