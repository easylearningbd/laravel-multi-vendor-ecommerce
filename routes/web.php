<?php
   
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\VendorOrderController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ActiveUserController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Middleware\RedirectIfAuthenticated;
  
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\RoleController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ShopController;

use App\Http\Controllers\User\WishlistController; 
use App\Http\Controllers\User\CompareController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\AllUserController;

use App\Http\Controllers\User\ReviewController;
 
/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 
 
// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/', [IndexController::class, 'Index']);

Route::middleware(['auth'])->group(function() {
    
Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');

Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');

Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');

Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');


}); // Gorup Milldeware End


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/// Admin Dashboard

Route::middleware(['auth','role:admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashobard');

    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');

});


/// Vendor Dashboard
Route::middleware(['auth','role:vendor'])->group(function() {

   Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashobard');

   Route::get('/vendor/logout', [VendorController::class, 'VendorDestroy'])->name('vendor.logout');

   Route::get('/vendor/profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');

    Route::post('/vendor/profile/store', [VendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');

    Route::get('/vendor/change/password', [VendorController::class, 'VendorChangePassword'])->name('vendor.change.password');

    Route::post('/vendor/update/password', [VendorController::class, 'VendorUpdatePassword'])->name('vendor.update.password');



// Vendor Add Product All Route 
Route::controller(VendorProductController::class)->group(function(){
    Route::get('/vendor/all/product' , 'VendorAllProduct')->name('vendor.all.product');
    Route::get('/vendor/add/product' , 'VendorAddProduct')->name('vendor.add.product');

    Route::post('/vendor/store/product' , 'VendorStoreProduct')->name('vendor.store.product');
    Route::get('/vendor/edit/product/{id}' , 'VendorEditProduct')->name('vendor.edit.product');

    Route::post('/vendor/update/product' , 'VendorUpdateProduct')->name('vendor.update.product');
    Route::post('/vendor/update/product/thambnail' , 'VendorUpdateProductThabnail')->name('vendor.update.product.thambnail');

    Route::post('/vendor/update/product/multiimage' , 'VendorUpdateProductmultiImage')->name('vendor.update.product.multiimage');
    
    Route::get('/vendor/product/multiimg/delete/{id}' , 'VendorMultiimgDelete')->name('vendor.product.multiimg.delete');

    Route::get('/vendor/product/inactive/{id}' , 'VendorProductInactive')->name('vendor.product.inactive');
    Route::get('/vendor/product/active/{id}' , 'VendorProductActive')->name('vendor.product.active');

    Route::get('/vendor/delete/product/{id}' , 'VendorProductDelete')->name('vendor.delete.product');

    Route::get('/vendor/subcategory/ajax/{category_id}' , 'VendorGetSubCategory');
     

});


 // Vendor Order All Route 
Route::controller(VendorOrderController::class)->group(function(){
    Route::get('/vendor/order' , 'VendorOrder')->name('vendor.order');

    Route::get('/vendor/return/order' , 'VendorReturnOrder')->name('vendor.return.order');

    Route::get('/vendor/complete/return/order' , 'VendorCompleteReturnOrder')->name('vendor.complete.return.order');
    Route::get('/vendor/order/details/{order_id}' , 'VendorOrderDetails')->name('vendor.order.details');
    
 
});



Route::controller(ReviewController::class)->group(function(){

 Route::get('/vendor/all/review' , 'VendorAllReview')->name('vendor.all.review');
 
});


}); // end Vendor Group middleware


Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);

Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login')->middleware(RedirectIfAuthenticated::class);

Route::get('/become/vendor', [VendorController::class, 'BecomeVendor'])->name('become.vendor');
Route::post('/vendor/register', [VendorController::class, 'VendorRegister'])->name('vendor.register');



Route::middleware(['auth','role:admin'])->group(function() {


 // Brand All Route 
Route::controller(BrandController::class)->group(function(){
    Route::get('/all/brand' , 'AllBrand')->name('all.brand');
    Route::get('/add/brand' , 'AddBrand')->name('add.brand');
    Route::post('/store/brand' , 'StoreBrand')->name('store.brand');
    Route::get('/edit/brand/{id}' , 'EditBrand')->name('edit.brand');
    Route::post('/update/brand' , 'UpdateBrand')->name('update.brand');
    Route::get('/delete/brand/{id}' , 'DeleteBrand')->name('delete.brand');

});


 // Category All Route 
Route::controller(CategoryController::class)->group(function(){
    Route::get('/all/category' , 'AllCategory')->name('all.category');
    Route::get('/add/category' , 'AddCategory')->name('add.category');
    Route::post('/store/category' , 'StoreCategory')->name('store.category');
    Route::get('/edit/category/{id}' , 'EditCategory')->name('edit.category');
    Route::post('/update/category' , 'UpdateCategory')->name('update.category');
    Route::get('/delete/category/{id}' , 'DeleteCategory')->name('delete.category');

});


 // Category All Route 
Route::controller(SubCategoryController::class)->group(function(){
    Route::get('/all/subcategory' , 'AllSubCategory')->name('all.subcategory');
    Route::get('/add/subcategory' , 'AddSubCategory')->name('add.subcategory');
    Route::post('/store/subcategory' , 'StoreSubCategory')->name('store.subcategory');
    Route::get('/edit/subcategory/{id}' , 'EditSubCategory')->name('edit.subcategory');
    Route::post('/update/subcategory' , 'UpdateSubCategory')->name('update.subcategory');
    Route::get('/delete/subcategory/{id}' , 'DeleteSubCategory')->name('delete.subcategory');

    Route::get('/subcategory/ajax/{category_id}' , 'GetSubCategory');

});


 // Vendor Active and Inactive All Route 
Route::controller(AdminController::class)->group(function(){
    Route::get('/inactive/vendor' , 'InactiveVendor')->name('inactive.vendor');
    Route::get('/active/vendor' , 'ActiveVendor')->name('active.vendor');
    Route::get('/inactive/vendor/details/{id}' , 'InactiveVendorDetails')->name('inactive.vendor.details');
    Route::post('/active/vendor/approve' , 'ActiveVendorApprove')->name('active.vendor.approve');
    Route::get('/active/vendor/details/{id}' , 'ActiveVendorDetails')->name('active.vendor.details');
      Route::post('/inactive/vendor/approve' , 'InActiveVendorApprove')->name('inactive.vendor.approve');
    

});


 // Product All Route 
Route::controller(ProductController::class)->group(function(){
    Route::get('/all/product' , 'AllProduct')->name('all.product');
    Route::get('/add/product' , 'AddProduct')->name('add.product');
    Route::post('/store/product' , 'StoreProduct')->name('store.product');
    Route::get('/edit/product/{id}' , 'EditProduct')->name('edit.product');
    Route::post('/update/product' , 'UpdateProduct')->name('update.product');
    Route::post('/update/product/thambnail' , 'UpdateProductThambnail')->name('update.product.thambnail');
    Route::post('/update/product/multiimage' , 'UpdateProductMultiimage')->name('update.product.multiimage');
    Route::get('/product/multiimg/delete/{id}' , 'MulitImageDelelte')->name('product.multiimg.delete');

    Route::get('/product/inactive/{id}' , 'ProductInactive')->name('product.inactive');
    Route::get('/product/active/{id}' , 'ProductActive')->name('product.active');
    Route::get('/delete/product/{id}' , 'ProductDelete')->name('delete.product');

    // For Product Stock
     Route::get('/product/stock' , 'ProductStock')->name('product.stock');
    

});


 // Slider All Route 
Route::controller(SliderController::class)->group(function(){
    Route::get('/all/slider' , 'AllSlider')->name('all.slider');
    Route::get('/add/slider' , 'AddSlider')->name('add.slider');
    Route::post('/store/slider' , 'StoreSlider')->name('store.slider');
    Route::get('/edit/slider/{id}' , 'EditSlider')->name('edit.slider');
    Route::post('/update/slider' , 'UpdateSlider')->name('update.slider');
    Route::get('/delete/slider/{id}' , 'DeleteSlider')->name('delete.slider');

});

 // Banner All Route 
Route::controller(BannerController::class)->group(function(){
    Route::get('/all/banner' , 'AllBanner')->name('all.banner');
    Route::get('/add/banner' , 'AddBanner')->name('add.banner');
    Route::post('/store/banner' , 'StoreBanner')->name('store.banner');
    Route::get('/edit/banner/{id}' , 'EditBanner')->name('edit.banner');
    Route::post('/update/banner' , 'UpdateBanner')->name('update.banner');
    Route::get('/delete/banner/{id}' , 'DeleteBanner')->name('delete.banner');

}); 


 // Coupon All Route 
Route::controller(CouponController::class)->group(function(){
    Route::get('/all/coupon' , 'AllCoupon')->name('all.coupon');
    Route::get('/add/coupon' , 'AddCoupon')->name('add.coupon');
    Route::post('/store/coupon' , 'StoreCoupon')->name('store.coupon');
    Route::get('/edit/coupon/{id}' , 'EditCoupon')->name('edit.coupon');
    Route::post('/update/coupon' , 'UpdateCoupon')->name('update.coupon');
    Route::get('/delete/coupon/{id}' , 'DeleteCoupon')->name('delete.coupon');

}); 


 // Shipping Division All Route 
Route::controller(ShippingAreaController::class)->group(function(){
    Route::get('/all/division' , 'AllDivision')->name('all.division');
    Route::get('/add/division' , 'AddDivision')->name('add.division');
    Route::post('/store/division' , 'StoreDivision')->name('store.division');
    Route::get('/edit/division/{id}' , 'EditDivision')->name('edit.division');
    Route::post('/update/division' , 'UpdateDivision')->name('update.division');
    Route::get('/delete/division/{id}' , 'DeleteDivision')->name('delete.division');

}); 


 // Shipping District All Route 
Route::controller(ShippingAreaController::class)->group(function(){
    Route::get('/all/district' , 'AllDistrict')->name('all.district');
    Route::get('/add/district' , 'AddDistrict')->name('add.district');
    Route::post('/store/district' , 'StoreDistrict')->name('store.district');
    Route::get('/edit/district/{id}' , 'EditDistrict')->name('edit.district');
    Route::post('/update/district' , 'UpdateDistrict')->name('update.district');
    Route::get('/delete/district/{id}' , 'DeleteDistrict')->name('delete.district');

}); 


 // Shipping State All Route 
Route::controller(ShippingAreaController::class)->group(function(){
    Route::get('/all/state' , 'AllState')->name('all.state');
    Route::get('/add/state' , 'AddState')->name('add.state');
    Route::post('/store/state' , 'StoreState')->name('store.state');
    Route::get('/edit/state/{id}' , 'EditState')->name('edit.state');
    Route::post('/update/state' , 'UpdateState')->name('update.state');
    Route::get('/delete/state/{id}' , 'DeleteState')->name('delete.state');

    Route::get('/district/ajax/{division_id}' , 'GetDistrict');

}); 


 // Admin Order All Route 
Route::controller(OrderController::class)->group(function(){
    Route::get('/pending/order' , 'PendingOrder')->name('pending.order');
    Route::get('/admin/order/details/{order_id}' , 'AdminOrderDetails')->name('admin.order.details');

    Route::get('/admin/confirmed/order' , 'AdminConfirmedOrder')->name('admin.confirmed.order');

    Route::get('/admin/processing/order' , 'AdminProcessingOrder')->name('admin.processing.order');
 
 Route::get('/admin/delivered/order' , 'AdminDeliveredOrder')->name('admin.delivered.order');

 Route::get('/pending/confirm/{order_id}' , 'PendingToConfirm')->name('pending-confirm');
 Route::get('/confirm/processing/{order_id}' , 'ConfirmToProcess')->name('confirm-processing');

  Route::get('/processing/delivered/{order_id}' , 'ProcessToDelivered')->name('processing-delivered');

  Route::get('/admin/invoice/download/{order_id}' , 'AdminInvoiceDownload')->name('admin.invoice.download');

}); 


 // Return Order All Route 
Route::controller(ReturnController::class)->group(function(){
    Route::get('/return/request' , 'ReturnRequest')->name('return.request');

    Route::get('/return/request/approved/{order_id}' , 'ReturnRequestApproved')->name('return.request.approved');

    Route::get('/complete/return/request' , 'CompleteReturnRequest')->name('complete.return.request');
   

});


 // Report All Route 
Route::controller(ReportController::class)->group(function(){

    Route::get('/report/view' , 'ReportView')->name('report.view');
    Route::post('/search/by/date' , 'SearchByDate')->name('search-by-date');
    Route::post('/search/by/month' , 'SearchByMonth')->name('search-by-month');
    Route::post('/search/by/year' , 'SearchByYear')->name('search-by-year');

    Route::get('/order/by/user' , 'OrderByUser')->name('order.by.user');
    Route::post('/search/by/user' , 'SearchByUser')->name('search-by-user');
 
});


 // Active user and vendor All Route 
Route::controller(ActiveUserController::class)->group(function(){

    Route::get('/all/user' , 'AllUser')->name('all-user');
    Route::get('/all/vendor' , 'AllVendor')->name('all-vendor');
    
 
});


 // Blog Category All Route 
Route::controller(BlogController::class)->group(function(){

 Route::get('/admin/blog/category' , 'AllBlogCateogry')->name('admin.blog.category'); 

  Route::get('/admin/add/blog/category' , 'AddBlogCateogry')->name('add.blog.categroy');

  Route::post('/admin/store/blog/category' , 'StoreBlogCateogry')->name('store.blog.category');
  Route::get('/admin/edit/blog/category/{id}' , 'EditBlogCateogry')->name('edit.blog.category');

  Route::post('/admin/update/blog/category' , 'UpdateBlogCateogry')->name('update.blog.category');

  Route::get('/admin/delete/blog/category/{id}' , 'DeleteBlogCateogry')->name('delete.blog.category');
    
 
});



 // Blog Post All Route 
Route::controller(BlogController::class)->group(function(){

 Route::get('/admin/blog/post' , 'AllBlogPost')->name('admin.blog.post'); 

  Route::get('/admin/add/blog/post' , 'AddBlogPost')->name('add.blog.post');

  Route::post('/admin/store/blog/post' , 'StoreBlogPost')->name('store.blog.post');
  Route::get('/admin/edit/blog/post/{id}' , 'EditBlogPost')->name('edit.blog.post');

  Route::post('/admin/update/blog/post' , 'UpdateBlogPost')->name('update.blog.post');

  Route::get('/admin/delete/blog/post/{id}' , 'DeleteBlogPost')->name('delete.blog.post');
    
 
});


// Admin Reviw All Route 
Route::controller(ReviewController::class)->group(function(){

 Route::get('/pending/review' , 'PendingReview')->name('pending.review');
 Route::get('/review/approve/{id}' , 'ReviewApprove')->name('review.approve');
 Route::get('/publish/review' , 'PublishReview')->name('publish.review'); 
 Route::get('/review/delete/{id}' , 'ReviewDelete')->name('review.delete');
});


// Site Setting All Route 
Route::controller(SiteSettingController::class)->group(function(){

 Route::get('/site/setting' , 'SiteSetting')->name('site.setting');
 Route::post('/site/setting/update' , 'SiteSettingUpdate')->name('site.setting.update');

 Route::get('/seo/setting' , 'SeoSetting')->name('seo.setting');
  Route::post('/seo/setting/update' , 'SeoSettingUpdate')->name('seo.setting.update');
});


// Permission All Route 
Route::controller(RoleController::class)->group(function(){

 Route::get('/all/permission' , 'AllPermission')->name('all.permission');
 Route::get('/add/permission' , 'AddPermission')->name('add.permission');
 Route::post('/store/permission' , 'StorePermission')->name('store.permission');
 Route::get('/edit/permission/{id}' , 'EditPermission')->name('edit.permission');

 Route::post('/update/permission' , 'UpdatePermission')->name('update.permission');

  Route::get('/delete/permission/{id}' , 'DeletePermission')->name('delete.permission');
 
});


// Roles All Route 
Route::controller(RoleController::class)->group(function(){

 Route::get('/all/roles' , 'AllRoles')->name('all.roles');
 Route::get('/add/roles' , 'AddRoles')->name('add.roles');
 Route::post('/store/roles' , 'StoreRoles')->name('store.roles');
 Route::get('/edit/roles/{id}' , 'EditRoles')->name('edit.roles');

 Route::post('/update/roles' , 'UpdateRoles')->name('update.roles');

 Route::get('/delete/roles/{id}' , 'DeleteRoles')->name('delete.roles');

 // add role permission 

 Route::get('/add/roles/permission' , 'AddRolesPermission')->name('add.roles.permission');

 Route::post('/role/permission/store' , 'RolePermissionStore')->name('role.permission.store');
 
  Route::get('/all/roles/permission' , 'AllRolesPermission')->name('all.roles.permission');

  Route::get('/admin/edit/roles/{id}' , 'AdminRolesEdit')->name('admin.edit.roles');

  Route::post('/admin/roles/update/{id}' , 'AdminRolesUpdate')->name('admin.roles.update');

 Route::get('/admin/delete/roles/{id}' , 'AdminRolesDelete')->name('admin.delete.roles');

});



// Admin User All Route 
Route::controller(AdminController::class)->group(function(){

 Route::get('/all/admin' , 'AllAdmin')->name('all.admin');
 Route::get('/add/admin' , 'AddAdmin')->name('add.admin');
 Route::post('/admin/user/store' , 'AdminUserStore')->name('admin.user.store');

 Route::get('/edit/admin/role/{id}' , 'EditAdminRole')->name('edit.admin.role');

 Route::post('/admin/user/update/{id}' , 'AdminUserUpdate')->name('admin.user.update');
  Route::get('/delete/admin/role/{id}' , 'DeleteAdminRole')->name('delete.admin.role');

});


}); // Admin End Middleware 


/// Frontend Product Details All Route 

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);
Route::get('/vendor/details/{id}', [IndexController::class, 'VendorDetails'])->name('vendor.details');

