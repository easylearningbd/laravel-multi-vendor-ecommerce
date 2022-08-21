<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id){

        $ship = ShipDistricts::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($ship);

    } // End Method 

    public function StateGetAjax($district_id){

        $ship = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
        return json_encode($ship);

    }// End Method 


}
 