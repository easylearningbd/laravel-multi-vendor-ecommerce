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


        $products = Product::query();

        if (!empty($_GET['category'])) {
            $slugs = explode(',',$_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug',$slugs)->pluck('id')->toArray();
           $products = Product::whereIn('category_id',$catIds)->get();
        } 
        if (!empty($_GET['brand'])) {
            $slugs = explode(',',$_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_slug',$slugs)->pluck('id')->toArray();
           $products = Product::whereIn('brand_id',$brandIds)->get();
        } else{
             $products = Product::where('status',1)->orderBy('id','DESC')->get();
         } 
 
        // Price Range 

         if(!empty($_GET['price'])){
            $price = explode('-',$_GET['price']);
            $products = $products->whereBetween('selling_price',$price);
         }

     
      $categories = Category::orderBy('category_name','ASC')->get(); 
      $brands = Brand::orderBy('brand_name','ASC')->get();
      $newProduct = Product::orderBy('id','DESC')->limit(3)->get();

      return view('frontend.product.shop_page',compact('products','categories','newProduct','brands'));

    } // End Method 


    public function ShopFilter(Request $request){

        $data = $request->all();

        /// Filter For Category

        $catUrl = "";
        if (!empty($data['category'])) {
            foreach($data['category'] as $category){
                if (empty($catUrl)) {
                    $catUrl .= '&category='.$category;
                }else{
                    $catUrl .= ','.$category;
                }
            }
        }


        /// Filter For Brand

        $brandUrl = "";
        if (!empty($data['brand'])) {
            foreach($data['brand'] as $brand){
                if (empty($brandUrl)) {
                    $brandUrl .= '&brand='.$brand;
                }else{
                    $brandUrl .= ','.$brand;
                }
            }
        }

        /// Filter For Price Range 

        $priceRangeUrl = "";
        if (!empty($data['price_range'])) {
           $priceRangeUrl .= '&price='.$data['price_range'];
        }



        return redirect()->route('shop.page',$catUrl.$brandUrl.$priceRangeUrl);

    }// End Method 




}
 