Route::get('/vendor/all', [IndexController::class, 'VendorAll'])->name('vendor.all');

Route::get('/product/category/{id}/{slug}', [IndexController::class, 'CatWiseProduct']);

Route::get('/product/subcategory/{id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);

// Product View Modal With Ajax

Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
/// Add to cart store data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

// Get Data from mini Cart
Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);

Route::get('/minicart/product/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

/// Add to cart store data For Product Details Page 
Route::post('/dcart/data/store/{id}', [CartController::class, 'AddToCartDetails']);

/// Add to Wishlist 
Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'AddToWishList']);

/// Add to Compare 
Route::post('/add-to-compare/{product_id}', [CompareController::class, 'AddToCompare']);

/// Frontend Coupon Option
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);

Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

// Checkout Page Route 
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');





 // Cart All Route 
Route::controller(CartController::class)->group(function(){
    Route::get('/mycart' , 'MyCart')->name('mycart');
    Route::get('/get-cart-product' , 'GetCartProduct');
    Route::get('/cart-remove/{rowId}' , 'CartRemove');

    Route::get('/cart-decrement/{rowId}' , 'CartDecrement');
    Route::get('/cart-increment/{rowId}' , 'CartIncrement');
    

}); 

// Frontend Blog Post All Route 
Route::controller(BlogController::class)->group(function(){

 Route::get('/blog' , 'AllBlog')->name('home.blog');  
 Route::get('/post/details/{id}/{slug}' , 'BlogDetails'); 
  Route::get('/post/category/{id}/{slug}' , 'BlogPostCategory');  
 
});


