@extends('frontend.master_dashboard')
@section('main')
@section('title')
   Checkout Page 
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

 <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a> 
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h3 class="heading-2 mb-10">Checkout</h3>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">There are products in your cart</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
    
    <div class="row">
        <h4 class="mb-30">Billing Details</h4>
        <form method="post" action="{{ route('checkout.store') }}">
        	@csrf

            <div class="row">
                <div class="form-group col-lg-6">
                    <input type="text" required="" name="shipping_name" value="{{ Auth::user()->name }}" >
                </div>
                <div class="form-group col-lg-6">
                    <input type="email" required="" name="shipping_email" value="{{ Auth::user()->email }}">
                </div>
            </div>
                           


	<div class="row shipping_calculator">
	    <div class="form-group col-lg-6">
	        <div class="custom_select">
	            <select name="division_id" class="form-control">
	                <option value="">Select Division...</option>
	                @foreach($divisions as $item)
	                <option value="{{ $item->id }}">{{ $item->division_name }}</option>
	                @endforeach
	                 
	            </select>
	        </div>
	    </div>
        <div class="form-group col-lg-6">
      <input required="" type="text" name="shipping_phone" value="{{ Auth::user()->phone }}">
                                </div>
                            </div>

     <div class="row shipping_calculator">
        <div class="form-group col-lg-6">
            <div class="custom_select">
                <select name="district_id" class="form-control">
                  
                
                     
                </select>
            </div>
        </div>
                                <div class="form-group col-lg-6">

      <input required="" type="text" name="post_code" placeholder="Post Code *">
                                </div>
                            </div>


 <div class="row shipping_calculator">
    <div class="form-group col-lg-6">
        <div class="custom_select">
            <select name="state_id" class="form-control">
                
                 
            </select>
        </div>
    </div>
                                <div class="form-group col-lg-6">
      <input required="" type="text" name="shipping_address" placeholder="Address *" value="{{ Auth::user()->address }}">
                                </div>
                            </div>


 

  
                            <div class="form-group mb-30">
        <textarea rows="5" placeholder="Additional information" name="notes"></textarea>
                            </div>

 
 
                       
                    </div>
                </div>

                
<div class="col-lg-5">
<div class="border p-40 cart-totals ml-30 mb-50">
    <div class="d-flex align-items-end justify-content-between mb-30">
        <h4>Your Order</h4>
         
    </div>
    <div class="divider-2 mb-30"></div>
    <div class="table-responsive order_table checkout">
        <table class="table no-border">
            <tbody>
               @foreach($carts as $item) 
                <tr>
                    <td class="image product-thumbnail"><img src="{{ asset($item->options->image) }} " alt="#" style="width:50px; height: 50px;" ></td>
                    <td>
                        <h6 class="w-160 mb-5"><a href="shop-product-full.html" class="text-heading">{{ $item->name }}</a></h6></span>
                        <div class="product-rate-cover">

                         <strong>Color :{{ $item->options->color }} </strong>
                         <strong>Size : {{ $item->options->size }}</strong>
                             
                        </div>
                    </td>
                    <td>
                        <h6 class="text-muted pl-20 pr-20">x {{ $item->qty }}</h6>
                    </td>
                    <td>
                        <h4 class="text-brand">${{ $item->price }}</h4>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>




 <table class="table no-border">
        <tbody>

       @if(Session::has('coupon'))

       <tr>
                <td class="cart_total_label">
                    <h6 class="text-muted">Subtotal</h6>
                </td>
                <td class="cart_total_amount">
                    <h4 class="text-brand text-end">${{ $cartTotal }}</h4>
                </td>
            </tr>
            
            <tr>
                <td class="cart_total_label">
                    <h6 class="text-muted">Coupon Name</h6>
                </td>
                <td class="cart_total_amount">
                    <h6 class="text-brand text-end">{{ session()->get('coupon')['coupon_name'] }} ( {{ session()->get('coupon')['coupon_discount'] }}% ) </h6>
                </td>
            </tr>

              <tr>
                <td class="cart_total_label">
                    <h6 class="text-muted">Coupon Discount</h6>
                </td>
                <td class="cart_total_amount">
                    <h4 class="text-brand text-end">${{ session()->get('coupon')['discount_amount'] }}</h4>
                </td>
            </tr>

              <tr>
                <td class="cart_total_label">
                    <h6 class="text-muted">Grand Total</h6>
                </td>
                <td class="cart_total_amount">
                    <h4 class="text-brand text-end">${{ session()->get('coupon')['total_amount'] }}</h4>
                </td>
            </tr>

       @else


       <tr>
                <td class="cart_total_label">
                    <h6 class="text-muted">Grand Total </h6>
                </td>
                <td class="cart_total_amount">
                    <h4 class="text-brand text-end">${{ $cartTotal }}</h4>
                </td>
            </tr>
            
           
           

       @endif


            
        </tbody>
    </table>





    </div>
</div>
    <div class="payment ml-30">
        <h4 class="mb-30">Payment</h4>
        <div class="payment_option">
            <div class="custome-radio">
                
                <input class="form-check-input" required="" type="radio" name="payment_option" value="stripe" id="exampleRadios3" checked="">
                
                <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Stripe</label>
            </div>
            <div class="custome-radio">
                
                <input class="form-check-input" required="" type="radio" name="payment_option" value="cash" id="exampleRadios4" checked="">
                
                <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
            </div>
            <div class="custome-radio">
                <input class="form-check-input" value="card" required="" type="radio" name="payment_option" id="exampleRadios5" checked="">

                <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online Getway</label>
            </div>
        </div>
        <div class="payment-logo d-flex">
            <img class="mr-15" src="{{ asset('frontend/assets/imgs/theme/icons/payment-paypal.svg') }}" alt="">
            <img class="mr-15" src="{{ asset('frontend/assets/imgs/theme/icons/payment-visa.svg') }}" alt="">
            <img class="mr-15" src="{{ asset('frontend/assets/imgs/theme/icons/payment-master.svg') }}" alt="">
            <img src="{{ asset('frontend/assets/imgs/theme/icons/payment-zapper.svg') }}" alt="">
        </div>
        <button type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></button>
    </div>
                </div>
            </div>
        </div>


         </form>



<script type="text/javascript">
  		
  		$(document).ready(function(){
  			$('select[name="division_id"]').on('change', function(){
  				var division_id = $(this).val();
  				if (division_id) {
  					$.ajax({
  						url: "{{ url('/district-get/ajax') }}/"+division_id,
  						type: "GET",
  						dataType:"json",
  						success:function(data){
  							$('select[name="state_id"]').html('');
  							var d =$('select[name="district_id"]').empty();
  							$.each(data, function(key, value){
  								$('select[name="district_id"]').append('<option value="'+ value.id + '">' + value.district_name + '</option>');
  							});
  						},

  					});
  				} else {
  					alert('danger');
  				}
  			});
  		});


  		// Show State Data 
        
  		$(document).ready(function(){
  			$('select[name="district_id"]').on('change', function(){
  				var district_id = $(this).val();
  				if (district_id) {
                     function district(){
  					$.ajax({
  						url: "{{ url('/state-get/ajax') }}/"+district_id,
  						type: "GET",
  						dataType:"json",
  						success:function(data){
  							$('select[name="state_id"]').html('');
  							var d =$('select[name="state_id"]').empty();
  							$.each(data, function(key, value){
  								$('select[name="state_id"]').append('<option value="'+ value.id + '">' + value.state_name + '</option>');
  							});
  						},

  					});
                    }
  				} else {
  					alert('danger');
  				}
  			});
  		});
    

  </script>



@endsection