<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;

class ReportController extends Controller
{
    public function ReportView(){
        return view('backend.report.report_view');
    } // End Method 


    public function SearchByDate(Request $request){

        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');

        $orders = Order::where('order_date',$formatDate)->latest()->get();
        return view('backend.report.report_by_date',compact('orders','formatDate'));

    }// End Method 



}
 