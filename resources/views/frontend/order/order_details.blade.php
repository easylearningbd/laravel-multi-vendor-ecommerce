@extends('dashboard') 
@section('user')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

 


  <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
<div class="row">

<!-- // Start Col md 3 menu -->

 @include('frontend.body.dashboard_sidebar_menu')
<!-- // End Col md 3 menu -->



<!-- // Start Col md 9  -->
<div class="col-md-9">
    <div class="row">

        <div class="col-md-6">
            <div class="card">
               <div class="card-header"><h4>Shipping Details</h4> </div> 
               <hr>
               <div class="card-body">
                 <table class="table" style="background:#F4F6FA;font-weight: 600;">
                    <tr>
                        <th>Shipping Name:</th>
                        <th>{{ $order->name }}</th>
                    </tr>

                    <tr>
                        <th>Shipping Phone:</th>
                        <th>{{ $order->phone }}</th>
                    </tr>

                    <tr>
                        <th>Shipping Email:</th>
                        <th>{{ $order->email }}</th>
                    </tr>

                     <tr>
                        <th>Shipping Address:</th>
                        <th>{{ $order->adress }}</th>
                    </tr>


                    <tr>
                        <th>Division:</th>
                       <th>{{ $order->division->division_name }}</th>
                    </tr>

                    <tr>
                        <th>District:</th>
                       <th>{{ $order->district->district_name }}</th>
                    </tr>

                    <tr>
                        <th>State :</th>
                         <th>{{ $order->state->state_name }}</th>
                    </tr>

                     <tr>
                        <th>Post Code  :</th>
                         <th>{{ $order->post_code }}</th>
                    </tr>

                     <tr>
                        <th>Order Date   :</th>
                        <th>{{ $order->order_date }}</th>
                    </tr>
                    
                </table>
                   
               </div>

            </div>
        </div>
<!-- // End col-md-6  --> 


        <div class="col-md-6">
            <div class="card">
               <div class="card-header"><h4>Order Details
<span class="text-danger">Invoice : {{ $order->invoice_no }} </span></h4>
                </div> 
               <hr>
               <div class="card-body">
                <table class="table" style="background:#F4F6FA;font-weight: 600;">
                    <tr>
                        <th> Name :</th>
                        <th>{{ $order->user->name }}</th>
                    </tr>

                    <tr>
                        <th>Phone :</th>
                      <th>{{ $order->user->phone }}</th>
                    </tr>

                    <tr>
                        <th>Payment Type:</th>
                       <th>{{ $order->payment_method }}</th>
                    </tr>


                    <tr>
                        <th>Transx ID:</th>
                       <th>{{ $order->transaction_id }}</th>
                    </tr>

                    <tr>
                        <th>Invoice:</th>
                       <th class="text-danger">{{ $order->invoice_no }}</th>
                    </tr>

                    <tr>
                        <th>Order Amonut:</th>
                         <th>${{ $order->amount }}</th>
                    </tr>

                     <tr>
                        <th>Order Status:</th>
      <th><span class="badge rounded-pill bg-warning">{{ $order->status }}</span></th>
                    </tr>
                    
                </table>
                   
               </div>

            </div>
        </div>
<!-- // End col-md-6  --> 

    </div><!-- // End Row  --> 



 
   </div> 
<!-- // End Col md 9  -->























                        </div>
                    </div>
                </div>
            </div>
        </div>

 


@endsection