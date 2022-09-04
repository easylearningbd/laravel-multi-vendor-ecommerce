

@if($products -> isEmpty())
<h4 class="text-center text-danger">Product Not Found</h4>
@else 

	<div class="container mt-5">
		<div class="row d-flex justify-content-center">
			<div class="col-md-12">
				<div class="card">


		@foreach($products as $item)
		<a href="">
			<div class="list border-bottom">
				<img src="{{ asset($item->product_thambnail) }}" style="width:40px; height:40px">

				<div class="d-flex flex-column ml-5">
 <span>{{ $item->product_name }}</span> <small>${{ $item->selling_price }}</small>
					
				</div>
				
			</div> 
		</a>
		@endforeach

					
				</div>
				
			</div>
			
		</div>
		
	</div>









@endif