// Frontend Blog Post All Route 
Route::controller(ReviewController::class)->group(function(){

 Route::post('/store/review' , 'StoreReview')->name('store.review'); 
 
});


// Search All Route 
Route::controller(IndexController::class)->group(function(){

 Route::post('/search' , 'ProductSearch')->name('product.search');
 Route::post('/search-product' , 'SearchProduct'); 
 
});

// Shop Page All Route 
Route::controller(ShopController::class)->group(function(){

 Route::get('/shop' , 'ShopPage')->name('shop.page');
 Route::post('/shop/filter' , 'ShopFilter')->name('shop.filter');
 
});







 

/// User All Route
Route::middleware(['auth','role:user'])->group(function() {

 // Wishlist All Route 
Route::controller(WishlistController::class)->group(function(){
    Route::get('/wishlist' , 'AllWishlist')->name('wishlist');
    Route::get('/get-wishlist-product' , 'GetWishlistProduct');
    Route::get('/wishlist-remove/{id}' , 'WishlistRemove'); 

}); 


 // Compare All Route 
Route::controller(CompareController::class)->group(function(){
    Route::get('/compare' , 'AllCompare')->name('compare');
    Route::get('/get-compare-product' , 'GetCompareProduct');
   Route::get('/compare-remove/{id}' , 'CompareRemove'); 

}); 



 // Checkout All Route 
Route::controller(CheckoutController::class)->group(function(){
    Route::get('/district-get/ajax/{division_id}' , 'DistrictGetAjax');
    Route::get('/state-get/ajax/{district_id}' , 'StateGetAjax');

    Route::post('/checkout/store' , 'CheckoutStore')->name('checkout.store');
  

}); 


 // Stripe All Route 
Route::controller(StripeController::class)->group(function(){
    Route::post('/stripe/order' , 'StripeOrder')->name('stripe.order');
    Route::post('/cash/order' , 'CashOrder')->name('cash.order');
  

}); 


 // User Dashboard All Route 
Route::controller(AllUserController::class)->group(function(){
 Route::get('/user/account/page' , 'UserAccount')->name('user.account.page');
 Route::get('/user/change/password' , 'UserChangePassword')->name('user.change.password');

 Route::get('/user/order/page' , 'UserOrderPage')->name('user.order.page');

 Route::get('/user/order_details/{order_id}' , 'UserOrderDetails');
 Route::get('/user/invoice_download/{order_id}' , 'UserOrderInvoice');  

 Route::post('/return/order/{order_id}' , 'ReturnOrder')->name('return.order');

 Route::get('/return/order/page' , 'ReturnOrderPage')->name('return.order.page');

  // Order Tracking 
  Route::get('/user/track/order' , 'UserTrackOrder')->name('user.track.order');
  Route::post('/order/tracking' , 'OrderTracking')->name('order.tracking');


}); 





}); // end group User middleware