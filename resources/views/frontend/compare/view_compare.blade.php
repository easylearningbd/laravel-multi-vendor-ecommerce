@extends('frontend.master_dashboard')
@section('main')

@section('title')
   Compare Page 
@endsection
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

                            <tbody id="compare">
                                
                               
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection