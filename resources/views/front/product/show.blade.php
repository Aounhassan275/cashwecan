@extends('front.layout.index')
@section('meta')
    
<title>{{$product->name}} | CASH WE CAN</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
	<section>
		<div class="container">
			<div class="row">
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
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{asset($product->images->first()->image)}}" alt="" />
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2>{{$product->name}}</h2>
								<p>{!! @$product->description !!}</p>
								<span>
									<span>PKR {{$product->price}}</span>
								</span>
								<p><b>Phone:</b> {{@$product->phone}}</p>
								<p><b>Category:</b> {{@$product->category->name}}</p>
								<p><b>Brand:</b> {{@$product->brand->name}}</p>
								<a href="{{route('user.chat.index')}}" class="btn btn-success" style="width:250px;">Chat</a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach(App\Models\Product::where('user_id',null)->take(6)->get() as $product)
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
			</div>
		</div>
	</section>
@endsection