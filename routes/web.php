<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;

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
 
Route::get('/', function () {
    return view('frontend.index');
});

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



});


Route::get('/admin/login', [AdminController::class, 'AdminLogin']);
Route::get('/vendor/login', [VendorController::class, 'VendorLogin']);



Route::middleware(['auth','role:admin'])->group(function() {


 // Brand All Route 
Route::controller(BrandController::class)->group(function(){
    Route::get('/all/brand' , 'AllBrand')->name('all.brand');
    Route::get('/add/brand' , 'AddBrand')->name('add.brand');
    Route::post('/store/brand' , 'StoreBrand')->name('store.brand');

});





}); // End Middleware 