<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\DetailsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\Frontend\CategoryController;

Route::get('/',[HomeController::class,'index']);
Route::get('productdetails',[DetailsController::class,'index']);
Route::get('cart',[CartController::class,'index']);
Route::get('category',[CategoryController::class,'index']);

/*backend caTEGORY*/
Route::get('dashboard',[DashboardController::class,'index']);
//Route::get('/category',[CategoryController::class,'index']);
//Route::get('/product',[ProductController::class,'index']);
//Route::get('/fproduct',[ProductController::class,'findex']);

/*auth ------ login ----register---logout===*/
Route::get('register',[AuthController::class,'index'])->name('signup');
Route::post('Admin/store',[authController::class,'create'])->name('admin.store');


Route::get('login',[authController::class,'login'])->name('login');
Route::post('admin/show',[authController::class,'show'])->name('admin.show');


