<?php

use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\user\CategoryController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\user\AccountController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [HomeController::class,"index"])->name('index');

Route::get("/product-detail/{id}", [ProductController::class,"ProductDetail"])->name("product-detail");

//Route::get("/product-category", [CategoryController::class, "ProductCategory"])->name("ProductCategory");


Route::post('/searchBook', [ProductController::class, 'searchProduct'])->name('searchBook');

Route::get("/category/{genreID}", [ProductController::class, "productsByCategory"])->name("proByCate");



Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);

Route::resource('/admin/user', \App\Http\Controllers\admin\UserController::class);


// -------------Add_Product_To_Cart------------------------- //
Route::get('/cart/detail', [CartController::class, 'cartPage'])->name('cart.page');

Route::post('/cart/add', [CartController::class, 'addCart'])->name('cart.add');

// -------------Show_and_update_Account------------------------- //
Route::get('/account/detail', [AccountController::class, 'accountDetail'])->name('account.detail');

Route::put('/account/update', [AccountController::class, 'updateAccount'])->name('account.update');

// -------------Login, logout and register------------------------- //
Route::post('/login', [AuthManager::class, 'login'])->name('login.post');

Route::post('/registration', [AuthManager::class, 'registration'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

// -------------Gorget Password------------------------- //
Route::get('/account/identify', [AuthManager::class, 'forgotPass'])->name('account.identify');

Route::post('/account/identify/email', [AuthManager::class, 'confirmEmail'])->name('email.identify');

Route::put('/account/change/password', [AuthManager::class, 'changePassword'])->name('change.password');
Route::get('/cart/detail', [CartController::class, 'cartPage'])->name('cart.page');

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);

Route::resource('/admin/user', \App\Http\Controllers\admin\UserController::class);
Route::resource('/admin/book', \App\Http\Controllers\admin\BookController::class);
Route::resource('/admin/publisher', \App\Http\Controllers\admin\PublisherController::class);
Route::resource('/admin/supplier', \App\Http\Controllers\admin\SupplierController::class);
Route::resource('/admin/coupon', \App\Http\Controllers\admin\CouponController::class);
