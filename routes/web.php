<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
//frontend
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\DetailsController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\CategoryController;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\frontend\productssController;
use App\Http\Controllers\frontend\brandController;
use App\Http\Controllers\frontend\stripePaymentController;
//Auth
use App\Http\Controllers\Auth\backendController;
use App\Http\Controllers\Auth\FrontendController;
//backend
use App\Http\Controllers\backend\SubCategorysController;
use App\Http\Controllers\backend\barandsController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductsController;
use App\Http\Controllers\backend\CategorysController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\OptionController;
use App\Http\Controllers\backend\orderController;

/* frontend link---------------------------------------------------------------------------------------------------------------*/
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('productdetails/{id}',[DetailsController::class,'index'])->name('single.product');
Route::get('cart/{id}',[CartController::class,'index']);
//category
Route::get('category/{id}',[CategoryController::class,'cat_show'])->name('category.show');
//related category products
Route::get('brand/{id}',[brandController::class,'brand_show'])->name('brand.show');
//wishlist controller
Route::get('wishlist/{id}',[WishlistController::class,'index']);
//product controller
Route::get('products-all',[productssController::class,'index']);

//payment stripe
//route::get('confirs_cart',[CartController::class,'confirm_cartpage'])->name('confiram.cart');

route::post('stripe-payment',[stripePaymentController::class,'stripePaymentProcess'])->name('stripe.payment');

route::get('payment-success',[stripePaymentController::class,'success'])->name('payment.success');

route::post('payment-error',[stripePaymentController::class,'error'])->name('pyment.error');

/*backend======================================================================================*/
Route::middleware([Admin::class])->group(function(){

Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
//Route::get('/category',[CategoryController::class,'index']);
route::resource('product',ProductsController::class);
//brand controller 
route::resource('brands',barandsController::class);
//category controller
route::resource('categorys',CategorysController::class);
//category controller
route::resource('subcategorys',SubCategorysController::class);
//user controller
route::get('users',[UserController::class,'index'])->name('users.index');
route::post('deleteUser/{id}',[UserController::class,'destroy'])->name('users.delete');
route::get('userview/{id}',[UserController::class,'view'])->name('users.view');
//option controller
route::get('index',[OptionController::class,'index'])->name('settings.index');
route::PUT('settings/{id}',[OptionController::class,'update'])->name('settings.update');
//orders controller
route::get('order',[orderController::class,'index'])->name('order.index');
route::PUT('update/{id}',[orderController::class,'update'])->name('order.update');
//admin password chnage
Route::get('admin-password',[backendController::class,'changepassword'])->name('admin.password');
Route::PUT('password.update',[backendController::class,'Updatepassword'])->name('password.update');

});

/*==================================authfrontackend================login=========register========logout===*/

Route::view('register','auth.frontend.users')->name('form.show');
Route::post('user-create',[FrontendController::class,'create'])->name('users.create');
//login user
 Route::post('login-user',[FrontendController::class,'userlogin'])->name('login.user');
//logout
Route::get('user-logout',[FrontendController::class,'userlogout'])->name('user.logout');
//view user
Route::get('/user-profile/{id}', [FrontendController::class, 'userprofile'])->name('register.save');
//edite user
Route::GET('profile/{id}', [FrontendController::class, 'user_profile'])->name('profile.user');
Route::PUT('editprofile/{id}', [FrontendController::class, 'update_profile'])->name('profile.update');
//chnage password
route::view('change-password/{id}','auth.frontend.change_password');
route::PUT('user-password/{id}',[FrontendController::class,'changepassword'])->name('user.password');

/*====================================authBackend=====logiN=======register========logout==========================*/
Route::get('admin',[backendController::class,'index'])->name('admin.login');
Route::get('admin-signup',[backendController::class,'create'])->name('admin.create');
//login match */
Route::post('adminlogin',[backendController::class,'login'])->name('admin.match');
//admin register page*/
Route::post('adminsignup',[backendController::class,'add'])->name('admin.make');
//logout
Route::post('admin',[backendController::class,'logout'])->name('admin.signup');