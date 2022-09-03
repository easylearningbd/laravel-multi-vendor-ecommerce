     @php 
    $products = App\Models\Product::where('status',1)->orderBy('id','ASC')->limit(10)->get();
    $categories = App\Models\Category::orderBy('category_name','ASC')->get();
    @endphp

        <section class="product-tabs section-padding position-relative">
            <div class="container">
                <div class="section-title style-2 wow animate__animated animate__fadeIn">
                    <h3> New Products </h3>
                    <ul class="nav nav-tabs links" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one"  data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"  aria-selected="true">All</button>
                        </li>
    @foreach($categories as $category)
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="nav-tab-two" data-bs-toggle="tab" href="#category{{ $category->id }}"  type="button" role="tab" aria-controls="tab-two" aria-selected="false">{{ $category->category_name }}</a>
    </li>
    @endforeach
                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">

    @foreach($products as $product)
    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
            <div class="product-img-action-wrap">
                <div class="product-img product-img-zoom">
                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
                        <img class="default-img" src="{{ asset( $product->product_thambnail ) }}" alt="" />
                        
                    </a>
                </div>
                <div class="product-action-1">

 <a aria-label="Add To Wishlist" class="action-btn" id="{{ $product->id }}" onclick="addToWishList(this.id)"  ><i class="fi-rs-heart"></i></a>
                    
   <a aria-label="Compare" class="action-btn"  id="{{ $product->id }}" onclick="addToCompare(this.id)"><i class="fi-rs-shuffle"></i></a>

   <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $product->id }}" onclick="productView(this.id)" ><i class="fi-rs-eye"></i></a>
                     
                </div>

    @php
    $amount = $product->selling_price - $product->discount_price;
    $discount = ($amount/$product->selling_price) * 100;

    @endphp


                <div class="product-badges product-badges-position product-badges-mrg">

                    @if($product->discount_price == NULL)
                    <span class="new">New</span>
                    @else
                    <span class="hot"> {{ round($discount) }} %</span>
                    @endif

                    
                </div>
            </div>
            <div class="product-content-wrap">
                <div class="product-category">
                    <a href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
                </div>
                <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"> {{ $product->product_name }} </a></h2>
@php

$reviewcount = App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();

$avarage = App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
@endphp

                <div class="product-rate-cover">
                    <div class="product-rate d-inline-block">

                          @if($avarage == 0)
      
       @elseif($avarage == 1 || $avarage < 2)                     
    <div class="product-rating" style="width: 20%"></div>
       @elseif($avarage == 2 || $avarage < 3)                     
    <div class="product-rating" style="width: 40%"></div>
       @elseif($avarage == 3 || $avarage < 4)                     
    <div class="product-rating" style="width: 60%"></div>
       @elseif($avarage == 4 || $avarage < 5)                     
    <div class="product-rating" style="width: 80%"></div>
       @elseif($avarage == 5 || $avarage < 5)                     
    <div class="product-rating" style="width: 100%"></div>
    @endif
                    </div>
                    <span class="font-small ml-5 text-muted"> ({{count($reviewcount)}})</span>
                </div>



                <div>
                    @if($product->vendor_id == NULL)
<span class="font-small text-muted">By <a href="vendor-details-1.html">Owner</a></span>
                    @else
  <span class="font-small text-muted">By <a href="vendor-details-1.html">{{ $product['vendor']['name'] }}</a></span>

                    @endif
                   


                </div>
                <div class="product-card-bottom">

                    @if($product->discount_price == NULL)
                     <div class="product-price">
                        <span>${{ $product->selling_price }}</span>
                       
                    </div>

                    @else
                    <div class="product-price">
                        <span>${{ $product->discount_price }}</span>
                        <span class="old-price">${{ $product->selling_price }}</span>
                    </div>
                    @endif


                     
                    <div class="add-cart">
                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!--end product card-->
    @endforeach


                             
                            
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab one-->



            @foreach($categories as $category)
                    <div class="tab-pane fade" id="category{{ $category->id }}" role="tabpanel" aria-labelledby="tab-two">
                        <div class="row product-grid-4">

@php
$catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
@endphp
        
        @forelse($catwiseProduct as $product)
        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
            <div class="product-img-action-wrap">
                <div class="product-img product-img-zoom">
                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">
                        <img class="default-img" src="{{ asset( $product->product_thambnail ) }}" alt="" />
                        
                    </a>
                </div>
                <div class="product-action-1">
                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>

  <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $product->id }}" onclick="productView(this.id)"><i class="fi-rs-eye"></i></a>
                </div>

    @php
    $amount = $product->selling_price - $product->discount_price;
    $discount = ($amount/$product->selling_price) * 100;

    @endphp


                <div class="product-badges product-badges-position product-badges-mrg">

                    @if($product->discount_price == NULL)
                    <span class="new">New</span>
                    @else
                    <span class="hot"> {{ round($discount) }} %</span>
                    @endif

                    
                </div>
            </div>
            <div class="product-content-wrap">
                <div class="product-category">
                    <a href="shop-grid-right.html">{{ $product['category']['category_name'] }}</a>
                </div>
                <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"> {{ $product->product_name }} </a></h2>
                <div class="product-rate-cover">
                    <div class="product-rate d-inline-block">
                        <div class="product-rating" style="width: 90%"></div>
                    </div>
                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                </div>
                <div>
                    @if($product->vendor_id == NULL)
<span class="font-small text-muted">By <a href="vendor-details-1.html">Owner</a></span>
                    @else
  <span class="font-small text-muted">By <a href="vendor-details-1.html">{{ $product['vendor']['name'] }}</a></span>

                    @endif
                   


                </div>
                <div class="product-card-bottom">

                    @if($product->discount_price == NULL)
                     <div class="product-price">
                        <span>${{ $product->selling_price }}</span>
                       
                    </div>

                    @else
                    <div class="product-price">
                        <span>${{ $product->discount_price }}</span>
                        <span class="old-price">${{ $product->selling_price }}</span>
                    </div>
                    @endif


                     
                    <div class="add-cart">
                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!--end product card-->

        @empty

        <h5 class="text-danger"> No Product Found </h5>


        @endforelse



                            
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab two-->
                    @endforeach
               
                
                </div>
                <!--End tab-content-->
            </div>
        </section>