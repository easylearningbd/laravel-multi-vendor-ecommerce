<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compare;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CompareController extends Controller
{
     public function AddToCompare(Request $request, $product_id){

        if (Auth::check()) {
      $exists = Compare::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists) {
               Compare::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),

               ]);
               return response()->json(['success' => 'Successfully Added On Your Compare' ]);
            } else{
                return response()->json(['error' => 'This Product Has Already on Your Compare' ]);

            } 

        }else{
            return response()->json(['error' => 'At First Login Your Account' ]);
        }

    } // End Method 


    public function AllCompare(){
        return view('frontend.compare.view_compare');
    }// End Method 


     public function GetCompareProduct(){

        $compare = Compare::with('product')->where('user_id',Auth::id())->latest()->get(); 

        return response()->json($compare);

    }// End Method

    public function CompareRemove($id){

        Compare::where('user_id',Auth::id())->where('id',$id)->delete();
     return response()->json(['success' => 'Successfully Product Remove' ]);
    }// End Method

}
 