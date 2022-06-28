<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.product.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.product.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        foreach($request->images as $image)
        {
            ProductImage::create([
                'image' => $image,
                'product_id' => $product->id
            ]);
        }
        toastr()->success('Product is Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('user.product.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        toastr()->success('Product Informations Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $product = Product::find($id);
        $product->delete();
        toastr()->success('Prodct Deleted Successfully');
        return redirect()->back();
    }
    public function getCategoryBrand(Request $request)
    {
        if($request->id == 'all'){
            $brands = Brand::all();
        } else {
            $brands = Category::find($request->id)->brands;
        }
        
        return response()->json($brands);
    }
    public function getCountryCities(Request $request)
    {
        if($request->id == 'all'){
            $cities = City::all();
        } else {
            $cities = Country::find($request->id)->cities;
        }
        
        return response()->json($cities);
    }
    
    public function showProducts()
    {
        $products = Product::orderBy('display_order')->paginate(30);
        return view('user.product.view',compact('products'));
    }
    public function showProductDetails($name)
    {
        $product = Product::where('name',str_replace('_', ' ',$name))->first();
        return view('user.product.show',compact('product'));
    }
    public function orderProducts($id)
    {
        $product = Product::find($id);
        if($product->user_id == Auth::user()->id)
        {
            toastr()->error('You are the owner of this Product!');
            return back();
        }
        return view('user.order.create',compact('product'));
    }
}
