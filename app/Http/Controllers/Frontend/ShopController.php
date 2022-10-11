<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\Brand;
use App\Models\Product;
use App\Models\User; 


class ShopController extends Controller
{
    public function ShopPage(){

      $products = Product::where('status',1)->orderBy('id','DESC')->get();
      $categories = Category::orderBy('category_name','ASC')->get(); 
      $newProduct = Product::orderBy('id','DESC')->limit(3)->get();

      return view('frontend.product.shop_page',compact('products','categories','newProduct'));

    } // End Method 


    public function ShopFilter(Request $request){

    }// End Method 




}
 