<?php

use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\user\CategoryController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\user\AccountController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\CouponController;
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

Route::get("/", [HomeController::class, "index"])->name('index');

Route::get("/product-detail/{id}", [ProductController::class, "ProductDetail"])->name("product-detail");

//Route::get("/product-category", [CategoryController::class, "ProductCategory"])->name("ProductCategory");


Route::post('/searchBook', [ProductController::class, 'searchProduct'])->name('searchBook');

Route::get("/category/{genreID}", [ProductController::class, "productsByCategory"])->name("proByCate");

Route::get('/category', [CategoryController::class, 'ProductCategory'])->name('categoryhome');


Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);

Route::resource('/admin/user', \App\Http\Controllers\admin\UserController::class);


// -------------Add_Product_To_Cart------------------------- //
Route::get('/cart/detail', [CartController::class, 'cartPage'])->name('cart.page');

Route::post('/cart/add', [CartController::class, 'addCart'])->name('cart.add');

Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::post('cart/update', [CartController::class, 'updateCart'])->name('cart.update');

// -------------Show_and_update_Account------------------------- //
Route::get('/account/detail', [AccountController::class, 'accountDetail'])->name('account.detail');

Route::put('/account/update', [AccountController::class, 'updateAccount'])->name('account.update');

Route::get('/account/address', [AccountController::class, 'AddAddress'])->name('account.addressadd');

Route::get('/account/addresslist', [AccountController::class, 'AddressList'])->name('account.addressList');

// -------------Login, logout and register------------------------- //
Route::post('/login', [AuthManager::class, 'login'])->name('login.post');

Route::post('/registration', [AuthManager::class, 'registration'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

// -------------Forget Password------------------------- //
Route::get('/account/identify', [AuthManager::class, 'forgotPass'])->name('account.identify');

Route::post('/account/identify/email', [AuthManager::class, 'confirmEmail'])->name('email.identify');

Route::put('/account/change/password', [AuthManager::class, 'changePassword'])->name('change.password');

// -------------Checkout------------------------- //
Route::get('/checkout', [CheckoutController::class, 'checkoutPage'])->name('checkout.page');
Route::get('/checkout/confirm', [CheckoutController::class, 'checkoutConfirm'])->name('checkout.confirm');
Route::put('/confirm/cancel', [CheckoutController::class, 'cancelOrder'])->name('cancel.order');

// -------------Coupon------------------------- //
Route::post('/coupon', [CouponController::class, 'applyCoupon'])->name('coupon.apply');

// -------------Admin------------------------- //
Route::prefix('admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [\App\Http\Controllers\AdminAuthController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\AdminAuthController::class, 'logout'])->name('admin.logout');
});
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin-dashboard');
    Route::resource('/admin/user', \App\Http\Controllers\admin\UserController::class);
    Route::resource('/admin/book', \App\Http\Controllers\admin\BookController::class);
    Route::resource('/admin/publisher', \App\Http\Controllers\admin\PublisherController::class);
    Route::resource('/admin/supplier', \App\Http\Controllers\admin\SupplierController::class);
    Route::resource('/admin/coupon', \App\Http\Controllers\admin\CouponController::class);
    Route::resource('/admin/category', \App\Http\Controllers\admin\CategoryController::class);
    Route::resource('/admin/genre', \App\Http\Controllers\admin\GenreController::class);
    Route::resource('/admin/bookset', \App\Http\Controllers\admin\BooksetController::class);
    Route::resource('/admin/admin', \App\Http\Controllers\admin\AdminController::class);
    Route::resource('/admin/purchase-order', \App\Http\Controllers\admin\PurchaseOrderController::class);
    Route::resource('/admin/sales-order', \App\Http\Controllers\admin\SalesOrderController::class);
    Route::get('/admin/sales-order/shipping/{id}/{page?}', [\App\Http\Controllers\admin\SalesOrderController::class, 'shipping'])->name('sales-order.shipping');
    Route::get('/admin/sales-order/completed/{id}/{page?}', [\App\Http\Controllers\admin\SalesOrderController::class, 'completed'])->name('sales-order.completed');
});

