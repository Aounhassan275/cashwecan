@extends('front.layout.index')
@section('meta')
    
<title>{{$product->name}} | {{App\Models\Setting::siteName()}}</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						@foreach($product->images as $key => $product_image)
						<li data-target="#slider-carousel" data-slide-to="{{$key}}" @if($key == 0) class="active"@endif></li>
						@endforeach
					</ol>
					
					<div class="carousel-inner">
						@foreach($product->images as $index => $product_image)
						<div @if($index == 0) class="item active" @else class="item" @endif>
							<div class="col-sm-12">
								<img src="{{asset($product_image->image)}}" class="" style="height:400px!important;width:100%!important;" alt="" />
							</div>
						</div>
						@endforeach
						
					</div>
					
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
				
			</div>
		</div>
	</div>
</section><!--/slider-->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
					
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{asset($product->images->first()->image)}}" alt="" />
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2>{{$product->name}}
									@if($product->user_id)
									<a href="{{route('user.chat.user',$product->user_id)}}" style="color:black;"><span class="badge badge-danger">Chat</span> </a>
									@else 
									<a href="{{route('user.chat.admin')}}" style="color:black;"><span class="badge badge-danger">Chat</span> </a>
									@endif
								</h2>
								<p>{!! @$product->description !!}</p>
								<span>
									<span>PKR {{$product->price}}</span>
								</span>
								@if($product->user_id)
								<p><b>Product Of :</b> <a href="{{route('product.user',$product->user_id)}}"> {{@$product->user->name}}</a></p>
								@endif
								<p><b>Phone:</b> {{@$product->phone}}</p>
								<p><b>Category:</b> {{@$product->category->name}}</p>
								<p><b>Brand:</b> {{@$product->brand->name}}</p>
								<p><b>Country:</b> {{@$product->country->name}}</p>
								<p><b>City:</b> {{@$product->city->name}}</p>
								<a href="{{route('user.product.order',$product->id)}}" class="btn btn-success" style="width:250px;">Purchase</a>
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