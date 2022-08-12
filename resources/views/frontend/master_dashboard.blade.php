

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>  
    <meta charset="utf-8" />
    <title>Easy Shop Online Store </title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->  
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />

</head>

<body>
    <!-- Modal -->
 
    <!-- Quick view -->
  @include('frontend.body.quickview') 
    <!-- Header  -->
 
  @include('frontend.body.header')
    <!--End header--> 



    <main class="main">
        @yield('main')

    </main>

  @include('frontend.body.footer')


   
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>



 <script type="text/javascript">
    
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('centent')
        }
    })

    /// Start product view with Modal 

    function productView(id){
        // alert(id)
        $.ajax({
            type: 'GET',
            url: '/product/view/modal/'+id,
            dataType: 'json',
            success:function(data){
                // console.log(data)

            $('#pname').text(data.product.product_name);
            $('#pprice').text(data.product.selling_price);
            $('#pcode').text(data.product.product_code);
            $('#pcategory').text(data.product.category.category_name);
            $('#pbrand').text(data.product.brand.brand_name);
            $('#pimage').attr('src','/'+data.product.product_thambnail );

            $('#product_id').val(id);
            $('#qty').val(1);

            
            // Product Price 
            if (data.product.discount_price == null) {
                $('#pprice').text('');
                $('#oldprice').text('');
                $('#pprice').text(data.product.selling_price);

            }else{
                $('#pprice').text(data.product.discount_price);
                $('#oldprice').text(data.product.selling_price); 
            } // end else


            /// Start Stock Option

            if (data.product.product_qty > 0) {
                $('#aviable').text('');
                $('#stockout').text('');
                $('#aviable').text('aviable');

            }else{
                $('#aviable').text('');
                $('#stockout').text('');
                $('#stockout').text('stockout');
            } 
            ///End Start Stock Option

             ///Size 

             $('select[name="size"]').empty();
             $.each(data.size,function(key,value){
                $('select[name="size"]').append('<option value="'+value+' ">'+value+'  </option')
                if (data.size == "") {
                    $('#sizeArea').hide();
                }else{
                     $('#sizeArea').show();
                }
             }) // end size


                     ///Color 
               $('select[name="color"]').empty();
             $.each(data.color,function(key,value){
                $('select[name="color"]').append('<option value="'+value+' ">'+value+'  </option')
                if (data.color == "") {
                    $('#colorArea').hide();
                }else{
                     $('#colorArea').show();
                }
             }) // end size




            }
        })  
    }

    // End Product View With Modal 

    /// Start Add To Cart Prodcut 

    function addToCart(){

     var product_name = $('#pname').text();  
     var id = $('#product_id').val();
     var color = $('#color option:selected').text();
     var size = $('#size option:selected').text();
     var quantity = $('#qty').val(); 
     $.ajax({
        type: "POST",
        dataType : 'json',
        data:{
            color:color, size:size, quantity:quantity,product_name:product_name
        },
        url: "/cart/data/store/"+id,
        success:function(data){
            console.log(data)
        }



     })


    }


    /// End Add To Cart Prodcut 


 </script>














</body>

</html>