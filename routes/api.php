<?php

use App\Http\Controllers\user\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/category/{genreID}', [\App\Http\Controllers\user\ProductController::class, 'getProductsByCategory']);

Route::get('/product/{productID}', [\App\Http\Controllers\user\ProductController::class, 'getProductByID']);

Route::get('/product/search', [\App\Http\Controllers\user\ProductController::class, 'searchProduct']);

Route::post('/product/searchByFilter', [\App\Http\Controllers\user\ProductController::class, 'searchByFilter']);

Route::post('/review', [\App\Http\Controllers\user\ProductController::class, 'reviewProduct']);

Route::delete('/delete-review/{reviewID}', [\App\Http\Controllers\user\ProductController::class, 'deleteReview']);

Route::get('/product/all/{condition}', [\App\Http\Controllers\user\ProductController::class, 'getAllProduct']);

Route::get('/book/search/{searchText}', [\App\Http\Controllers\admin\BookController::class, 'searchBook']);
Route::get('/book/{id}', [\App\Http\Controllers\admin\BookController::class, 'getById']);
Route::post('/account/addressnew', [AccountController::class, 'AddNewAddress']);
Route::get('/account/address/{addressID}', [AccountController::class, 'getAddressByID']);
Route::post('/account/update-address', [AccountController::class, 'updateAddress']);
