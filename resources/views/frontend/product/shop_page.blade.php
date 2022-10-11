@extends('frontend.master_dashboard')
@section('main')

@section('title')
   Shop Page 
@endsection


 <div class="page-header mt-30 mb-50">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h5 class="mb-15"> Shop Page </h5>
                            <div class="breadcrumb">
                                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span>  Shop Page  
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
 <p>We found <strong class="text-brand">{{ count($products) }}</strong> items for you!</p>
                        </div>
                        <div class="sort-by-product-area">
                            <div class="sort-by-cover mr-10">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps"></i>Show:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">50</a></li>
                                        <li><a href="#">100</a></li>
                                        <li><a href="#">150</a></li>
                                        <li><a href="#">200</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sort-by-cover">
                                <div class="sort-by-product-wrap">
                                    <div class="sort-by">
                                        <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                    </div>
                                    <div class="sort-by-dropdown-wrap">
                                        <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                    </div>
                                </div>
                                <div class="sort-by-dropdown">
                                    <ul>
                                        <li><a class="active" href="#">Featured</a></li>
                                        <li><a href="#">Price: Low to High</a></li>
                                        <li><a href="#">Price: High to Low</a></li>
                                        <li><a href="#">Release Date</a></li>
                                        <li><a href="#">Avg. Rating</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-grid">


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
                        <a class="add" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"><i class="fi-rs-shopping-cart mr-5"></i>Details </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!--end product card-->
    @endforeach




                       
                        
                    </div>
                    <!--product grid-->
                    <div class="pagination-area mt-20 mb-20">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    
                    <!--End Deals-->

                    
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                    
                    <!-- Fillter By Price -->
                 

   <div class="sidebar-widget price_range range mb-30">
        <h5 class="section-title style-1 mb-30">Fill by price</h5>
        <div class="price-filter">
            <div class="price-filter-inner">
                <div id="slider-range" class="mb-20"></div>
                <div class="d-flex justify-content-between">
                    <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong></div>
                    <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong></div>
                </div>
            </div>
        </div>
        <div class="list-group">
            <div class="list-group-item mb-10 mt-10">
                <label class="fw-900">Color</label>
                <div class="custome-checkbox">
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                    <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                    <br />
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="" />
                    <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                    <br />
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="" />
                    <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                </div>
                <label class="fw-900 mt-15">Item Condition</label>
                <div class="custome-checkbox">
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                    <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                    <br />
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="" />
                    <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                    <br />
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="" />
                    <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                </div>
            </div>
        </div>
        <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
    </div>


                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                        <h5 class="section-title style-1 mb-30">New products</h5>
                        
        @foreach($newProduct as $product)
        <div class="single-post clearfix">
            <div class="image">
                <img src="{{ asset( $product->product_thambnail ) }}" alt="#" />
            </div>
            <div class="content pt-10">
                <p><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></p>

                   @if($product->discount_price == NULL)
                    <p class="price mb-0 mt-5">${{ $product->selling_price }}</p>
                   @else
                   <p class="price mb-0 mt-5">${{ $product->discount_price }}</p>
                   @endif
                
                <div class="product-rate">
                    <div class="product-rating" style="width: 90%"></div>
                </div>
            </div>
        </div>
      @endforeach


                       
                    </div>
                   

                </div>
            </div>
        </div>




@endsection