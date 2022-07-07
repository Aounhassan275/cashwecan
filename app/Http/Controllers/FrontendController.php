<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function showCategory()
    {
        $categories = Category::paginate(30);
        return view('front.category.index',compact('categories'));
    }
    public function showCategoryDetails($name)
    {
        $category = Category::where('name',str_replace('_', ' ',$name))->first();
        $products = Product::where('category_id',$category->id)->paginate(20);
        return view('front.category.show',compact('category','products'));
    }
    public function showBrands()
    {
        $brands = Brand::paginate(30);
        return view('front.brand.index',compact('brands'));
    }
    public function showBrandDetails($name)
    {
        $brand = Brand::where('name',str_replace('_', ' ',$name))->first();
        $products = Product::where('brand_id',$brand->id)->paginate(20);
        return view('front.brand.show',compact('brand','products'));
    }
    public function showCities()
    {
        $cities = City::paginate(120);
        return view('front.city.index',compact('cities'));
    }
    public function showCityDetails($name)
    {
        $city = City::where('name',str_replace('_', ' ',$name))->first();
        $products = Product::where('city_id',$city->id)->paginate(20);
        return view('front.city.show',compact('city','products'));
    }
    public function showCountries()
    {
        $countries = Country::paginate(30);
        return view('front.country.index',compact('countries'));
    }
    public function showCountryDetails($name)
    {
        $country = Country::where('name',str_replace('_', ' ',$name))->first();
        $products = Product::where('country_id',$country->id)->paginate(20);
        return view('front.country.show',compact('country','products'));
    }
    public function showProducts()
    {
        $products = Product::paginate(30);
        return view('front.product.index',compact('products'));
    }
    public function showProductDetails($name)
    {
        $product = Product::where('name',str_replace('_', ' ',$name))->first();
        return view('front.product.show',compact('product'));
    }
    public function showProductUserDetails($id)
    {
        $user = User::find($id);
        return view('front.product.user',compact('user'));
    }
}
