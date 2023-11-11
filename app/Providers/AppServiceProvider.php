<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartDetail;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();
        //truyen du lieu cho header o tat ca trang
        view()->composer('user.layout.header', function ($view) {
            $categories = DB::table('Category')
                ->select('CategoryID', 'CategoryName')
                ->take(5)
                ->get();

            $formattedCategories = [];

            //tim genre cho moi category
            foreach ($categories as $category) {
                $categoryId = $category->CategoryID;
                $categoryName = $category->CategoryName;

                $genres = DB::table('Genre')
                    ->where('CategoryID', $categoryId)
                    ->select('GenreID', 'GenreName')
                    ->take(5)
                    ->get();

                $formattedCategories[] = [
                    'id' => $categoryId,
                    'name' => $categoryName,
                    'genres' => $genres,
                ];
            }
            $view->with('formattedCategories', $formattedCategories);
        });


        view()->composer('user.product-category', function ($view) {
            $categories = DB::table('Category')
                ->select('CategoryID', 'CategoryName')
                ->take(5)
                ->get();

            $formattedCategories = [];

            //tim genre cho moi category
            foreach ($categories as $category) {
                $categoryId = $category->CategoryID;
                $categoryName = $category->CategoryName;

                $genres = DB::table('Genre')
                    ->where('CategoryID', $categoryId)
                    ->select('GenreID', 'GenreName')
                    ->take(5)
                    ->get();

                $formattedCategories[] = [
                    'id' => $categoryId,
                    'name' => $categoryName,
                    'genres' => $genres,
                ];
            }
            $view->with('formattedCategories', $formattedCategories);
        });


        view()->composer('user.product-category', function ($view) {
            $authors = DB::table('Book')
                ->select('Author')
                ->distinct()
                ->take(5)
                ->get();


            $view->with('authors', $authors);

        });

        view()->composer('user.product-category', function ($view) {
            $publisher = DB::table('Book')
                ->join('Publisher', "Book.PublisherID", "=", "Publisher.PublisherID")
                ->select('Publisher.PublisherID', 'PublisherName')
                ->distinct()
                ->take(5)
                ->get();


            $view->with('publisher', $publisher);
        });

        View()->composer('user.layout.header', function($view) {
            if (Auth::check()) {
                $userID = Auth::id();
                $cart = ShoppingCart::firstOrNew(['UserID' => $userID]);
                if (!$cart->CartID) {
                    $cart->save();
                }
                $cartID = $cart->CartID;
            } else {
                $cartID = session()->get('cartID');
                if (!$cartID) {
                    $cart = new ShoppingCart();
                    $cart->save();
                    session(['cartID' => $cart->CartID]);
                    $cartID = $cart->CartID;
                }
            }

            $cartItems = ShoppingCartDetail::with('book')->where('CartID', $cartID)->get();
            $totalPrice = 0;
            $totalBook = $cartItems->unique('BookID')->count();
            foreach ($cartItems as $cartItem) {
                $totalPrice += $cartItem->Quantity * $cartItem->book?->CostPrice;
            }

            $view->with('cartItems', $cartItems);
            $view->with('totalPrice', $totalPrice + 5);
            $view->with('totalBook', $totalBook);
        });

        View()->composer('user.cart-page', function($view) {
            if (Auth::check()) {
                $userID = Auth::id();
                $cart = ShoppingCart::firstOrNew(['UserID' => $userID]);
                if (!$cart->CartID) {
                    $cart->save();
                }
                $cartID = $cart->CartID;
            } else {
                $cartID = session()->get('cartID');
                if (!$cartID) {
                    $cart = new ShoppingCart();
                    $cart->save();
                    session(['cartID' => $cart->CartID]);
                    $cartID = $cart->CartID;
                }
            }
            $cartItems = ShoppingCartDetail::with('book')->where('CartID', $cartID)->get();
            $totalPrice = 0;
            foreach ($cartItems as $cartItem) {
                $totalPrice += $cartItem->Quantity * $cartItem->book?->CostPrice;
            }
            $view->with('cartItems', $cartItems);
            $view->with('bookPrice', $totalPrice);
            $view->with('shipPrice', 5);
            $view->with('totalPrice', $totalPrice + 5);
        });

        View()->composer('user.checkout-page', function($view) {
            $userID = Auth::id();
            if($userID) {
                $cart = ShoppingCart::firstOrNew(['UserID' => $userID]);
                if (!$cart->CartID) {
                    $cart->save();
                }
                $cartID = $cart->CartID;
                $cartItems = ShoppingCartDetail::with('book')->where('CartID', $cartID)->get();
                $totalPrice = 0;
                foreach ($cartItems as $cartItem) {
                    $totalPrice += $cartItem->Quantity * $cartItem->book?->CostPrice;
                }
                $view->with('cartItems', $cartItems);
                $view->with('bookPrice', $totalPrice);
                $view->with('shipPrice', 5);
                $view->with('totalPrice', $totalPrice + 5);
            }
        });
    }
}
