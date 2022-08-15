@extends('frontend.master_dashboard')
@section('main')


 <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                     <span></span> Compare
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <h1 class="heading-2 mb-10">Products Compare</h1>
                    <h6 class="text-body mb-40">There are products to compare</h6>
                    <div class="table-responsive">
                        <table class="table text-center table-compare">
                            <tbody>
                                
                                <tr class="pr_image">
                                    <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
                                    <td class="row_img"><img src="assets/imgs/shop/product-2-1.jpg" alt="compare-img" /></td>
                                    
                                </tr>
                                <tr class="pr_title">
                                    <td class="text-muted font-sm fw-600 font-heading">Name</td>
                                    <td class="product_name">
                                        <h6><a href="shop-product-full.html" class="text-heading">J.Crew Mercantile Women's Short</a></h6>
                                    </td>
                                   
                                </tr>
                                <tr class="pr_price">
                                    <td class="text-muted font-sm fw-600 font-heading">Price</td>
                                    <td class="product_price">
                                        <h4 class="price text-brand">$12.00</h4>
                                    </td>
                                  
                                </tr>
                                
                                <tr class="description">
                                    <td class="text-muted font-sm fw-600 font-heading">Description</td>
                                    <td class="row_text font-xs">
                                        <p class="font-sm text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and</p>
                                    </td>
                                    
                                </tr>
                                <tr class="pr_stock">
                                    <td class="text-muted font-sm fw-600 font-heading">Stock status</td>
                                    <td class="row_stock"><span class="stock-status in-stock mb-0">In Stock</span></td>
                                   
                                </tr>
                                
                                <tr class="pr_remove text-muted">
                                    <td class="text-muted font-md fw-600"></td>
                                    <td class="row_remove">
                                        <a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection