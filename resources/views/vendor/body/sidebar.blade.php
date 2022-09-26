
@php
	$id = Auth::user()->id;
	$verdorId = App\Models\User::find($id);
	$status = $verdorId->status; 
@endphp
 


<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Vendor</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

					<li>
					<a href="{{ route('vendor.dashobard') }}">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>


           @if($status === 'active')

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='lni lni-fresh-juice'></i>
						</div>
						<div class="menu-title">Product Manage </div>
					</a>
					<ul>
						<li> <a href="{{ route('vendor.all.product') }}"><i class="bx bx-right-arrow-alt"></i>All Product</a>
						</li>
						<li> <a href="{{ route('vendor.add.product') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
						</li>
						 
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-cart"></i>
						</div>
						<div class="menu-title"> Order Manage </div>
					</a>
					<ul>
						<li> <a href="{{ route('vendor.order') }}"><i class="bx bx-right-arrow-alt"></i>Vendor Order</a>
						</li>

						<li> <a href="{{ route('vendor.return.order') }}"><i class="bx bx-right-arrow-alt"></i>Return Order</a>
						</li>

						<li> <a href="{{ route('vendor.complete.return.order') }}"><i class="bx bx-right-arrow-alt"></i>Complete Return Order</a>
						</li>
					 
						 
					</ul>
				</li>


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="lni lni-indent-increase"></i>
						</div>
						<div class="menu-title"> Review Manage </div>
					</a>
					<ul>
						<li> <a href="{{ route('vendor.all.review') }}"><i class="bx bx-right-arrow-alt"></i>All Review</a>
						</li>

						 
						 
					</ul>
				</li>

				
	
	@else

	@endif			 
			 
 
		 
			  
				<li>
					<a href=" " target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>