<?php

use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\user\CategoryController;
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

Route::get("/product-category", [CategoryController::class, "ProductCategory"])->name("ProductCategory");

Route::get("/category/{genreID}", [ProductController::class, "getProductsByCategory"])->name("proByCate");

