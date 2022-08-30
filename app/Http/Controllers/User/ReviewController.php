<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review; 
use Carbon\Carbon;
use Auth;

class ReviewController extends Controller
{
    public function StoreReview(Request $request){

        $product = $request->product_id;
        $vendor = $request->hvendor_id;

        $request->validate([
            'comment' => 'required',
        ]);

        Review::insert([

            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->quality,
            'vendor_id' => $vendor,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Review Will Approve By Admin',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } // End Method 





    
}
 